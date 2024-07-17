<?php


use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use \App\Http\Controllers\ListingController;

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
//all lists
Route::get('/', [ListingController::class, 'index']);
////listings/{{$listing->id}}
/// //create listing
Route::get('/listings/create',
    [ListingController::class, 'create']
)->middleware('auth');
//store listing
Route::post('/listings',
    [ListingController::class, 'store']
)->middleware('auth');
// show edit
Route::get('/listings/{listing}/edit',
    [ListingController::class, 'edit'])->middleware('auth');
//update submit to update
Route::put('/listings/{listing}',
    [ListingController::class, 'update'])->middleware('auth');
//delete listing
Route::delete('/listings/{listing}',
    [ListingController::class, 'destroy'])->middleware('auth');
//show manage listing
Route::get('/listings/manage',
    [ListingController::class, 'manage']
)->middleware('auth');
///single list
Route::get('/listings/{listing}',
    [ListingController::class, 'show']
);

///register
Route::get('/register',
    [UserController::class, 'create']
)->middleware('guest');

///create new user
Route::post('/users',
    [UserController::class, 'store']
);
///logout
Route::post('/logout',
    [UserController::class, 'logout']
)->middleware('auth');

// show login form
Route::get('/login',
    [UserController::class, 'login']
)->name('login')->middleware('guest');
//log in user
Route::post('/users/authenticate',
    [UserController::class, 'authenticate']
);

//Route::get('/listings/{id}',function (Listing $listing){
//    return view('listing',['listing'=>Listing::find($id)]);
//});


Route::get('/user/{id}', function ($id) {
    return 'User ' . $id;
});
//Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
//
//});
Route::get('/user/{name?}', function ($name = null) {
    return $name;
});

Route::get('/user/{name?}', function ($name = 'John') {
    return $name;
});
Route::get('/user/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');


Route::get('/user/{id}', function ($id) {
    return 'idddd' . $id;
})->where('id', '[0-9]+');


Route::get('/user/{id}/{name}', function ($id, $name) {
    return "nameWithId" . $id . " " . $name;

})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/category/{category}', function ($category) {
    return $category;
})->whereIn('category', ['movie', 'song', 'painting']);
///
//Route::get('/hii', function () {
//    return response("<h1>hiiiiii </h1>")
//        ->header('Content-Type','text/plain')
//        ->header('foo','bar');
//});
//Route::get('/posts/{id}',function ($id){
////    ddd($id);
//    return response("post".$id);
//})->where('id','[0-9]+');
//
//Route::get('/search', function (Request  $request) {
//    return $request->name .' '.$request->city;
//});
Route::view("contact-me", "pages.contact",
    ['page_name' => 'Contact Me Page',
        'Description' => 'This is description'])->name('CONTACT');

Route::get('categories/{id}', function ($id) {

    $cat = ["1" => "games",
        "2" => "books",
        "3" => "testt"];

    return view("pages.categories", ["the_category_is" => $cat[$id] ?? " this id Not Found"]);
});
Route::view('masterr', "master.master")->name('HOME');
Route::view('about-me', 'pages.about')->name('ABOUT');
