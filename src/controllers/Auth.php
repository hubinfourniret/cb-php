<?php

namespace App\controllers;

use App\Models\Utilisateur;
use Pecee\http\Request;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\SimpleRouter\SimpleRouter;

class Auth implements Middleware{
    const USER_KEY = 'activeUser';
    public function handle(Request $resquest):void
    {
        $user=$_SESSION[self::USER_KEY]??null;
        if($user===null){
            SimpleRouter::response()->redirect('/login');
        }
    }

    public function getActiveUser():?Utilisateur{
        return $_SESSION[self::USER_KEY]??null;
    }

    public function disconnect(){
        $_SESSION[self::USER_KEY]=null;
        unset($_SESSION[self::USER_KEY]);
        session_destroy();
    }

    public function connect(Utilisateur $user){
        $_SESSION[self::USER_KEY]=$user;
    }

}