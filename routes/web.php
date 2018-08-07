<?php

Route::group(['as' => 'pages'], function() {
	Route::get('/', 'PagesController@indexPage');
	Route::get('/single-post/{id}', 'PagesController@singlePostPage')->where(['id' => '[0-9]+']);
	Route::get('/about', 'PagesController@aboutPage');
	Route::get('/contact', 'PagesController@contactPage');
	Route::get('/login', 'PagesController@loginPage');
	Route::get('/registration', 'PagesController@registrationPage');
});

Route::group(['as' => 'auth'], function() {
	Route::post('/login-action', 'AuthController@login');
	Route::get('/logout-action', 'AuthController@logout');
	Route::post('/registration-action', 'AuthController@registration');
});

Route::group(['as' => 'index'], function() {
	Route::get('/get-posts', 'PostController@getPosts')->middleware('ajax');
});

Route::group(['as' => 'comments-component.'], function() {
	Route::get('/get-comments', 'CommentsController@getComments')->middleware('ajax');
	Route::post('/add-comment', 'CommentsController@addComment')->middleware(['auth', 'ajax']);
	Route::post('/drop-comment', 'CommentsController@dropComment')->middleware(['auth', 'ajax']);
});

Route::group(['prefix' => '/admin'], function() {	
	Route::get('/', 'Admin\PagesController@indexPage');

	//components
	Route::get('/get-page-manager', 'Admin\PageManagerController@getManager');
	Route::get('/get-user-manager', 'Admin\UserController@getManager');
	Route::get('/get-post-manager', 'Admin\PostManagerController@getManager');

	//posts	
	Route::get('/get-post', 'Admin\PostManagerController@getPost');
	Route::get('/get-posts', 'Admin\PostManagerController@getPosts');
	Route::get('/posts-pagination', 'Admin\PostManagerController@pagination');
	Route::post('/add-post', 'Admin\PostManagerController@add');
	Route::post('/update-post', 'Admin\PostManagerController@update');
	Route::post('/drop-post', 'Admin\PostManagerController@drop');

	//users
	Route::get('/change-role', 'Admin\UserController@changeRole');
});