<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Eloquent\User;
use Laracasts\Flash\Flash;


class ProfileController extends Controller
{

	 public function viewSettings()

	 {
	 	return view('user.settings', [

	 			'user' => User::find(Auth::user()->id)

	 		]);

	 }


	public function saveSettings (Requests\SettingsUpdateRequest $request)

	{
		$user = User::find(Auth::user()->id);
		$user->profile_image_url = $request->input('profile_image_url');
		$user->profile_banner_url = $request->input('profile_banner_url');
		$user->age = $request->input('age');
		$user->save();

		Flash::message('save');



			return view('user.profile', [

	 			'user' => User::find(Auth::user()->id)

	 		]);

	}


    public function viewProfile($userId = null)
    {

    	$user = null;

    	if($userId != null)
    	{

    		$user = User::find($userId);

    	} else {

    		$user = c;


    	}

    		return view('user.profile', [

    			'user' => $user

    			]);

    }
}
