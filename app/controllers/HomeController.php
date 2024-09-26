<?php

namespace app\controllers;

use rutex\BaseController;
use app\models\Producto;
use app\models\Usuario;
use PharData;

class HomeController extends BaseController
{

    function index($data)
    {
        $producto = new Producto;

        $ofertas = $producto->where("oferta", "=", true)
                            ->select()
                            ->getCursor();

        $data["ofertas"] = $ofertas;

        return $this->view("home", $data);
    }

    function producto($data)
    {
        $producto    = new Producto;
        $data["prd"] = $producto->getById($_GET["id"]);

        return $this->view("producto", $data);
    }

    function catalogo($data)
    {

        $producto  = new Producto;

        if (isset($_GET["catego"])) {
            $catego = $this->categorias()[$_GET["catego"]];
            if (!empty($catego)) $producto->where("categoria", "=", $catego);

        } elseif (isset($_GET["nombre"])) {
            $nombre = $_GET["nombre"];
            if (!empty($nombre)) $producto->where("nombre", "like", "%$nombre%");
        };

        $data["data"]   = $producto->getAll();
        $data["totrec"] = $producto->affected_rows();

        return $this->view("catalogo", $data);
    }

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
            $_SESSION["usuario"] = $usuario->usuarioLoggeado();
            $this->redirect("/");
        }
        else {
            return $this->registro($data);
        }
    }


    //SIMULACION DE TABLA CATEGORIAS
    function categorias()
    {
        $categoria[1] = "Alimentos";
        $categoria[2] = "Limpieza";
        $categoria[3] = "Higiene";
        $categoria[4] = "Insumos de cocina";

        return $categoria;
    }

}
