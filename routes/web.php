<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\UniversityController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ProgramController;
use \App\Http\Controllers\FilialsController;
use \App\Http\Controllers\CritereController;
use App\Http\Controllers\UserController;
use  App\Http\Controllers\RoleController;
use  App\Http\Controllers\PermissionController;
use  App\Http\Controllers\CommentModeratorController;
use Illuminate\Foundation\Application;
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

Route::get('/', function () {
    $topUniversities = \App\Models\University::orderBy('avarageRating', 'desc')
        ->limit(3) // Limiter à trois
        ->get(); // Récupérer les universités

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'topUniversities' => $topUniversities,
    ]);
});

Route::get('/detail/{id}', [UniversityController::class, 'show']);

Route::get('/AllUniv/', [UniversityController::class, 'show']);

Route::get('/universities/{id}', [UniversityController::class, 'update'])->name('universities.update');
Route::get('/delete/{id}', [UniversityController::class,'destroy']);

Route::get('/ap', function () {
    return Inertia::render('footer');
});

Route::get('/api', function () {
    $topUniversities = \App\Models\University::orderBy('avarageRating', 'desc')
        ->limit(3)
        ->get();
    $crit = \App\Models\Critere::all();
    $universities = \App\Models\University::all();
    $data = ['criteres' =>$crit,'universities' =>$universities];
    $content = view('home',
        ['topUniversities' => $topUniversities],
        ['data' => $data],

    )->render();
    return response()->json(['content' => $content]);
})->middleware(['auth', 'verified'])->name('home');

Route::get('/hd', function () {
    return response()->json([
        'content' => view('hd')->render(),
    ]);
})->middleware(['auth', 'verified'])->name('head');

Route::get('/accueil', function () {
    $topUniversities = \App\Models\University::orderBy('avarageRating', 'desc')
        ->limit(3)
        ->get();
    $content = view('ac', ['topUniversities' => $topUniversities])->render();

    return response()->json(['content' => $content]);
});

Route::get('/filials', function () {
    return response()->json([
        'content' => view('showFilial')->render(),
    ]);
})->middleware(['auth', 'verified'])->name('filial');

Route::get('/scdetails', function () {
    return response()->json([
        'content' => view('schoolDetails')->render(),
    ]);
})->middleware(['auth', 'verified'])->name('school.detail');

Route::get('/forms/{id}', [UniversityController::class, 'showModif'])->middleware(['auth', 'verified'])->name('form');

Route::get('/univ/{id}', [UniversityController::class, 'show'])->middleware(['auth', 'verified'])->name('dd');
Route::get('/classement', [UniversityController::class, 'inde'])->middleware(['auth', 'verified'])->name('classement');



Route::resource('/users', UserController::class);

Route::resource('/roles',RoleController::class);

Route::resource('/permissions', PermissionController::class);

Route::resource('/commentmoderators', CommentModeratorController::class);

Route::resource('/universities', UniversityController::class);

Route::resource('/criteres', CritereController::class);

Route::get('/fils/{id} ', [FilialsController::class,'ind']);
Route::get('/avi/{id} ', [UniversityController::class,'sh']);

Route::get('/universities/top-rated', [UniversityController::class,'topRatedUniversities']);
Route::get('/del/{id}', [\App\Http\Controllers\ProgramController::class,'destroy']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
    //return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

});

require __DIR__.'/auth.php';
