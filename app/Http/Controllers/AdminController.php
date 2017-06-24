<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDashboard()
    {
    	/**
    	 * Get all users
    	**/
    	$user = $this->getAllUsers();

    	$program = Program::all();

    	return view('admin.dashboard', [
    		'user' => $user,
    		'program' => $program
    	]);
    }
	/**
	 * @ Get all registered users.
	 * TODO: Remove users with admin role when 
	 * we add the role options.
	 * TODO: Remove password from this array
	 * TODO: Remove security questions from this array
	**/
	public function getAllUsers() {
		$user = User::all()->all();
		foreach($user as &$u) {
			$u = $u->getAttributes();
			$u = json_encode($u);
			$u = json_decode($u);
			//$u->dob = Carbon::parse($u->dob);
			$u->address = json_decode($u->address);
			//$u->goals = json_decode($u->goals);
			$u->program_start = Carbon::parse($u->program_start);
			$u->week_one = Carbon::parse($u->week_one);
			$u->created_at = Carbon::parse($u->created_at);

		}
		return $user;
	}

	public function getArchive()
	{
		return view('admin.archive');
	}
}
