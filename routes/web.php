<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TaskListController;
use App\Http\Middleware\RedirectAuthenticatedUser;

Route::redirect('/', '/login');
Route::middleware(['auth'])->group(function (): void {
    Route::get('/tasks', TaskListController::class);
});
Route::middleware([RedirectAuthenticatedUser::class])->group(function (): void {
    Route::view('/login', 'page.login');
    Route::post('/login', LoginController::class);
});
Route::get('/logout', LogoutController::class);
