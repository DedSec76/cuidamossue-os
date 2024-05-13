<?php

namespace Controllers;
use MVC\Router;
use Model\Articulo;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class ArticuloController {
    public static function index(Router $router) {
        $articulos = Articulo::all();

        $vendedores = Vendedor::all();
        
        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('articulos/admin', [
            'articulos' => $articulos,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router) {

        $articulo = new Articulo;
        $vendedores = Vendedor::all();

        // Arreglo con mensajes de errores
        $errores = Articulo::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Crea una nueva instancia
            $articulo = new Articulo($_POST['articulo']);


            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['articulo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['articulo']['tmp_name']['imagen'])->fit(800,600);
                $articulo->setImagen($nombreImagen);
            }

            // Validar
            $errores = $articulo->validar();

            if (empty($errores)) {
        
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $articulo->guardar();
            }
    
        }
        $router->render('articulos/crear', [
            'articulo' => $articulo,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        
        $id = validarORedireccionar('/admin');
        $articulo = Articulo::find($id);

        $vendedores = Vendedor::all();

        $errores = Articulo::getErrores();

        // Metodo POST para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Asignar los atributos
        $args = $_POST['articulo'];

        $articulo->sincronizar($args);
        //debuguear($articulo);
        // Validacion
        $errores = $articulo->validar();

        // Subida de archivos
        // Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        if($_FILES['articulo']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['articulo']['tmp_name']['imagen'])->fit(800,600);
            $articulo->setImagen($nombreImagen);
        }
        if (empty($errores)) {
            if($_FILES['articulo']['tmp_name']['imagen']) {
                // Almacenar la imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
        
            $articulo->guardar();
        }
    }

        $router->render('/articulos/actualizar', [
            'articulo' => $articulo,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Validar id
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
        
                if($id) {
        
                    $tipo = $_POST['tipo'];
                    if(validarTipoContenido($tipo)) {
                        $articulo = Articulo::find($id);
                        $articulo->eliminar();
                    }  
                }
            }
        }
    }