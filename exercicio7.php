<?php

class Entrega {
    public $codigo;
    public $destino;
    public $distancia;

    public function __construct($codigo, $destino, $distancia) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->distancia = $distancia;
    }

    public function exibirDados() {
        echo "Código: " . $this->codigo . "<br>";
        echo "Destino: " . $this->destino . "<br>";
        echo "Distância: " . $this->distancia . " km<br>";
    }
}

class EntregaMoto extends Entrega {
    public $modeloMoto;
    public $nomeEntregador;

    public function __construct($codigo, $destino, $distancia, $modeloMoto, $nomeEntregador) {
        parent::__construct($codigo, $destino, $distancia);
        $this->modeloMoto = $modeloMoto;
        $this->nomeEntregador = $nomeEntregador;
    }

    public function realizarEntrega() {
        echo "Entrega realizada por moto com sucesso!<br>";
        echo "Moto: " . $this->modeloMoto . "<br>";
        echo "Entregador: " . $this->nomeEntregador . "<br>";
    }
}

class EntregaDrone extends Entrega {
    public $modeloDrone;
    public $autonomiaBateria;

    public function __construct($codigo, $destino, $distancia, $modeloDrone, $autonomiaBateria) {
        parent::__construct($codigo, $destino, $distancia);
        $this->modeloDrone = $modeloDrone;
        $this->autonomiaBateria = $autonomiaBateria;
    }

    public function realizarEntrega() {
        if ($this->distancia > 20) {
            echo "Entrega por drone recusada! A distância máxima permitida é de 20 km.<br>";
            return;
        }

        echo "Entrega realizada por drone com sucesso!<br>";
        echo "Modelo do drone: " . $this->modeloDrone . "<br>";
        echo "Autonomia da bateria: " . $this->autonomiaBateria . " minutos<br>";
    }
}

$moto = new EntregaMoto(
    "M001", "Centro", 12, "Honda CG 160", "Bruno"
);

$droneValido = new EntregaDrone(
    "D001", "Bairro A", 8, "DJI Mini", 30
);

$droneInvalido = new EntregaDrone(
    "D002", "Bairro B", 25, "DJI Mini", 30
);

echo "<h2>Entrega por Moto</h2>";
$moto->exibirDados();
$moto->realizarEntrega();

echo "<hr>";

echo "<h2>Entrega por Drone - 8 km</h2>";
$droneValido->exibirDados();
$droneValido->realizarEntrega();

echo "<hr>";

echo "<h2>Entrega por Drone - 25 km</h2>";
$droneInvalido->exibirDados();
$droneInvalido->realizarEntrega();

?>