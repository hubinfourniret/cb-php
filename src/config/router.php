<?php
use Pecee\SimpleRouter\SimpleRouter;
use App\oldModels\CompteBancaire;

SimpleRouter::group(['namespace'=> 'App\controllers'], function (){
    SimpleRouter::get('/','CBController@index');
    SimpleRouter::get('/newUser','CBController@newUserForm');
    SimpleRouter::post('/newUser','CBController@newUser');
    SimpleRouter::get('/fermer','CBController@fermer');
    SimpleRouter::get('/depot','CBController@depotForm');
    SimpleRouter::post('/depot','CBController@depot');
    SimpleRouter::get('/retrait','CBController@retraitForm');
    SimpleRouter::post('/retrait','CBController@retrait');
    SimpleRouter::get('/operations','CBController@operations');
    SimpleRouter::get('/users','CBController@users');
    SimpleRouter::get('/admin','AdminController@index');
    SimpleRouter::get('/admin/add','AdminController@addForm');
    SimpleRouter::post('/admin/add','AdminController@add');
    SimpleRouter::get('/admin/delete/{id}','AdminController@delete');
});

SimpleRouter::group(['namespace'=> 'App\controllers'],function (){
    SimpleRouter::get('/login','IndexControllers@login');
});
