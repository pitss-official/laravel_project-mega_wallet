<?php

namespace App\Http\Controllers;
use \App\Loan;
use App\Money;
use App\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{


    public function index(){
        return Loan::where('isApproved', 0)->where('isCancelled',0)->get();
    }


    public function create(){
        $validatedData = \request()->validate([
            'amount' => 'required| numeric|max: 10000| min:1',
        ]);

        $loan = new Loan();
        $loan->amount = $validatedData['amount'];
        $loan->requestedBy = auth()->user()->id;
        $loan->save();
        return ['success'=> 'Created request'];

    }

    public function getLoanRequests(){
        $currUser = auth()->user()->id;
        return Loan::where('requestedBy', $currUser)->latest()->get();
    }


    public function approve(){
        $validated = \request()->validate([
            'id'=> 'required | numeric',
            'rqstdBy' => 'required',
            'amount' => 'required| numeric|max: 10000| min:1',
        ]);

        $loan = Loan::find($validated['id']);
        $rcvr = User::find($validated['rqstdBy']);
        $loan->isApproved = 1;

        $money = new Money();
        $money->amount = $validated['amount'];
        $money->sentBy = User::where('isAdmin', 1)->value('id');
        $money->receivedBy = $rcvr->id;
        $admin = User::where('isAdmin', 1)->get();
        $admin->first()->balance = $admin->first()->balance - $validated['amount'];
        $admin->first()->save();
        $rcvr->balance = $rcvr->balance + $validated['amount'];
        $rcvr->save();
        $money->save();
        $loan->save();

    }

    public function deny(){
        $validated = \request()->validate([
            'id'=> 'required | numeric',
        ]);
        $loan = Loan::find($validated['id']);
        $loan->isCancelled = 1;
        $loan->save();


    }
}
