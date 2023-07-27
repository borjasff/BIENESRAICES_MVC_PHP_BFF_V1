<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController {
    public static function crear(Router $router){

        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //INSTANCIAR NUEVO VENDEDOR
            $vendedor = new Vendedor($_POST['vendedor']);
    
            //validar
            $errores=$vendedor->validar();
    
            //no hay errores
            if(empty($errores)){
                $vendedor->guardar();
            }
        }
    

        $router->render('vendedores/crear',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    public static function actualizar(Router $router){

        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        //obtener datos del vendedor
        $vendedor = Vendedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //asignar los valores
            $args = $_POST['vendedor'];
        
            //sincronizar objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
        
            //validación
            $vendedor->validar();
        
            if(empty($errores)){
                $vendedor->guardar();
            }
        
        }

        $router->render('vendedores/actualizar',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    public static function eliminar(){
            //borrar propiedades
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //validamos los datos
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
            //validar el tipo eliminar
            $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                $vendedor = Vendedor::find($id);
                $resultado = $vendedor->eliminar();

                if($resultado) {
                    header('location: /propiedades');
                }
                }
            }
        } 
    }
}