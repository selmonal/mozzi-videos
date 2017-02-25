<?php

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

Route::get('api/videos', function () {
	return App\Video::latest()->paginate(20);
});

Route::post('api/videos', function () {
	return App\Video::fromYoutubeUrl(request('url'));
});

Route::get('api/search', function () {
	return App\Video::search(request('q'))->paginate();
});

Route::post('api/videos/{video}/watch', function (App\Video $video) {
	$watched = session()->has('watched') ? session('watched') : [];

	if (! in_array($video->id, $watched)) {
		$video->incrementViewsCount();
		array_push($watched, $video->id);
		session(compact('watched'));
	}

	return $video;
});

Route::get('api/videos/{video}/up-nexts', function (App\Video $video) {
	return App\Video::take(10)->get();
});

Route::get('/api/users/{username}', function ($username) {
	return App\User::where('name', $username)->firstOrFail();
});

Route::get('/api/users/{username}/videos', function ($username) {
	$user = App\User::where('name', $username)->firstOrFail();
	return $user->videos()->paginate();
});

Route::any('{all}', function () {
    return view('welcome');
})
->where(['all' => '.*']);