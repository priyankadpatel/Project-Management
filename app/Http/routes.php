<?php 
 



Route::resource('projects', 'ProjectController');
 
Route::post('projects/{projects}/tasks', [
    'uses' => 'ProjectTasksController@postNewTask',
    'as' => 'projects.tasks.create'
]);

Route::get('projects/{projects}/tasks/{tasks}/edit', [
    'uses' => 'ProjectTasksController@getOneProjectTask',
    'as' => 'projects.tasks'
]);
Route::delete('projects/{projects}/tasks/{tasks}', [
    'uses' => 'ProjectTasksController@deleteOneProjectTask',
]);

Route::put('projects/{projects}/tasks/{tasks}', [
    'uses' => 'ProjectTasksController@updateOneProjectTask',
]); 

Route::post('projects/{projects}/collaborators', [
    'uses' => 'ProjectCollaboratorsController@addCollaborator',
    'as'   => 'projects.collaborators.create',
    'middleware' => ['auth']
]);

Route::post('projects/{projects}/comments', [
    'uses' => 'ProjectCommentsController@postNewComment',
    'as'   => 'projects.comments.create',
    'middleware' => ['auth']
]);

Route::get('projects/{projects}/comments/{comments}/edit', [
    'uses' =>'ProjectCommentsController@getOneProjectComment',
    'as' => 'projects.comments'
]);

Route::put('projects/{projects}/comments/{comments}', [
    'uses' => 'ProjectCommentsController@updateOneProjectComment',
]);

Route::delete('projects/{projects}/comments/{comments}', [
    'uses' => 'ProjectCommentsController@deleteOneProjectComment',
]);

Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'index'
]);
Route::get('/auth/register', [
    'uses' => 'AuthController@getRegister',
    'as'   => 'auth.register',
    'middleware' => ['guest']
  ]);

Route::post('/auth/register', [
    'uses' => 'AuthController@postRegister',
    'middleware' => ['guest']
 ]);

Route::get('/auth/signin', [
    'uses' => 'AuthController@getLogin',
    'as'   => 'auth.login',
    'middleware' => ['guest']
 ]);

Route::post('/auth/signin', [
    'uses' => 'AuthController@postLogIn',
 	'middleware' => ['guest']
 ]);
Route::get('/logout', [
    'uses' => 'AuthController@logOut',
    'as'   => 'auth.logout'
]);

Route::post('projects/{projects}/files', [
     'uses' => 'FilesController@uploadAttachments',
     'as'   => 'projects.files',
     'middleware' => ['auth']
]);
/*Route::post('tasks/{projects}','ProjectTasksController@postNewTask');*/

/*Route::post('disp','ProjectTasksController@disp');*/

  
 
 
 