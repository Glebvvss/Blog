<?php

Route::group(['as' => 'pages'], function() {
	Route::get('/', 'PagesController@indexPage');
	Route::get('/single-post/{id}', 'PagesController@singlePostPage')->where(['id' => '[0-9]+']);
	Route::get('/about', 'PagesController@aboutPage');
	Route::get('/contact', 'PagesController@contactPage');

	//auth routes
	Route::get('/login', 'PagesController@loginPage');
	Route::get('/registration', 'PagesController@registrationPage');
});

Route::group(['as' => 'auth'], function() {
	Route::post('/login-action', 'AuthController@login');
	Route::get('/logout-action', 'AuthController@logout');
	Route::post('/registration-action', 'AuthController@registration');
});

Route::group(['as' => 'comments.'], function() {
	Route::get('/get-comments-component', 'CommentsController@getCommentsComponent');
	Route::post('/add-comment', 'CommentsController@addComment');//->middleware('auth');
	Route::post('/drop-comment', 'CommentsController@dropComment');//->middleware('auth');
});

Route::get('/home', 'HomeController@index')->name('home');