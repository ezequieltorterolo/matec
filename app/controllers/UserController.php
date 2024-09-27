<?php

namespace app\controllers;

use rutex\BaseController;
use app\models\Producto;
use app\models\Usuario;
use PharData;

class UserController extends BaseController
{

function login($data)
    {
        $data["title"]  = "Login";
        $data["mode"]   = "login";
        $data["action"] = "/login";
        $data["method"] = "POST";
        return $this->view("formulario",$data);
    }

    function validaringreso($data)
    {
    
        $data["email"] = $_POST["email"];

        if (empty($_POST["email"])) {
            $data["msg"] = "Debe ingresar un email de usuario";
            return $this->login($data);
        }

        if (empty($_POST["contraseña"])) {
            $data["msg"] = "Debe ingresar la contraseña";
            return $this->login($data);
        }


        $usuario = new Usuario;
        $datosusuario = $usuario->where("email", "=", $_POST["email"])
                                ->select()
                                ->getFirst();
        
        if ($usuario->affected_rows()==0)
        {
            $data["msg"] = "Usuario no registrado. Ingrese sus datos";
            return $this->registro($data);
        } 
        else if ($_POST["contraseña"] == $datosusuario["contraseña"]) 
        {
            $_SESSION["usuario"] = $usuario->usuarioLoggeado();

            $this->redirect("/");
        }
        else 
        {
            $data["msg"] = "Contraseña incorrecta";
            return $this->login($data);
        }

    }
    function registro($data){
        $data["title"]  = "Nuevo Usuario";
        $data["mode"]   = "registro";
        $data["action"] = "/validarregistro";
        $data["method"] = "POST";
        return $this->view("formulario", $data);
    }
    
    function validarregistro($data){
        $usuario = new Usuario;
        $data["nombre"] = $_POST["nombre"];
        $data["email"] = $_POST["email"];


        if ($_POST["contraseña"] !== $_POST["repass"]) {
            $data["msg"] = "Contraseñas no coinciden";
            return $this->registro($data);
        }
        $email = $usuario->where("email","=",$_POST["email"])->select()->getAll();
        if($_POST["email"] == $email){
            $data["msg"] = "ya hay una cuenta con ese email";
            return $this->registro($data);
        }

        $usuario->insert($_POST);

        if ($usuario->success()) {
            $this->login($data);
        }
        else {
            return $this->registro($data);
        }
    }
}