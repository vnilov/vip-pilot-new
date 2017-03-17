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
/*        $phone = htmlspecialchars(strip_tags($request->input("phone")));
        $name = htmlspecialchars(strip_tags($request->input("name")));
        $time = htmlspecialchars(strip_tags($request->input("time")));

        $to = 'nilov.vadim@gmail.com';
        $subject = 'Новое сообщение отправленное с сайта';
        $message = 'Номер телефона: ' . $phone . "<br>Удобное время: " . $time . "<br>Время: " . $name;
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: info@vip-pilot.ru' . "\r\n";

        mail($to, $subject, $message, $headers);*/
        \Illuminate\Support\Facades\Mail::to('nilov.vadim@gmail.com')->send(new \App\Mail\Order($request));
        
    }
    return redirect('/');
});

Route::get('{path?}', 'Pub\MainController@index')->where('path', '^(?!'.config('backpack.base.route_prefix', 'admin').').*');

