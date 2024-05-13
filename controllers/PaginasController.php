<?php 

namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\Blog;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index( Router $router ){
        
        $articulos = Articulo::get(3);
        $blogs = Blog::get(1);
        
        $inicio = true;

        $router->render('paginas/index', [
            'articulos' => $articulos,
            'inicio' => $inicio,
            'blogs' => $blogs
        ]);
    }
    public static function nosotros( Router $router ){

        $router->render('paginas/nosotros');
    }
    public static function articulos( Router $router ){

        $articulos = Articulo::all();

        $router->render('paginas/articulos', [
            'articulos' => $articulos
        ]);
    }
    public static function articulo( Router $router ){

        $id = validarORedireccionar('/articulos');

        // buscar la propiedad por su id
        $articulo = Articulo::find($id);

        $router->render('paginas/articulo', [
            'articulo' => $articulo
        ]);
    }
    public static function blogs( Router $router ){

        $blogs = Blog::all();

        $router->render('paginas/blogs', [
            'blogs' => $blogs
        ]);
    }
    public static function blog( Router $router ){

        $id = validarORedireccionar('/blogs');

        // buscar la propiedad por su id
        $blog = Blog::find($id);

        $router->render('paginas/blog', [
            'blog' => $blog
        ]);
    }
    
    public static function contacto( Router $router ){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $respuestas = $_POST['contacto'];


            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $_ENV['EMAIL_PORT'];

            // Configurar el contenido del mail
            $mail->setFrom('serviciocliente@zerkashop.com');
            $mail->addAddress('admin@zerkashop.com', 'zerkashop.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>'; 
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre']. '</p>';
            

            // Enviar de forma condicional algunos campos de email o telefono
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por Teléfono:</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono']. '</p>';
                $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha']. '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora']. '</p>';
            } else {
                // Es email, entonces agregamos el campo de email
                $contenido .= '<p>Eligió ser contactado por email:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email']. '</p>';
            }

            
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje']. '</p>';
           // $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto']. '</p>';
            $contenido .= '</html>';


            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if($mail->send()) {
                $mensaje = "Mensaje enviado Correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar...";
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}