<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Inbox;
use App\Models\Comments;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ImagesController;
use Egulias\EmailValidator\Parser\Comment;
use App\Http\Controllers\CommentsController;
use App\Models\Images;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{lang?}', function ($lang = "en") {
    if ($lang == 'en' || $lang == 'ps' || $lang == 'fa') {
        App::setLocale($lang);
        $images = Images::orderBy('created_at', 'desc')->take('9')->get();
        return view('welcome', compact('images'));
    } elseif ($lang == 'login') {
        return view('auth.login');
    } else {
        return view('notfound', compact('lang'));
    }
})->name('landing');
Route::post('user/contact', [InboxController::class, 'store'])->name('contact');
Route::post('user/comment', [CommentsController::class, 'store'])->name('comment');
Route::get('user/project/{lang?}', function ($lang = "en") {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('projects', compact('posts', 'lang'));
})->name('projects');
// the atenthecation part
Auth::routes([
    'verify' => true
]);
// end of atenthecation part
// the verfied users can access these routes 
Route::get('admin/dashboard', function () {
    $posts = Post::orderBy('created_at', 'desc')->take(6)->get();
    $comments = Comments::orderBy('created_at', 'desc')->take(3)->get();
    $inbox = Inbox::orderBy('created_at', 'desc')->take(3)->get();
    return view('admin.dashboard', compact('posts', 'comments', 'inbox'));
})->middleware(['auth', 'verified'])->name('dash');
Route::resource('admin/post', PostController::class)->middleware(['auth', 'verified']);
Route::get('admin/new', [PostController::class, 'new'])->middleware(['auth', 'verified'])->name('admin.new');
Route::post('admin/change', [PostController::class, 'change'])->middleware(['auth', 'verified'])->name('admin.change');
Route::resource('/image', ImagesController::class)->middleware(['auth', 'verified']);
Route::resource('admin/inbox', InboxController::class)->middleware(['auth', 'verified']);
Route::resource('admin/comment', CommentsController::class)->middleware(['auth', 'verified']);
Route::get('admin/profile', function () {
    if (Auth::user() && Auth::id()) {
        $id = Auth::id();
        $profile = User::find($id);
        return view('admin.profile', compact('profile'));
    } else {
        echo ("your are not authoraized to this route");
    }
})->middleware(['auth', 'verified'])->name('admin.profile');
//  end of verfied users

// these routes are for email verfication part 
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// end of email verfication part 
