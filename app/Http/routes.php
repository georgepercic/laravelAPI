<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix' => 'api/v1', 'middleware' => 'log'), function()
{
    //nou

    //Articles
    Route::get('articles', ['as' => 'apiArticleIndex', 'uses' => 'Api\ArticleController@index']);
    Route::post('articles', ['as' => 'apiArticleStore', 'uses' => 'Api\ArticleController@store']);
    Route::delete('articles/{id}', ['as' => 'apiArticleDestroy', 'uses' => 'Api\ArticleController@destroy']);
    Route::put('articles/{id}', ['as' => 'apiArticleUpdate', 'uses' => 'Api\ArticleController@update']);

    //Blocks
    Route::get('blocks', ['as' => 'apiBlockIndex', 'uses' => 'Api\BlockController@index']);
    Route::post('blocks', ['as' => 'apiBlockStore', 'uses' => 'Api\BlockController@store']);
    Route::delete('blocks/{id}', ['as' => 'apiBlockDestroy', 'uses' => 'Api\BlockController@destroy']);
    Route::put('blocks/{id}', ['as' => 'apiBlockUpdate', 'uses' => 'Api\BlockController@update']);

    //Categories
    Route::get('categories', ['as' => 'apiCategoryIndex', 'uses' => 'Api\CategoryController@index']);
    Route::post('categories', ['as' => 'apiCategoryStore', 'uses' => 'Api\CategoryController@store']);
    Route::delete('categories/{id}', ['as' => 'apiCategoryDestroy', 'uses' => 'Api\CategoryController@destroy']);
    Route::put('categories/{id}', ['as' => 'apiCategoryUpdate', 'uses' => 'Api\CategoryController@update']);

    //Comments
    Route::get('comments', ['as' => 'apiCommentIndex', 'uses' => 'Api\CommentController@index']);
    Route::post('comments', ['as' => 'apiCommentStore', 'uses' => 'Api\CommentController@store']);
    Route::delete('comments/{id}', ['as' => 'apiCommentDestroy', 'uses' => 'Api\CommentController@destroy']);
    Route::put('comments/{id}', ['as' => 'apiCommentUpdate', 'uses' => 'Api\CommentController@update']);

    //Courses
    Route::get('courses', ['as' => 'apiCourseIndex', 'uses' => 'Api\CourseController@index']);
    Route::post('courses', ['as' => 'apiCourseStore', 'uses' => 'Api\CourseController@store']);
    Route::delete('courses/{id}', ['as' => 'apiCourseDestroy', 'uses' => 'Api\CourseController@destroy']);
    Route::put('courses/{id}', ['as' => 'apiCourseUpdate', 'uses' => 'Api\CourseController@update']);

    //Lessons
    Route::get('lessons', ['as' => 'apiLessonIndex', 'uses' => 'Api\LessonController@index']);
    Route::post('lessons', ['as' => 'apiLessonStore', 'uses' => 'Api\LessonController@store']);
    Route::delete('lessons/{id}', ['as' => 'apiLessonDestroy', 'uses' => 'Api\LessonController@destroy']);
    Route::put('lessons/{id}', ['as' => 'apiLessonUpdate', 'uses' => 'Api\LessonController@update']);

    //Meta
    Route::get('meta', ['as' => 'apiMetaIndex', 'uses' => 'Api\MetaController@index']);
    Route::post('meta', ['as' => 'apiMetaStore', 'uses' => 'Api\MetaController@store']);
    Route::delete('meta/{id}', ['as' => 'apiMetaDestroy', 'uses' => 'Api\MetaController@destroy']);
    Route::put('meta/{id}', ['as' => 'apiMetaUpdate', 'uses' => 'Api\MetaController@update']);

    //Tags
    Route::get('tags', ['as' => 'apiTagIndex', 'uses' => 'Api\TagController@index']);
    Route::post('tags', ['as' => 'apiTagStore', 'uses' => 'Api\TagController@store']);
    Route::delete('tags/{id}', ['as' => 'apiTagDestroy', 'uses' => 'Api\TagController@destroy']);
    Route::put('tags/{id}', ['as' => 'apiTagUpdate', 'uses' => 'Api\TagController@update']);

    //Tag Entities
    Route::get('tag-entities', ['as' => 'apiTagEntitiesIndex', 'uses' => 'Api\TagEntityController@index']);
    Route::post('tag-entities', ['as' => 'apiTagEntitiesStore', 'uses' => 'Api\TagEntityController@store']);
    Route::delete('tag-entities/{id}', ['as' => 'apiTagEntitiesDestroy', 'uses' => 'Api\TagEntityController@destroy']);
    Route::put('tag-entities/{id}', ['as' => 'apiTagEntitiesUpdate', 'uses' => 'Api\TagEntityController@update']);

    //Teachers
    Route::get('teachers', ['as' => 'apiTeacherIndex', 'uses' => 'Api\TeacherController@index']);
    Route::post('teachers', ['as' => 'apiTeacherStore', 'uses' => 'Api\TeacherController@store']);
    Route::delete('teachers/{id}', ['as' => 'apiTeacherDestroy', 'uses' => 'Api\TeacherController@destroy']);
    Route::put('teachers/{id}', ['as' => 'apiTeacherUpdate', 'uses' => 'Api\TeacherController@update']);


});

Route::get('auth/validate-email/{token}', ['as' => 'validateEmail', 'uses' => 'Auth\AuthController@validateEmail']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);