<?php

namespace App\controllers;
use Pecee\SimpleRouter\SimpleRouter;
use App\models\CompteBancaire;

class CBController extends BaseController
{
    function getMenu() {
        if(isset($_SESSION['cb'])){
            return [
                ['caption'=>'Dépôt','route'=>'/depot'],
                ['caption'=>'Retrait','route'=>'/retrait'],
                ['caption'=>'Toutes les opérations','route'=>'/operations'],
                ['caption'=>'Fermer le compte','route'=>'/fermer']
            ];
        }
        return [['caption' => 'Créer un compte', 'route' => '/newCompte']];
    }
    public function index(){
        $cb=$_SESSION['cb']??null;
        return $this->render('cbView.html.twig',['cb'=>$cb, 'menu'=>$this->getMenu()]);
    }

    public function newCompte(){
        $titulaire=$_POST['titulaire'];
        $cb=new CompteBancaire($titulaire);
        $_SESSION['cb']=$cb;
        return $this->render('cbView.html.twig',['cb'=>$cb]);
    }

    public function newCompteForm(){
        return $this->render('newCompte.html.twig');
    }

    public function fermer(){
        $_SESSION['cb']=null;
        unset($_SESSION['cb']);
        session_destroy();
        return simpleRouter::response()->redirect('/');
    }

    public function render(string $view, array $params = []){
        $params['menu']=$this->getMenu();
        return parent::render($view, $params);
    }

    public function depotForm(){
        return $this->render('depot.html.twig');
    }

    public function depot(){
        $montant=$_POST['montant'];
        $cb=$_SESSION['cb']??null;
        $cb->deposer('deposer',$montant);
        return $this->render('cbView.html.twig',['cb'=>$cb]);
    }

    public function retraitForm(){
        return $this->render('retrait.html.twig');
    }

    public function retrait(){
        $montant=$_POST['montant'];
        $cb=$_SESSION['cb']??null;
        $cb->retirer('retrait',$montant);
        return $this->render('cbView.html.twig',['cb'=>$cb]);
    }

    public function operations(){
        $cb=$_SESSION['cb']??null;
        return $this->render('operations.html.twig',['cb'=>$cb]);
    }
}