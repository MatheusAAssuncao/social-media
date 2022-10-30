<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'title' => 'Hello World',
//         'friends' => [
//             ['firstName' => 'Jane', 'surname' => 'Warren', 'age' => '92', 'gender' => 'female'],
//             ['firstName' => 'John', 'surname' => 'Doe', 'age' => '21', 'gender' => 'male'],
//             ['firstName' => 'Marcos', 'surname' => 'Lucas', 'age' => '28', 'gender' => 'male'],
//             ['firstName' => 'Rita', 'surname' => 'Pegorari', 'age' => '14', 'gender' => 'female'],
//             ['firstName' => 'Maria', 'surname' => 'Gonçalves', 'age' => '44', 'gender' => 'female'],
//             ['firstName' => 'Juliano', 'surname' => 'Santos', 'age' => '50', 'gender' => 'male'],
//             ['firstName' => 'Jeremias', 'surname' => 'Duarte', 'age' => '25', 'gender' => 'male'],
//             ['firstName' => 'Matheus', 'surname' => 'Gomes', 'age' => '32', 'gender' => 'male'],
//         ],
//     ]);
// });

Route::get('/', [UserController::class, 'index']);

Route::get('connections/', function () {
    return Inertia::render('Connections', [
        'friends' => 'My Friends'
    ]);
});

