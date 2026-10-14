<?php

class Pessoa {
    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    // Método declarado na classe Pessoa
    public function apresentar() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Email: " . $this->email . "<br>";
    }
}

class Funcionario extends Pessoa {
    public $salario;
    public $matricula;

    public function __construct($nome, $email, $salario, $matricula) {
        parent::__construct($nome, $email);
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    // Método declarado na classe Funcionario
    public function trabalhar() {
        echo $this->nome . " está trabalhando.<br>";
    }
}

class Programador extends Funcionario {
    public $linguagemPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $linguagemPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    // Método declarado na classe Programador
    public function programar() {
        echo $this->nome . " está programando em "
             . $this->linguagemPrincipal . ".<br>";
    }
}

class Designer extends Funcionario {
    public $ferramentaPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $ferramentaPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->ferramentaPrincipal = $ferramentaPrincipal;
    }

    // Método declarado na classe Designer
    public function criarLayout() {
        echo $this->nome . " está criando um layout usando "
             . $this->ferramentaPrincipal . ".<br>";
    }
}

// 2. Criando um objeto Programador
$programador = new Programador(
    "Bruno",
    "bruno@email.com",
    5000.00,
    "F001",
    "PHP"
);

// Executando os métodos solicitados
echo "<h2>Dados do Programador</h2>";

$programador->apresentar();
$programador->trabalhar();
$programador->programar();

?>