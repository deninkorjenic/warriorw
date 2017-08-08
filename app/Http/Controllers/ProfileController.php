<?php
namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Helpers\ProfileHelper;
use App\Helpers\ScreeningHelper;

use CountryState;

/**
 * Form request validator
 */
use App\Http\Requests\ProfileSetupRequest;
use App\Http\Requests\ScreeningTestRequest;

class ProfileController extends Controller
{
    /**
     * Handle the pre-screening test and determine
     * where to place the user.
     *
     * @param  Illuminate\Http\Request  $request HTTP Request
     * @return Illuminate\Http\Response Returns redirect response
     */
    public function handleScreeningTest(ScreeningTestRequest $request)
    {

        if (auth()->user()->finished_profile) {
            return redirect('/home');
        } elseif (auth()->user()->role === 'admin') {
            return redirect('/programs');
        }

        if (ScreeningHelper::handleScreeningTest($request)) {
            return redirect('/home');
        }

    }

    /**
     * Display the form for setting up
     * the user profile
     */
    public function index()
    {

        if (auth()->user()->finished_profile) {
            return redirect('/home');
        } elseif (auth()->user()->role == 'admin') {
            return redirect('/programs');
        }

        return view('profile.profile', ['userInfo' => ProfileHelper::getUserInfo()]);
    }

    /**
     * Show the final screening test to decide on
     * user wellnes score.
     */
    public function screeningTest()
    {

        if (auth()->user()->finished_profile) {
            return redirect('/home');
        } elseif (auth()->user()->role === 'admin') {
            return redirect('/programs');
        }

        $activities = Activity::all();

        return view('profile.screening', ['activities' => $activities]);
    }

    /**
     * Update the user profile with the
     * new data we acquired. This function
     * will probably be expanded with the
     * client's input
     */
    public function updateProfile(ProfileSetupRequest $request)
    {

        ProfileHelper::updateProfile($request);

        return redirect('/screening-test');
    }

}
