<?php

interface ObjetosInterface
{
    public function nombre();
    public function peso();
    public function volumen();
}


class Caja implements ObjetosInterface
{
    private $nombre;
    private $peso;
    private $volumen;
    public $contenido = [];
    private $abierta = true;
    private $volumenInicial;

    public function __construct($nombre, $peso, $volumen, $contenido)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
        $this->contenido = $contenido;
        $this->volumenInicial = $volumen;
    }
    public function volumen()
    {
        return $this->volumen;
    }
    public function peso()
    {
        return $this->peso;
    }
    public function nombre()
    {
        return $this->nombre;
    }
    public function mostrar()
    {
        foreach ($this->contenido as $key => $value) {
            
            echo "El objeto es: " . $this->contenido[$key]->nombre() . " " .
                 "El peso es: " . " " .  $this->contenido[$key]->peso() . " " .
                 "El volumen es: " . $this->contenido[$key]->volumen();
        }
    }
    public function guardar(ObjetosInterface $objeto)
    {
        if ($this->abierta) {
            if ($this->volumen > $objeto->volumen()) {
                $this->volumen = $this->volumen - $objeto->volumen();
                $this->contenido[] = $objeto;
            } else {
                echo "No hay suficiente volumen";
            }
        } else {
            echo "la caja esta cerrada";
        }
    }
    public function vaciar()
    {
        foreach ($this->contenido as $key => $value) {
            echo $value->nombre() . "</br>";
            $this->contenido = [];
            return $this->vaciar;
        }
        echo "la caja esta vacia";
    }
    public function sacar(ObjetosInterface $objeto)
    {
        foreach ($this->contenido as $key => $value) {
            if ($objeto === $value) {
                unset($this->contenido[$key]);
            }
        }
        //unset($this->contenido->nombre[$key]);
    }
    public function abierta()
    {
        return $this->abierta;
    }

    public function cerrada()
    {
        return $this->abierta = false;
    }
}



class Bicicleta implements ObjetosInterface
{
    private $nombre;
    private $peso;
    private $volumen;


    public function __construct($nombre,  $peso, $volumen)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
    }

    public function volumen()
    {
        return $this->volumen;
    }

    public function peso()
    {
        return $this->peso;
    }

    public function nombre()
    {
        return $this->nombre;
    }
}




class Taza implements ObjetosInterface
{
    private $nombre;
    private $peso;
    private $volumen;

    public function __construct($nombre,  $peso, $volumen)
    {
        $this->volumen = $volumen;
        $this->peso = $peso;
        $this->nombre = $nombre;
    }
    public function volumen()
    {
        return $this->volumen;
    }
    public function peso()
    {
        return $this->peso;
    }
    public function nombre()
    {
        return $this->nombre;
    }
}




class Lapiz implements ObjetosInterface
{
    private $volumen;
    private $peso;
    private $nombre;


    public function __construct($nombre,  $peso, $volumen)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
    }
    public function volumen()
    {
        return $this->volumen;
    }
    public function peso()
    {
        return $this->peso;
    }
    public function nombre()
    {
        return $this->nombre;
    }
}

class Pelota implements ObjetosInterface
{
    private $volumen;
    private $peso;
    private $nombre;


    public function __construct($nombre,  $peso, $volumen)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
    }
    public function volumen()
    {
        return $this->volumen;
    }
    public function peso()
    {
        return $this->peso;
    }
    public function nombre()
    {
        return $this->nombre;
    }
}

$caja1 = new Caja('caja 1', 1, 100, []);
$caja1->abierta();
$taza1 = new Taza('taza 1', 2, 20);
$taza2 = new Taza('taza 2', 2, 30);
$bici1 = new Bicicleta('bici 1', 5, 70);


echo '<br>';

$caja1->guardar($taza1);
$caja1->guardar($taza2);
$caja1->guardar($bici1);

echo '<br>';

$caja1->sacar($bici1);
$caja1->mostrar();
