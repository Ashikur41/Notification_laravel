<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailNotification;
use App\Models\User;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/userRegistration', function () {


// });
Route::controller(ProductController::class)->group(function () {
    Route::post('userRegistration', 'event')->name('event');
});
Route::get('/send-notification',function(){

    // $user=User::find(1);
    // $user->notify(new EmailNotification());

    $users=User::all();
    foreach($users as $user){
        Notification::sendNow($user, new EmailNotification());
    }

    return redirect()->back();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
