<?php
use Pecee\SimpleRouter\SimpleRouter;
use App\models\CompteBancaire;

SimpleRouter::group(['namespace'=> 'App\controllers'], function (){
    SimpleRouter::get('/','CBController@index');
    SimpleRouter::get('/newCompte','CBController@newCompteForm');
    SimpleRouter::post('/newCompte','CBController@newCompte');
    SimpleRouter::get('/fermer','CBController@fermer');
    SimpleRouter::get('/depot','CBController@depotForm');
    SimpleRouter::post('/depot','CBController@depot');
    SimpleRouter::get('/retrait','CBController@retraitForm');
    SimpleRouter::post('/retrait','CBController@retrait');
    SimpleRouter::get('/operations','CBController@operations');
});
