<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use App\Models\UserProgram;

class AdminController extends Controller
{
    public function getArchive()
    {
        // First we need to get all programs that have educations
        $programs = Program::with(['weeks.education' => function($query) {
            $query->orderBy('created_at', 'asc');
        }])->get();

        return view('admin.archive', ['programs' => $programs]);
    }

    public function getDashboard()
    {
        /**
         * Get all users
         *
         */
        $users = User::all();

        $programs = Program::all();

        return view('admin.dashboard', [
            'users'        => $users,
            'programs'     => $programs,
        ]);
    }
}
