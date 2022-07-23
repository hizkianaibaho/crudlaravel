<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeesController;

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
    $jumlahpegawai = Employee::count();
    $jumlahpegawailaki = Employee::where('jeniskelamin' , 'laki-laki')->count();
    $jumlahpegawaiperempuan = Employee::where('jeniskelamin' , 'perempuan')->count();

    return view('welcome' , compact('jumlahpegawai' , 'jumlahpegawailaki' , 'jumlahpegawaiperempuan'));
})->middleware('auth');

Route::get('/pegawai', [EmployeesController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai', [EmployeesController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeesController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeesController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeesController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [EmployeesController::class, 'delete'])->name('delete');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');


Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

