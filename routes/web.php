<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth','verified')->name('dashboard');
*/


Route::middleware(['auth'])
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {

    // Index: /proveedores  (búsqueda con ?search=)
    Route::get('/proveedores', [ProveedorController::class, 'index'])
        ->name('proveedores.index');

    // Resource completo (usa create, store, show, edit, update, destroy)
    Route::resource('proveedores', ProveedorController::class)
        ->parameters(['proveedores' => 'idproveedor'])
        ->whereNumber('idproveedor')
        ->except(['index']); // ya definimos el index arriba
    
    Route::get('/proveedores/new', [ProveedorController::class, 'create'])
        ->name('proveedores.new');    
    Route::resource('proveedores', ProveedorController::class)
        ->parameters(['proveedores' => 'idproveedor'])
        ->whereNumber('idproveedor');
    
});


Route::middleware(['auth'])->group(function () {

    // Index: /marcas  (búsqueda con ?search=)
    Route::get('/marcas', [MarcaController::class, 'index'])
        ->name('marcas.index');

    // Ruta corta para "nuevo" con nombre específico
    Route::get('/marcas/new', [MarcaController::class, 'create'])
        ->name('marcas.new');

    // Resource completo (create, store, show, edit, update, destroy) SIN index
    Route::resource('marcas', MarcaController::class)
        ->parameters(['marcas' => 'idmarca'])
        ->whereNumber('idmarca')
        ->except(['index']);
});

Route::middleware(['auth'])->group(function () {

    // Index: /categorias  (búsqueda con ?search=)
    Route::get('/categorias', [CategoriaController::class, 'index'])
        ->name('categorias.index');

    // Ruta corta para "nuevo" con nombre específico
    Route::get('/categorias/new', [CategoriaController::class, 'create'])
        ->name('categorias.new');

    // Resource completo (create, store, show, edit, update, destroy) SIN index
    Route::resource('categorias', CategoriaController::class)
        ->parameters(['categorias' => 'idcategoria'])
        ->whereNumber('idcategoria')
        ->except(['index']);
});

Route::middleware(['auth'])->group(function () {

    // Index: /clientes  (búsqueda con ?search=)
    Route::get('/clientes', [ClienteController::class, 'index'])
        ->name('clientes.index');

    // Ruta corta para "nuevo" con nombre específico
    Route::get('/clientes/new', [ClienteController::class, 'create'])
        ->name('clientes.new');

    // Resource completo (create, store, show, edit, update, destroy) SIN index
    Route::resource('clientes', ClienteController::class)
        ->parameters(['clientes' => 'idcliente'])
        ->whereNumber('idcliente')
        ->except(['index']);
});



require __DIR__.'/auth.php';
require __DIR__.'/security.php';