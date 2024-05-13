<?php

namespace Model;

class Articulo extends ActiveRecord {

    protected static $tabla = 'articulos';
    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function validar() {

        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
    
        if (!$this->precio) {
            self::$errores[] = "El precio es Obligatorio";
        }
    
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es Obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this->vendedores_id ) {
            self::$errores[] = "Elige un vendedor";
        }
    
        if(!$this->imagen ) {
            self::$errores[] = "La imagen es Obligatoria";
        }

        return self::$errores;
    }

}