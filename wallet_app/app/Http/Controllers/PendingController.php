<?php

namespace App\Http\Controllers;

use App\Money;
use App\Pending;
use App\User;
use Cassandra\Date;
use DB;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function schedulePayment(){
        $validatedData = \request()->validate([
            'userID' => 'required',
            'amount'=> 'required| numeric|max: 10000| min:1',
            'date' => 'required| date_format:Y-m-d',
        ]);

        $receiver = User::find($validatedData['userID']);
        $sender = auth()->user();
        $pending = new Pending();
        $pending->amount = $validatedData['amount'];
        $pending->sentBy = $sender->id;
        $pending->receivedBy = $receiver->id;
        $pending->scheduled_at = $validatedData['date'];

        $pending->stored_at = date('Y-m-d');

        $pending->save();

    }

    public function pendingPayments(){
        $sender = auth()->user()->id;
        return Pending::where('isPending', 1)->where('sentBy', $sender)->latest()->get();

    }

    public function countPendingRequest(){
        return count($this->pendingPayments());
    }
}
