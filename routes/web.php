	<?php

	use App\Http\Controllers\ChangePasswordController;
	use App\Http\Controllers\DiskController;
	use App\Http\Controllers\EventoController;
use App\Http\Controllers\FotografiaController;
use App\Http\Controllers\HomeController;
	use App\Http\Controllers\InfoUserController;
	use App\Http\Controllers\PortafolioController;
	use App\Http\Controllers\RegisterController;
	use App\Http\Controllers\ResetController;
	use App\Http\Controllers\SessionsController;
	use App\Http\Controllers\TarjetaController;
	use App\Http\Controllers\UserController;
	use App\Http\Controllers\UserEventoController;
	use App\Http\Controllers\WelcomeController;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Password;
	use Illuminate\Support\Facades\Route;

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


	Route::group(['middleware' => 'auth'], function () {

		Route::get('/', [HomeController::class, 'home']);

		Route::get('/welcome', [WelcomeController::class, 'welcome'])->name('welcome');

		Route::get('dashboard', function () {
			return view('dashboard');
		})->name('dashboard');

		Route::get('billing', function () {
			return view('billing');
		})->name('billing');

		Route::get('profile', function () {
			return view('profile');
		})->name('profile');

		Route::get('rtl', function () {
			return view('rtl');
		})->name('rtl');

		// EVENTO
		Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
		Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
		Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
		/* 	Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show'); */
		Route::get('/eventos/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');

		Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
		Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');

		

		// USUARIOS
		Route::get('/users', [UserController::class, 'index'])->name('users.index');
		Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
		Route::post('/users', [UserController::class, 'store'])->name('users.store');
		Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
		Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
		Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
		Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

		// TARJETAS
		Route::get('/tarjetas', [TarjetaController::class, 'index'])->name('tarjetas.index');
		Route::get('/tarjetas/recibo', [TarjetaController::class, 'recibo'])->name('tarjetas.recibo');
		Route::get('/tarjetas/create', [TarjetaController::class, 'create'])->name('tarjetas.create');
		Route::post('/tarjetas', [TarjetaController::class, 'store'])->name('tarjetas.store');
		Route::get('/tarjetas/{id}', [TarjetaController::class, 'show'])->name('tarjetas.show');
		Route::get('/tarjetas/{id}/edit', [TarjetaController::class, 'edit'])->name('tarjetas.edit');
		Route::put('/tarjetas/{id}', [TarjetaController::class, 'update'])->name('tarjetas.update');
		Route::delete('/tarjetas/{id}', [TarjetaController::class, 'destroy'])->name('tarjetas.destroy');

		// PORTAFOLIOS
		Route::post('/portafolios', [PortafolioController::class, 'store'])->name('portafolios.store');

		// USER_EVENTO
		Route::get('/user_evento', [UserEventoController::class, 'index'])->name('user_evento.index');
		Route::get('/user_evento/{evento_id}/create/', [UserEventoController::class, 'create'])->name('user_evento.create');
		Route::post('/user_evento', [UserEventoController::class, 'store'])->name('user_evento.store');
		Route::post('/user_evento/estado', [UserEventoController::class, 'estado'])->name('user_evento.estado');
		Route::get('/user_evento/ver', [UserEventoController::class, 'show_user'])->name('user_evento.show_user');

		// FOTOGRAFIAS
		Route::get('/fotografias/{evento_id}/create/', [FotografiaController::class, 'create'])->name('fotografias.create');
		Route::get('/fotografias/{foto_id}/buy/', [FotografiaController::class, 'buy'])->name('fotografias.buy');
		Route::post('/fotografias/{evento_id}', [FotografiaController::class, 'store'])->name('fotografias.store');
		Route::post('/fotografias/{id}/buyed', [FotografiaController::class, 'buyed'])->name('fotografias.buyed');

		//RECIBO
		

		/* Route::get('user-management', function () {
			return view('laravel-examples/user-management');
		})->name('user-management');
 */
		Route::get('tables', function () {
			return view('tables');
		})->name('tables');

		Route::get('virtual-reality', function () {
			return view('virtual-reality');
		})->name('virtual-reality');



		Route::get('static-sign-in', function () {
			return view('static-sign-in');
		})->name('sign-in');

		Route::get('static-sign-up', function () {
			return view('static-sign-up');
		})->name('sign-up');

		Route::get('/logout', [SessionsController::class, 'destroy']);
		Route::get('/user-profile', [InfoUserController::class, 'create']);
		Route::post('/user-profile', [InfoUserController::class, 'store']);

		Route::get('/login', function () {
			return view('dashboard');
		})->name('sign-up');
	});



	Route::group(['middleware' => 'guest'], function () {
		Route::get('/welcome', [WelcomeController::class, 'welcome'])->name('welcome');
		Route::get('/register', [RegisterController::class, 'create']);
		Route::post('/register', [RegisterController::class, 'store']);
		Route::get('/login', [SessionsController::class, 'create']);
		Route::post('/session', [SessionsController::class, 'store']);
		Route::get('/login/forgot-password', [ResetController::class, 'create']);
		Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
		Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
		Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
	});

	Route::get('/login', function () {
		return view('session/login-session');
	})->name('login');

	Route::get('/disk', [DiskController::class, 'index']);
	Route::get('/register_event/{id}', [EventoController::class, 'registerEvent'])->name('eventos.registerEvent');
	Route::get('/download_qr/{id}', function ($id) {
		$url = url('/register_event/' . $id); // Genera la URL completa
		$image_data = file_get_contents("https://qrickit.com/api/qr.php?d={$url}&qrsize=350&t=p&e=m");
	
		return response($image_data)
			->header('Content-Type', 'image/png')
			->header('Content-Disposition', "attachment; filename=qr_code_{$id}.png");
	});
	Route::post('/register_evento/{id}', [EventoController::class, 'registerEvento'])->name('eventos.registerEvento');