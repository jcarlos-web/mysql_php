<?php
/*
* Autor <jCarlos:Mendoza/>
* Código: UsuarioController.php
* Fecha: 20/04/2017
*/

require_once '../models/conexion.php';
require_once '../models/usuario_model.php';

// Mostramos todos los enlaces en la vista
if(!empty(Usuario::readUsuario('')))
{
    $enlaces = Usuario::readUsuario('');
}

// Buscamos enlaces y mostramos en la vista
if(isset($_POST['search']) && !empty($_POST['search']))
{
    $search  = $_POST['search'];
    $enlaces = Usuario::readUsuario($search);
}

// Busqueda por elemento
if(isset($_GET['query']) && !empty($_GET['query']))
{
    $id     = $_GET['query'];
    $enlace = Usuario::getUsuarioById($id);
}


// Obtenemos los datos de la vista para Update o Create
if(isset($_POST['action']) && !empty($_POST['action']))
{
  // Recuperar valores de formulario
  $nombre   = $_POST['nombre'];
  $ap_pat   = $_POST['ap_pat'];
  $ap_mat   = $_POST['ap_mat'];
  $usu      = $_POST['usu'];
  $pw       = $_POST['pw'];

        // Ejecutando el método Update
        if(isset($_POST['id']) && !empty($_POST['id']))
        {
          // Recuperar clave
          $id       = $_POST['id'];
          // Instanciar usuario
          $usuario  = new Usuario($id, $nombre, $ap_pat, $ap_mat, $usu, $pw);
          // Utilizar método update
          $result   = $usuario->updateUsuario();
          // Mensaje para vista
          if($result)
                    $message = "Usuario editado correctamente.";
          else
                    $message = "Usuario no editado.";
        }
        // Ejecutando el método Create
        else
        {
          // Instanciar usuario
          $usuario  = new Usuario('', $nombre, $ap_pat, $ap_mat, $usu, $pw);
          // Utilizar método create
          $result   = $usuario->createUsuario();
          // Mensjae para vista
          if($result)
                    $message = "Usuario creado correctamente.";
          else
                    $message = "Usuario no creado.";
        }

        // Refrescar enlaces
        if(!empty(Usuario::readUsuario('')))
        {
            $enlaces = Usuario::readUsuario('');
        }
}

// Eliminamos usuario
if(isset($_GET['_query']) && !empty($_GET['_query']))
{
  // Recupera el Identificador de usuario
    $id     = $_GET['_query'];
    // Instancia modelo usuario y ejecuta método deleteUsuario
    $result = Usuario::deleteUsuario($id);
    // Envia mensaje a vista
    if($result)
            $message = "Usuario eliminado correctamente.";
    else
            $message = "Usuario no eliminado.";

    // Refrescar enlaces
            if(!empty(Usuario::readUsuario('')))
            {
                $enlaces = Usuario::readUsuario('');
            }
}



?>
