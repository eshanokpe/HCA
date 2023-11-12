<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::middleware(['auth', 'admin'])->group(function () {
    // Your admin routes here
    
});

Route::middleware('admin')->group(function () {
    // Your admin-specific routes here
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin_hca', [App\Http\Controllers\AdminController::class, 'createhca'])->name('admin.createhca');
    Route::get('/admin/hcaworkers', [App\Http\Controllers\AdminController::class, 'hcaworkers'])->name('admin.hcaworkers');
    Route::post('/admin/hca_post', [App\Http\Controllers\AdminController::class, 'postcreatehca'])->name('admin.postcreatehca');
    Route::get('/admin/nurses', [App\Http\Controllers\AdminController::class, 'nurses'])->name('admin.nurses');
    Route::get('/admin/nurse', [App\Http\Controllers\AdminController::class, 'createnurse'])->name('admin.createnurse');
    Route::get('/admin/edit/nurse/{id}', [App\Http\Controllers\AdminController::class, 'editnurse'])->name('admin.editnurse');
    Route::put('/admin/update/nurse/{nurse}', [App\Http\Controllers\AdminController::class, 'updatenurse'])->name('admin.updatenurse');

    Route::post('/admin/nurse_post', [App\Http\Controllers\AdminController::class, 'postcreatenurse'])->name('admin.postcreatenurse');
   
    Route::get('/admin_resident', [App\Http\Controllers\AdminController::class, 'createresident'])->name('admin.createresident');
    Route::post('/admin_resident_post', [App\Http\Controllers\AdminController::class, 'postcreateresident'])->name('admin.postcreateresident');
    Route::get('/admin/residents', [App\Http\Controllers\AdminController::class, 'residents'])->name('admin.residents');
    Route::get('/admin/edit/residents/{id}', [App\Http\Controllers\AdminController::class, 'editresidents'])->name('admin.editresidents');
    Route::put('/admin/update/residents/{residents}', [App\Http\Controllers\AdminController::class, 'updateresidents'])->name('admin.updateresidents');


    Route::post('/admin_logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/admin_login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
    Route::get('/shifts', [App\Http\Controllers\AdminController::class, 'shifts'])->name('admin.shifts');
    Route::get('/shifts/edit/{id}', [App\Http\Controllers\AdminController::class, 'editshift'])->name('admin.editshift');
    Route::post('/shifts/update/{id}', [App\Http\Controllers\AdminController::class, 'updateshift'])->name('admin.updateshift');
    Route::get('/shifts/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteshift'])->name('admin.deleteshift');

    Route::get('/addShifts', [AdminController::class, 'addshifts'])->name('admin.addShifts');
    Route::post('/addShifts', [AdminController::class, 'postcreateShift'])->name('admin.postcreateShift');

});
Route::middleware('hca')->group(function () {
    // Your admin-specific routes here
    Route::get('/hca', [App\Http\Controllers\HcaController::class, 'dashboard'])->name('hca.index');
    Route::get('/resident{id}', [App\Http\Controllers\HcaController::class, 'resident'])->name('hca.resident');
    Route::get('/note{id}', [App\Http\Controllers\HcaController::class, 'note'])->name('hca.note');
    Route::post('/hca_note_post', [App\Http\Controllers\HcaController::class, 'postnote'])->name('hca.postnote');
    Route::post('/hca_logout', [App\Http\Controllers\HcaController::class, 'logout'])->name('hca.logout');
    Route::get('/forms{id}', [App\Http\Controllers\HcaController::class, 'form'])->name('hca.forms');
    Route::get('/formbowel{id}', [App\Http\Controllers\HcaController::class, 'form_bowel'])->name('hca.formbowel');
    Route::post('/formbowel_post', [App\Http\Controllers\HcaController::class, 'postform_bowel'])->name('hca.postform_bowel');
    Route::get('/formfluid{id}', [App\Http\Controllers\HcaController::class, 'form_fluid'])->name('hca.formfluid');
    Route::post('/formfluid_post', [App\Http\Controllers\HcaController::class, 'postform_fluid'])->name('hca.postform_fluid');
});
Route::get('/forgot-password', [App\Http\Controllers\HcaController::class, 'forgotpassword'])->name('hca.forgot-password');
Route::post('/post-forgot-password', [App\Http\Controllers\HcaController::class, 'submitForgetPasswordForm'])->name('hca.postforgetpassword');
Route::get('hcareset-password/{token}', [App\Http\Controllers\HcaController::class, 'showResetPasswordForm'])->name('hcareset.password.get');
Route::post('hcareset-password/', [App\Http\Controllers\HcaController::class, 'submitResetPasswordForm'])->name('hca.postresetpassword');
   


Route::post('/admin_login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::get('/admin_signin', [App\Http\Controllers\AdminController::class, 'signin'])->name('admin.signin');
Route::post('/nurse_login', [App\Http\Controllers\NurseController::class, 'login'])->name('nurse.login');
Route::get('/nurse/signin', [App\Http\Controllers\NurseController::class, 'signin'])->name('nurse.signin');
Route::middleware('nurse')->group(function () {
    // Your admin-specific routes here
    Route::get('/nurse', [App\Http\Controllers\NurseController::class, 'dashboard'])->name('nurse.index');
    Route::post('/nurseLogout', [App\Http\Controllers\NurseController::class, 'logout'])->name('nurse.logout');
});
Route::post('/hca_login', [App\Http\Controllers\HcaController::class, 'login'])->name('hca.login');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('reset-password/{token}', [App\Http\Controllers\HcaController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password/', [App\Http\Controllers\HcaController::class, 'submitResetPasswordForm'])->name('reset.password.post');
   