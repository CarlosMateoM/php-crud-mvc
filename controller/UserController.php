<?php

namespace controller;

require_once '../app/Autoloader.php';

use \model\User;
use \app\Controller;

class UserController extends Controller
{

    public function index($message = ''): void
    {
        $query = isset($_GET['q']) ? $_GET['q'] : '';

        $user = new User();

        $this->view('user/index', ['users' => $user->all($query), 'message' => $message]);
    }

    public function show($matches): void
    {
        $id = $matches['id'];
        
        $user = new User();

        $this->view('user/show', ['user' => $user->find($id)]);
    }

    public function create($data = []): void
    {
        $this->view('user/create', $data);
    }

    public function edit($matches): void
    {
        $id = $matches['id'];

        $user = new User();

        $this->view('user/update', ['user' => $user->find($id)]);
    }

    public function store(): void
    {

        $name = $_POST['name'];

        $user = new User();

        $user->create(['name' => $name]);

        $this->create(['message' => 'usuario creado satisfactoriamente']);
    }

    public function delete($matches): void
    {
        $id = $matches['id'];
        
        $user = new User();
        
        $user->delete($id);
        
        $_SESSION['message'] = "Usuario $id eliminado correctamente";

        header("Location: /users");
    }

    public function update($matches): void
    {
        $id = $matches['id'];

        $user = new User();

        $user->update(['name' => $_POST['name']], $id);

        header("Location: /users/$id");
    }
}
