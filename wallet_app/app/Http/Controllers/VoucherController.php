<?php

namespace App\Http\Controllers;

use App\Money;
use App\User;
use Illuminate\Http\Request;
use \App\Voucher;
use Illuminate\Support\Facades\Auth;


class VoucherController extends Controller
{
    public function create(Request $request){
        $validated = request()->validate([
            'numberOfVouchers' => 'required| numeric| min:1 | max: 5',
            'value' => 'required | numeric | min:1 | max: 1000',
        ]);

        $numberOfVouchers = $validated['numberOfVouchers'];
        $value = $validated['value'];
        $keys = Voucher::createKey($numberOfVouchers);
        foreach ($keys as $key){
            $voucher = new Voucher();
            $voucher->key = $key;
            $voucher->value = $value;
            $Date = date('Y-m-d');
            $voucher->validity = date('Y-m-d', strtotime($Date. ' + 5 days'));
            $voucher->isExpired = 0;
            $voucher->save();
        }
        return [
            'keys' => $keys,
            'value' => $value,
            'validity' => date('Y-m-d', strtotime($Date. ' + 5 days')),
        ];
    }


    public function redeem(){
        $validated = \request()->validate([
            'key' => 'required| size:8',
        ]);

        $voucher = Voucher::where('key', $validated['key'])->first();
        if($voucher == null){
            return['error'=> 'Key does not exist'];
        }

        if($voucher->isRedeemed == 1){
            return['error' => 'Already redeemed'];
        }

        if( $voucher->isExpired == 1){
            return['error' => 'Expired'];
        }
        $value = $voucher->value;

        $admin = User::where('isAdmin', 1)->get();  //todo fetch only 1 admin
        $curr_user = Auth::user();
        $money = new Money();
        $money->amount = $value;
        $money->sentBy = User::where('isAdmin', 1)->value('id');
        $money->receivedBy = $curr_user->id;
        $admin->first()->balance = $admin->first()->balance - $value;
        $admin->first()->save();
        $curr_user->balance = $curr_user->balance + $value;


        $voucher->isRedeemed = 1;
        $voucher->redeemedBy = $curr_user->id;
        $voucher->isExpired = 1;
        $curr_user->save();
        $money->save();
        $voucher->save();
        return $voucher;
    }
}
