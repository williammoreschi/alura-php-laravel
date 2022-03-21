<?php

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

use App\Mail\NovaSerie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Route::get('/series', 'SeriesController@index')->name('listar_serie');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie')->middleware('autenticador');
Route::post('/series/criar', 'SeriesController@store')->middleware('autenticador');
Route::delete('/series/{id}','SeriesController@destroy')->middleware('autenticador');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')->middleware('autenticador');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistidos', 'EpisodiosController@assistidos')->middleware('autenticador');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'EntrarController@index');
Route::post('/', 'EntrarController@entrar');
Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});

Route::get('/visualizar-email',function (){
    return new NovaSerie('Arrow',1,3);
});

Route::get('/enviado-email',function (){
    $user = (object)[
        'name' => 'Fulano da Silva',
        'email' => 'teste@teste.com',
    ];

    $email = new NovaSerie('Arrow',1,3);
    $email->subject = "Nova Série Adicionada";

    Mail::to($user)->send($email);

    return 'E-mail enviado';
});