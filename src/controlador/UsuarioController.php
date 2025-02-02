<?php

namespace Adrix\Proyecto\controlador;

use Adrix\Proyecto\Utils\Utils;
use Adrix\Proyecto\Model\Usuario;
use Adrix\Proyecto\Model\PlanetaModel;
use Adrix\Proyecto\controlador\PlanetaController;

/**
 * @class UsuarioController 
 * 
 * Esta clase contiene las funciones que permiten redirigir al usuario a las demas vistas, 
 * asi como de manejar el inicio de sesion y registro
 */

class UsuarioController
{

    //Utils::redirect --> Redirecciona a la ruta /redirect 
    //Utils::render --> Carga la vista ademas con los datos que queramos

    // FUNCIONES LOGIN

    //Redirige nada mas cargar la web

    public function redireccionar()
    {
        //Primero redirige a login
        Utils::redirect("login");
    }
    //Carga la vista (Podemos usar esto en el GET de las webs)
    public function login()
    {
        //Al obtener la vista, se renderiza la web login
        Utils::render("login");
    }

    public function Verificarlogin()
    {

        $modelo = new Usuario(Utils::getConnection());

        $resultado = $modelo->DatosLogin(htmlspecialchars($_POST["emailUsuario"], ENT_QUOTES, 'UTF-8'));

        if ($resultado && password_verify(trim($_POST["passwordUsuario"]), $resultado)) {
            Utils::redirect("inicio");
        } else {
            //redirigimos al login de nuevo
            Utils::redirect("login");
        }
    }



    //FUNCIONES REGISTRO

    public function RegistroUsuario()
    {
        Utils::render("registro");
    }

    public function RegistrarUsuario()
    {


        if (isset($_POST["emailRegistro"]) && isset($_POST["contraseñaRegistro"])) {
            $modelo = new Usuario(Utils::getConnection());

            if (!$modelo->comprobarEmailExistente(trim($_POST["emailRegistro"]))) {
                $email = htmlspecialchars($_POST["emailRegistro"], ENT_QUOTES, 'UTF-8');
                $passwordHash = password_hash(trim($_POST["contraseñaRegistro"]), PASSWORD_DEFAULT);


                $datos = ["email" => $email, "password" => $passwordHash];

                $modelo->Registrarse($datos);

                Utils::redirect("login");
            }
            else Utils::redirect("registro");
        }
    }



    //FUNCIONES INICIO

    //Al entrar en inicio se carga
    public function CargarInicio()
    {
        Utils::render("inicio");
    }

    //Cuando se elige uno de los menus al que acceder, se carga la vista de este, y en el get de la web ya se 
    //Llama a la funcion correspondiente
    public function CargarWeb()
    {
        if (isset($_POST["vista"])) {
            //Segun sea la vista, se redigira a esa web
            $vista = $_POST["vista"];
            Utils::redirect($vista);
        }
    }
}
