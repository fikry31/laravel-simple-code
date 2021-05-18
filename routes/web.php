<?php

use Illuminate\Support\Facades\Route;

//Route Parameters
// First Route method - Root URL will match this method
Route::get('/', function () {
   return view('welcome');
});

// Second Route method - Root URL with ID will match this method
Route::get('ID/{id}',function($id){
   echo 'ID: '.$id;
});

// Third Route method - Root URL with or without name will match this method
Route::get('/user/{name?}',function($name = 'Muhammad Fikry'){
   echo "Name: ".$name;
});

//Named Routes
Route::get('id/profile', function () {
    $url = URL::route('profile');
    $redirect = Redirect::route('profile');
    $name = Route::currentRouteName();
    return "The url is : " .$url. " | Name : ".$name;
})->name('profile');

//Route Groups
Route::group([], function()  
{  
   Route::get('/first',function()  
 {  
   echo "first route";  
 });  
Route::get('/second',function()  
 {  
   echo "second route";  
 });  
Route::get('/third',function()  
 {  
   echo "third route";  
 });  
}); 

//Route Groups (Path Prefixes)
Route::group(['prefix' => 'research'], function()  
{  
   Route::get('/human-activity-recognition',function()  
 {  
   echo "Human Activity Recognition";  
 });  
Route::get('/machine-learning',function()  
 {  
   echo "Machine Learning";  
 });  
 Route::get('/image-processing',function()  
  {  
    echo "Image Processing";  
  });  
}); 

//Route Groups (Route Name Prefixes)
Route::name('admin.')->group(function()  
{  
   Route::get('users', function()  
{  
 return "admin.users";  
})->name('users');  
});

//Route Groups (Middleware)
Route::middleware(['year'])->group( function()  
{  
    Route::get('/human-activity-recognition',function()  
  {  
    echo "Human Activity Recognition";  
  });  
 Route::get('/machine-learning',function()  
  {  
    echo "Machine Learning";  
  });  
  Route::get('/image-processing',function()  
   {  
     echo "Image Processing";  
   });  
  
});  

//Resource Controllers
use App\Http\Controllers\ResearchController;
Route::resources([
    'research' => ResearchController::class,
    'themes' => ResearchController::class,
]);

//view
Route::get('/members', function(){  
    return view('members',['name'=>'Fikry']);  
  });

//Blade templates
Route::get('/contact', function () {
    return view('contact');
});