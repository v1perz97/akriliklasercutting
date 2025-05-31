<?php

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailerController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Models\Services;
use App\Models\Portfolio;
use App\Models\Product;

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
Route::get('/', [HomeController::class, 'index']);

Route::get('/services', [HomeController::class, 'services']);

Route::get('/portfolio', [HomeController::class, 'portfolio']);

Route::get('/talk', [HomeController::class, 'talk']);
Route::post('/talk/send-mail/', [MailerController::class, 'sendMail']);
Route::match(['get', 'post'], '/talk/send-mail', [MailerController::class, 'sendMail']);

Route::get('/product', [HomeController::class, 'product']);


// Route::get('/blog', [HomeController::class, 'blog']);
// Route::resource('/blog', BlogController::class);

//route learn more services
Route::get('/services/{slug}', function($slug) {
	return view('services.detail-services', [
      	'title' => 'Layanan',
		'services' => Services::where('slug', $slug)->first(),
        'contact' => Contact::all(),
	]);
});

//route learn more portfolio
Route::get('/portfolio/{slug}', function ($slug) {
    return view('portfolio.detail-portfolio', [
        'title' => 'Hasil Kerja',
        'portfolio' => Portfolio::where('slug', $slug)->first(),
    ]);
});

//route learn more services
Route::get('/products/{slug}', function($slug) {
	return view('products.detail-products', [
      	'title' => 'Product',
		'product' => Product::where('slug', $slug)->first()
	]);
});

Route::get('/product/category/{nama}', [HomeController::class, 'category']);

//Route::get('/detail/{id}', 'ServicesController@detail');


// route untuk about
Route::get('/profile', [HomeController::class, 'profile']);

Route::get('/team', [HomeController::class, 'team']);
Route::resource('team', TeamController::class);

Route::get('/work-phase', [HomeController::class, 'workphase']);

Route::get('/scope-of-work', [HomeController::class, 'sow']);

Route::get('/faq', [HomeController::class, 'faq']);


Route::get('/terms-condition', [HomeController::class, 'termscondition']);
