<?php

namespace Controllers;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Blog;

class BlogController {
    public static function index(Router $router) {
        $blogs = Blog::all();
        
        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('blogs/index', [
            'blogs' => $blogs,
            'resultado' => $resultado,
        ]);
    }

    public static function crear(Router $router) {
        $blog = new Blog;

        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crea una nueva instancia
            $blog = new Blog($_POST['blog']);

            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
                $blog->setImagen($nombreImagen);
            }

            // Validamos si hay campos vacios
            $errores = $blog->validar();

            // Si errores esta vacio
            if (empty($errores)) {
        
                // Creamos la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guardamos la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guardamos en la base de datos
                $blog->guardar();
            }
        }

        $router->render('/blogs/crear', [
            'blog' => $blog,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/index');
        $blog = Blog::find($id);

        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        }

        $router->render('/blogs/actualizar', [
            'blog' => $blog,
            'errores' => $errores
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
                        $blog = Blog::find($id);
                        $blog->eliminar();
                    }  
                }
            
        }
    }
}
