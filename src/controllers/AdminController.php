<?php
namespace App\controllers;
use App\Models\Utilisateur;
use Pecee\SimpleRouter\SimpleRouter;

class AdminController extends BaseController
{
    function getMenu() {
        return [['caption' => 'Admin', 'route' => '/admin'],
            ['caption' => 'Ajouter', 'route' => '/admin/add']];
    }
    public function render(string $view, array $params = []){
        $params['menu']=$this->getMenu();
        return parent::render($view, $params);
    }
    public function index(){
        $users=Utilisateur::all();
        return $this->render('admin/admin.html.twig',['users'=>$users,'id'=>$id]);
    }

    public function addUserForm(){
        $u=new Utilisateur();
        return $this->render('admin/add.html.twig',['user'=>$u]);
    }
    public function addForm(){
        return $this->render('admin/add.html.twig');
    }

    public function add(){
        $user = new Utilisateur();
        $user->login = $_POST['titulaire'];
        $user->password = $_POST['password'];
        if ($user->save()) {
            return $this->index();
        }
    }

    public function delete($id){
        $id->softDeletes();
    }
}