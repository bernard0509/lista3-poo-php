
<?php

class Veiculo {
    // Atributos da classe pai
    public $marca;
    public $modelo;
    public $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function exibirDados() {
        echo "Marca: " . $this->marca . "<br>";
        echo "Modelo: " . $this->modelo . "<br>";
        echo "Ano: " . $this->ano . "<br>";
    }
}

class Carro extends Veiculo {
    // Atributo específico de Carro
    public $quantidadePortas;

    public function __construct($marca, $modelo, $ano, $quantidadePortas) {
        parent::__construct($marca, $modelo, $ano);
        $this->quantidadePortas = $quantidadePortas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo "Quantidade de portas: " . $this->quantidadePortas . "<br>";
    }
}

class Moto extends Veiculo {
    // Atributo específico de Moto
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $cilindradas) {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo "Cilindradas: " . $this->cilindradas . " cc<br>";
    }
}

// Criando objetos com dados diferentes
$carro = new Carro("Fiat", "Uno", 2013, 4);
$moto = new Moto("Kawasaki", "Ninja 250r", 2010, 250);

// Executando o método nos dois objetos
echo "<h3>Dados do carro</h3>";
$carro->exibirDados();

echo "<h3>Dados da moto</h3>";
$moto->exibirDados();

?>
