<?php

namespace App\Http\Controllers;

use App\User;
use App\Money;
use App\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MoneyController extends Controller
{




    public function test(){
        return ['succes' => true];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navigations = Navigation::all();
        $currentBalance = \App\User::where('id', Auth::user()->id)->value('balance');


        $money = Money::where('sentBy', auth()->user()->id)->orWhere('receivedBy', auth()->user()->id)->latest()->get();

        //dd($m);
        return $money;
        //return view('money.index', compact('money', 'navigations', 'currentBalance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navigations = Navigation::all();
        $currentBalance = \App\User::where('id', auth()->user()->id)->value('balance');
        return view('money.create', compact('navigations','currentBalance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validatedData = [];
        $validatedData = \request()->validate([
            'amount' => 'required| numeric|max: 10000| min:1',
        ]);

       $admin = User::where('isAdmin', 1)->get();  //todo fetch only 1 admin
        //dd($admin);

        $curr_user = Auth::user();

        $money = new Money();
        $money->amount = $validatedData['amount'];
        $money->sentBy = User::where('isAdmin', 1)->value('id');
        $money->receivedBy = $curr_user->id;

        $admin->first()->balance = $admin->first()->balance - $validatedData['amount'];
        $admin->first()->save();
        $curr_user->balance = $curr_user->balance + $validatedData['amount'];
        $curr_user->save();


        $money->save();
        return ["success"=> 'Successfully added'];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Money  $money
     * @return \Illuminate\Http\Response
     */
    public function show(Money $money)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Money  $money
     * @return \Illuminate\Http\Response
     */
    public function edit(Money $money)
    {

        $navigations = Navigation::all();
        $currentBalance = \App\User::where('id', auth()->user()->id)->value('balance');
        $currUser = auth()->user()->id;

        $users = \App\User::where('isAdmin','==', false)->where('id','!=', $currUser)->get();

        return $users;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Money  $money
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Money $money)
    {
        $validatedData = \request()->validate([
            'userID' => 'required',
            'amount'=> 'required| numeric|max: 10000| min:1',
        ]);

        $receiver = User::find($validatedData['userID']);
        $sender = auth()->user();

        $receiver->balance = $receiver->balance + $validatedData['amount'];
        $sender->balance = $sender->balance - $validatedData['amount'];
        $receiver->save();
        $sender->save();

        $money = new Money();
        $money->amount = $validatedData['amount'];
        $money->sentBy = $sender->id;
        $money->receivedBy = $receiver->id;
        $money->save();
        return ['success'=> 'Successfully approved'];



    }


    public function getCurrentbalance(){
        return \auth()->user()->balance;

    }


    public function getTotalTxns(){
//        $currUser = \auth()->user()->id;
//        return count(Money::where('sentBy', $currUser)->orWhere('receivedBy'))
        return count($this->index());
    }


    public function deny(){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Money  $money
     * @return \Illuminate\Http\Response
     */
    public function destroy(Money $money)
    {
        //
    }
}
