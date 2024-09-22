<?php

namespace app\controllers;

use rutex\BaseController;

class AdminController extends BaseController
{

    function login($data) {
        if (isset($_SESSION["admin"])) {
            $data["user"] = $_SESSION["admin"];
            return $this->view("admin/home", $data);
        }
        else {
            return $this->view("admin/formlogin", $data); 
        }
    }

    function ValidarIngreso($data) {

        //cuando no esta logueado

        if ($_POST["pass"]=="secreto" && $_POST["name"]=="martin") {
            //mostrar pagina de dos opciones

            //Guardo en la sesion el nombre del usuario logueado
            $_SESSION["admin"] = $_POST["name"];

            //Parametros de la pagina
            $data["user"] = $_POST["name"];

            return $this->view("admin/home", $data);
        }

        else 
           return $this->view(htmlError("403", "Acceso denegado", ""));

        }

    function productos($data) {
        return $this->view("admin/productos", $data);}

        
    function reservas($data) {
        return $this->view("admin/reservas", $data);}

}
