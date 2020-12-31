<?php
//namespace App\Http\Controllers;
use App\Http\Controllers\PatientController; 
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\TwittesController; 
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Patient;
use App\Models\Twitte;

//use Auth;

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
   return view('landing');
})->name('landing');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $id = auth()->id();
    $patients = Patient::latest()->where('user_id',$id)->paginate(7);
    //dd($patients);
    return Inertia::render('Dashboard',['patients' => $patients]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/statistics', function () {
    $id = auth()->id();
    $twittes = Twitte::latest()->where('user_id',$id)->paginate(5);
    //dd($twittes);
    return Inertia::render('Statistics',['twittes' => $twittes]);

})->name('statistics');

Route::middleware(['auth:sanctum', 'verified'])->get('/addpatient',[PatientController::class, 'create'])->name('newpatient');

Route::middleware(['auth:sanctum', 'verified'])->post('/addpatient',[PatientController::class, 'store'])->name('create');

Route::middleware(['auth:sanctum', 'verified'])->post('/create-twitte',[TwittesController::class, 'create'])->name('create-twitte');

Route::middleware(['auth:sanctum', 'verified'])->post('/patients',[ConsultationController::class, 'store'])->name('create.consultation');

Route::middleware(['auth:sanctum', 'verified'])->get('/patients/{patient:id}',[PatientController::class,'show'])->name('patient');

Route::middleware(['auth:sanctum', 'verified'])->get('/patients',[ConsultationController::class,'show'])->name('show.consultation');

Route::middleware(['auth:sanctum', 'verified'])->get('/consultations/{consultation:id}',[PatientController::class, 'prescription'])->name('prescription');

Route::middleware(['auth:sanctum', 'verified'])->get('/patients',[TwitteController::class,'show'])->name('twittes');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



