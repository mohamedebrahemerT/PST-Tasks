<?php
	use Illuminate\Support\Facades\Route;
	Route::get('/', function () {
	    return view('auth/login');
	});
	
	// all type of users have appelety to view all this routes ..
	// this route for login and register
	Auth::routes();
	Route::get('/home', 'Admin\HomeController@index')->name('home');
	Route::get('/home2', 'Admin\HomeController@index')->name('home2');
	Route::get('/home3', 'Admin\HomeController@index')->name('home3');
	Route::post('/login_user', 'Admin\LoginController@login')->name('login_user');


   

   Route::get('/project_status','reportscontroller@project_status_list');
   
   Route::post('/project_status','reportscontroller@project_status');
   
    Route::get('/phase_status','reportscontroller@phase_status_list');
   
   Route::post('/phase_status','reportscontroller@phase_status');
  


   Route::get('/project_period','reportscontroller@project_period_list');
   
   Route::post('/project_period','reportscontroller@project_period');
   
   Route::get('/search_project_period','reportscontroller@search_project_period');



   Route::get('/developer_phase','reportscontroller@developer_phase_list');
   
   Route::post('/developer_phase','reportscontroller@developer_phase');
    
   
Route::get('/adus_phase','reportscontroller@adus_phase_list');
   
   Route::post('/adus_phase','reportscontroller@adus_phase');










   Route::get('/projects','projectscontroller@index');
   Route::post('/addprojects','projectscontroller@store');

   Route::get('/addshow','projectscontroller@create');
 

   
   

Route::put('/edit','projectscontroller@update');
Route::get('/projects/{id}/edit', 'projectscontroller@edit');

   Route::get('/layout.projects', 'projectscontroller@index');

Route::post('/updateprojects','projectscontroller@update');

Route::put('/delete','projectscontroller@delete');

Route::get('/projects/{id}/delete','projectscontroller@delete');

Route::get('/uploadfileproject/{id}','projectscontroller@uploadfileproject');

Route::post('/uploadfileprojectpost','projectscontroller@uploadfileprojectpost');


Route::get('/phases','phasecontroller@index');

 Route::get('/phases','phasecontroller@index');
Route::post('/createphases','phasecontroller@store');
 Route::get('/addphases','phasecontroller@create');
 Route::post('/updatephases','phasecontroller@update');
 Route::put('/delete','phasecontroller@delete');
Route::get('/phases/{id}/delete','phasecontroller@delete');
Route::put('/edit','phasecontroller@update');

Route::get('/phases/{id}/edit','phasecontroller@edit');
Route::get('/phases/{id}/{project_id}/phase_Delivery_now','phasecontroller@phase_Delivery_now');
Route::get('/phases/{id}/Request_extra_hours','phasecontroller@Request_extra_hours');
Route::post('Request_extra_hours','phasecontroller@Request_extra_hours_post');


Route::get('/phases/{id}/View_delays','phasecontroller@View_delays');


 
Route::get('/phasesuploadfile/{id}','phasecontroller@phasesuploadfile');

Route::post('/phasesuploadfilepost','phasecontroller@phasesuploadfilepost');


Route::get('/showphasesforthisproject/{id}','phasecontroller@showphasesforthisproject');
Route::post('/project_phases','phasecontroller@project_phases');




Route::get('/users','userscontroller@index');
Route::post('/addusers','userscontroller@store');

Route::get('/addusers','userscontroller@create');

Route::put('/edit','userscontroller@update');
Route::get('/User/{id}/edit','userscontroller@edit');

Route::get('/layout.users','userscontroller@index');

Route::post('/updateusers','userscontroller@update');

Route::put('/delete','userscontroller@delete');
Route::get('/User/{id}/delete','userscontroller@delete');

Route::put('/show','projectscontroller@view');
Route::get('viewprojects/{id}','projectscontroller@show');
Route::post('/addcommentProject','commentcontroller@addcommentProject');


Route::put('/show','phasecontroller@view');
Route::get('viewphases/{id}','phasecontroller@show');


Route::post('/addcommentphases','commentcontroller@addcommentphases');


Route::get('/status','statuscontroller@index');
Route::post('/addstatus','statuscontroller@store');

Route::get('/addstatus','statuscontroller@create');
Route::put('/edit','statuscontroller@update');
Route::get('/status/{id}/edit','statuscontroller@edit');
Route::post('/updatestatus','statuscontroller@update');
 


 





	
Route::get('language/{lang}',function($lang){
        \Session::put('lang', $lang);
        \App::setLocale($lang);
        return redirect()->back();
    });