<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Navigation;
use \App\User;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{

    public function index(){
        if(Auth::user()->isAdmin == 1){

            $navigations = Navigation::all();
        }

        else{
            $navigations = Navigation::where('userLevel',10)->get();
        }
        $currentBalance = User::where('id', Auth::user()->id)->value('balance');
        return view('home', compact('navigations', 'currentBalance'));
    }
}
