<?php 

namespace MVC;

use GuzzleHttp\Psr7\Header;

class Router {

        public array $rutasGET = [];
        public array $rutasPOST = [];

        public function get($url, $fn){
            $this->rutasGET[$url] = $fn;
        }

        public function post($url, $fn){
            $this->rutasPOST[$url] = $fn;
        }

        public function comprobarRutas(){

            //Detecta con strtok lo que no es esencial de la url como un token y lo elimina
            $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if($metodo === 'GET'){
                $fn = $this->rutasGET[$urlActual] ?? null;
            } else {
                $fn = $this->rutasPOST[$urlActual] ?? null;
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

            include_once __DIR__ . "/views/$view.php";
            $contenido = ob_get_clean(); //limpia el buffer
            include_once __DIR__ . "/views/layout.php";
        }
}