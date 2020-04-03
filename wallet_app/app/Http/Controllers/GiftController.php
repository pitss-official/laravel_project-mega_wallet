<?php

namespace App\Http\Controllers;

use App\Gift;
use App\Money;
use App\User;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function findGiftCards(){
        return Gift::where('receivedBy', auth()->user()->id)->where('isUsed', 0)->get();
    }

    public function countGiftCards(){
        return count($this->findGiftCards());
    }


    public function create(){
        $validatedData = \request()->validate([

            'amount'=> 'required| numeric|max: 10000| min:1',
            'receiver' => 'required',
            'message' => 'required',
        ]);

        $gift = new Gift();
        $gift->amount = $validatedData['amount'];
        $gift->sentBy = auth()->user()->id;
        $gift->receivedBy = $validatedData['receiver'];
        $gift->message = $validatedData['message'];
        $gift->save();
    }


    public function redeem(){
        $validatedData = \request()->validate([
            'id' => 'required',
        ]);

        $gift = Gift::find($validatedData['id']);
        $gift->isUsed = 1;

        $receiver = User::find($gift->receivedBy);
        $sender = User::find($gift->sentBy);

        $receiver->balance = $receiver->balance + $gift->amount;
        $sender->balance = $sender->balance - $gift->amount;


        $money = new Money();
        $money->amount = $gift->amount;
        $money->sentBy = $sender->id;
        $money->receivedBy = $receiver->id;

        $receiver->save();
        $sender->save();
        $money->save();
        $gift->save();

    }
}
