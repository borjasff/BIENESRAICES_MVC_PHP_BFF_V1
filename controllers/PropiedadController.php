<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index (Router $router) {

        $propiedades = Propiedad::all();//guarda la informacion
        $vendedores = Vendedor::all();
        //muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router-> render('propiedades/admin', [
            'propiedades' => $propiedades,// se la pasa a la vista
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function crear (Router $router) {

        $propiedad = NEW Propiedad;
        $vendedores = Vendedor::all();

        //arreglo de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                //crea una nueva instancia
                $propiedad = new Propiedad($_POST['propiedad']);
        
                /**Subida de archivos */
        
                //generar nombre único
                $nombreImagen = md5( uniqid(rand(), true)) . ".jpg" ;
                
                //setear la imagen
                 //realiza un resize a la imagen con intervation
                if($_FILES['propiedad']['tmp_name']['imagen']){
                 $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                }
        
                //validar
                $errores = $propiedad->validar();
        
        
                if(empty($errores)){
                    
        
                    //Crear la carpeta para subir imagenes
                    if(!is_dir(CARPETA_IMAGENES)){
                        mkdir(CARPETA_IMAGENES);
                    }
                    //guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
        
                    //guarda en la base de datos
                    $propiedad->guardar();
                }
            }

        

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar (Router $router) {

        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        

            //asignar los atributos
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
            //validacion
            $errores = $propiedad->validar();
    
            //revisar que no exista errores
            if(empty($errores)){
                
                //generar nombre único
                $nombreImagen = md5( uniqid(rand(), true)) . ".jpg" ;
                
                //subida de archivos
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                }
    
    
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    //almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
    }
        $router->render('/propiedades/actualizar', [
        'propiedad' => $propiedad,
        'errores' => $errores,
        'vendedores' => $vendedores
    ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

                //borrar propiedades
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //validamos los datos
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){
        $tipo = $_POST['tipo'];

        if(validarTipoContenido($tipo)){
            $propiedad = Propiedad::find($id);
            $propiedad->eliminar();
            }
        }

    }
    }
    }
}