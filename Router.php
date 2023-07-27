<?php 

namespace MVC;

use GuzzleHttp\Psr7\Header;

class Router {

        public $rutasGET = [];
        public $rutasPOST = [];

        public function get($url, $fn){
            $this->rutasGET[$url] = $fn;
        }

        public function post($url, $fn){
            $this->rutasPOST[$url] = $fn;
        }

        public function comprobarRutas(){

            session_start();

            $auth = $_SESSION['login'] ?? null;
            

            //arreglo de rutas protegidas
            $rutas_protegidas = ['/admin', 'propiedades/crear', 'propiedades/actualizar', 'propiedades/eliminar', 'vendedores/crear', 'vendedores/actualizar', 'vendedores/eliminar'];

            //Detecta con strtok lo que no es esencial de la url como un token y lo elimina
            $urlActual = strtok($_SERVER['PATH_INFO'], '?') ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if($metodo === 'GET'){
                $fn = $this->rutasGET[$urlActual] ?? null;
            } else {
                $fn = $this->rutasPOST[$urlActual] ?? null;
            }

            //proteger ruta
            if(in_array($urlActual, $rutas_protegidas) && !$auth){
                header('Location: /');
            }

            if($fn){
                //la url existe y tiene una funcioón asociada
                call_user_func($fn, $this);
            } else{
                echo "Pagina no encontrada";
            }
        }

        //muestra una vista que le pasamos
        public function render($view, $datos = [] ){
            
            foreach($datos as $key => $value){
                $$key = $value;
            }

            ob_start();//alamacenamiento en memoria temporal

            include __DIR__ . "/views/$view.php";
            $contenido = ob_get_clean(); //limpia el buffer
            include __DIR__ . "/views/layout.php";
        }
}