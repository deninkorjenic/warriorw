<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ChallengesHelper;

class ChallengesController extends Controller
{
    /**
     * Show the challenges summary
    **/
    public function index() {
        $view = ChallengesHelper::areChallengesSetUp();
        return $view;
    }

	/**
     * Set up the challenges for the user
    **/
    public function setUpChallenges(Request $request) {
        if(ChallengesHelper::setUpChallenges($request)) {
            return redirect('/home');
        }
    }
}