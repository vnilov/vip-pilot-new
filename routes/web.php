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

Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    // Backpack\MenuCRUD
    CRUD::resource('menu-item', 'MenuItemCrudController');
    CRUD::resource('counters', 'CounterController');
});

Route::post('mail', function(\Illuminate\Http\Request $request) {
    if ($request->has("phone")) {
        \Illuminate\Support\Facades\Mail::to('nilov.vadim@gmail.com')->send(new \App\Mail\Order($request));
        $request->session()->flash('mail_status', '1');
    }
    return redirect('/');
});

Route::get('{path?}', 'Pub\MainController@index')->where('path', '^(?!'.config('backpack.base.route_prefix', 'admin').').*');

