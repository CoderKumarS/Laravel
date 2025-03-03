<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/first', function () {
    return view('first');
})->name('first');
Route::get('/testfirst', function () {
    return redirect()->route('first');
});
Route::redirect('/testsecond', '/first');
Route::redirect('/testsecond/{name}', '/first/{name}');
Route::get('/testsecond/{name}', function ($name) {
    return view('first', ['name' => $name]);
});
Route::get('/testsecond/{name?}', function ($name = 'sara') {
    return $name;
})->name('testsecond');
Route::get('/testsecond/{name?}', function ($name = 'sara') {
    return $name;
})->name('testsecond')->where('name', '[A-Za-z]+');


Route::get('/home', function () {
    return response('Hello World', 200)
        ->header('Content-Type', 'text/plain');
});
Route::get('/Grade/{val}', function () {
    $val = request('val');
    if ($val > 50) {
        return response('pass', 200)
            ->header('Content-Type', 'text/plain');
    } else {
        return response('fail', 200)
            ->header('Content-Type', 'text/plain');
    }
});
Route::get('/Grade/{val?}', function () {
    $val = request('val');
    if ($val > 50) {
        return response('pass', 200)
            ->header('Content-Type', 'text/plain');
    } else {
        return response('fail', 200)
            ->header('Content-Type', 'text/plain');
    }
});

Route::view('/pd', 'test', ["name" => "sara"]);

Route::get('/pd2', function () {
    return view('test')->with('name', 'sara')->with('age', 20);
});
Route::get('/pd3', function ($name = 'Ashish', $age = '20') {
    return view('test', compact('name', 'age'));
});

Route::get('/first/{name}', function () {
    return view('first');
})->where('name', '[A-Za-z]+');
Route::get('/first/{name}', function () {
    return view('first');
})->whereAlphaNumeric('name');

Route::get('/students', function () {
    $students = [
        ['id' => 1, 'name' => 'sara', 'age' => 20, 'grade' => 50],
        ['id' => 2, 'name' => 'sara', 'age' => 20, 'grade' => 50],
        ['id' => 3, 'name' => 'sara', 'age' => 20, 'grade' => 50],
        ['id' => 4, 'name' => 'sara', 'age' => 20, 'grade' => 50],
        ['id' => 5, 'name' => 'sara', 'age' => 20, 'grade' => 50],
    ];
    return view('students', ['students' => $students]);
});

Route::get('/hom', function () {
    return response('Hello World', 200)
        ->header('Content-Type', 'text/plain');
});
Route::get('/home', function () {
    return response('Hello World', 200)
        ->header('X-Custom-header-1', 'kuldeep')
        ->header('X-Custom-header-2', 'Ratan')
        ->header('X-Custom-header-3', 'Mala');
});
Route::get('/homeMulti', function () {
    return response('Hello World', 200)->withHeaders([
        'X-Custom-header-1' => 'kuldeep',
        'X-Custom-header-2' => 'Ratan',
        'X-Custom-header-3' => 'Mala',
    ]);
});
