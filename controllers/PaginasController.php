<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index( Router $router ){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }


    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
                $router->render('paginas/propiedades', [
                    'propiedades' => $propiedades
                ]);
    }
    public static function propiedad(Router $router){

        $id = validarORedireccionar('/propiedades');

        //busca por su id
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){

            $mensaje = "";

            $respuestas = $_POST['contacto'];

            //CREA UNA INSTANCIA EN PHPMAILER
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail-> SMTPAuth =true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls'; //forma segura de transportar datos y ssl para certificados
            $mail->Port = $_ENV['EMAIL_PORT'];

            //configurar el contenido del email
            $mail ->setFrom('admin@bienesraices.com');
            $mail ->addAddress('admin@bienesraices.com', 'BienesRaices.com') ;
            $mail -> Subject= 'Tienes un nuevo mensaje';

            //habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje<p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p>';


            //enviar de forma condicional el telefono o email
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligió ser contactado por Teléfono: </p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= '<p>Fecha contacto: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= '<p>Hora contacto: ' . $respuestas['hora'] . ' </p>';
            } else{
                //Es email, entonces agregamos email
                $contenido .= '<p>Eligió ser contactado por Email: </p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . ' </p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . ' </p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . ' </p>';
            $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] . ' </p>';
            $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . ' </p>';

            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTMML';

            //Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado Correctamente";
            } else {
                $mensaje = "El mensaje no se ha podido enviar";               
            }

        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}


?>