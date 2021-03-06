<?php

// Authentication routs
Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Only admin is allowed
Route::middleware(['auth', 'isuseradmin'])->group(function () {
    // Weeks CRUD routes
    Route::resource('weeks', 'WeekController');

    // Task CRUD routes
    Route::resource('tasks', 'TaskController');

    // Training CRUD routes
    Route::resource('trainings', 'TrainingController');

    // Education CRUD routes
    Route::resource('educations', 'EducationController');

    // Program CRUD routes
    Route::resource('programs', 'ProgramController');

    // Quizes CRUD routes
    Route::resource('quizes', 'QuizController');

    // Activities CRUD routes
    Route::resource('activities', 'ActivityController');

    // Admin stuff
    Route::get('/dashboard', 'AdminController@getDashboard');
    Route::get('/archive', 'AdminController@getArchive');
});
// User is not able to complete his/her profile if there's no program to sell
Route::middleware(['auth', 'programexistance'])->group(function () {
    Route::get('/profile-setup', 'ProfileController@index');
    Route::post('/profile-setup', 'ProfileController@updateProfile');
    Route::get('/screening-test', 'ProfileController@screeningTest');
    Route::post('/screening-test', 'ProfileController@handleScreeningTest');
});
// Routes available only after profile is finished and user payed for program
Route::middleware(['auth', 'fullprofile'])->group(function () {
    // Rest of controllers
    Route::get('/home', 'HomeController@showSummary');
    Route::get('/', 'HomeController@showSummary');
    Route::post('/home', 'HomeController@updateGoals');

    Route::get('/week-{number}', 'ProgramController@getWeek');
    // Food diary routes
    Route::get('/food-diary', 'ProgramController@getFoodDiary');
    Route::post('/food-diary', 'ProgramController@updateFoodDiary');
    Route::get('/quiz-{number}', 'ProgramController@getQuiz');

    // TODO: This will be changed to CRUD probably
    Route::get('/challenges', 'ChallengesController@index');
    Route::post('/challenges', 'ChallengesController@setUpChallenges');

    // Route used to update task status
    Route::post('/update-task', 'TaskController@updateTaskStatus');
    // Route used to update training status
    Route::post('/update-training', 'TrainingController@updateTrainingStatus');
    // Route used to update education status
    Route::post('/update-education', 'EducationController@updateEducationStatus');
    // Route used to update quiz status
    Route::post('/update-quiz', 'QuizController@updateQuizStatus');
    // Route used to view all user notifications
    Route::get('/notifications/{markAsRead?}', 'GetNotification@getNotifications')->where('markAsRead', '[0-1]+');
    // Route used to mark notification as read
    Route::get('/notification/{notificationId}', 'GetNotification@markAsRead');
});
Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        Auth::logout();

        return redirect('/home');
    });
});
