<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profileUpdate(Request $request){
        $validated = \request()->validate([
            'id' => 'required',
            'name' => 'required| min:3| string',
            'email' => 'required| email',
            'image' => '',
        ]);

        $user = \App\User::find($validated['id']);
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if($validated['image']){

            $img_path = '/images/'.$user->id;
            $img = \Intervention\Image\Facades\Image::make($validated['image'])->resize(150,150);
            $img->save(public_path($img_path));
            $user->image = $img_path;
        }

        $user->save();


    }
}
