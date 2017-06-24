<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ProfileHelper;
use App\Helpers\ScreeningHelper;

class ProfileController extends Controller
{
	/**
	 * Display the form for setting up
	 * the user profile
	 */
    public function index()
    {
    	return view('profile.index', ['userInfo' => ProfileHelper::getUserInfo()]);
    }

    /**
     * Update the user profile with the
     * new data we acquired. This function
     * will probably be expanded with the
     * client's input
     */
    public function updateProfile(Request $request) {
        ProfileHelper::updateProfile($request);

        return redirect('/screening-test');
    }

    /**
     * @ Show the final screening test to decide on
     * @ user wellnes score.
     */
    public function screeningTest() {
    	return view('profile.screening');
    }

    /**
     * @ Handle the pre-screening test and determine
     * @ where to place the user.
    **/
    public function handleScreeningTest(Request $request) {
        if(ScreeningHelper::handleScreeningTest($request)) {
            return redirect('/home');
        }
    }
}