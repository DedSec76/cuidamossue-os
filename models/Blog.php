<?php

namespace Model;

class Blog extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'blog';
    protected static $columnasDB = ['id', 'titulo', 'descripcion', 'fecha', 'escritor','imagen'];

    public $id;
    public $titulo;
    public $descripcion;
    public $fecha;
    public $escritor;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->escritor = $args['escritor'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar() {

        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
    
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es Obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this->escritor ) {
            self::$errores[] = "Es necesario el nombre del escritor";
        }
    
        if(!$this->imagen ) {
            self::$errores[] = "La imagen es Obligatoria";
        }

        return self::$errores;
    }

}