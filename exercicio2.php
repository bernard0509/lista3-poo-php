
<?php

class Funcionario {
    public $nome;
    public $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function exibirFuncionario() {
        echo "Nome: " . $this->nome . "<br>";
        echo "CPF: " . $this->cpf . "<br>";
        echo "Salário: R$ " . number_format($this->salario, 2, ',', '.') . "<br>";
    }
}

class Gerente extends Funcionario {
    public $setor;

    public function __construct($nome, $cpf, $salario, $setor) {
        parent::__construct($nome, $cpf, $salario);
        $this->setor = $setor;
    }

    public function realizarReuniao() {
        echo $this->nome . " está realizando uma reunião no setor de "
             . $this->setor . ".<br>";
    }
}

class Desenvolvedor extends Funcionario {
    public $linguagem;

    public function __construct($nome, $cpf, $salario, $linguagem) {
        parent::__construct($nome, $cpf, $salario);
        $this->linguagem = $linguagem;
    }

    public function programar() {
        echo $this->nome . " está programando em "
             . $this->linguagem . ".<br>";
    }
}

$gerente = new Gerente("Eduardo", "123.111.222-11", 4500, "TI");

$desenvolvedor = new Desenvolvedor(
    "Ana",
    "999.999.999-11",
    3500,
    "PHP"
);

echo "<h2>Dados do Gerente</h2>";
$gerente->exibirFuncionario();
$gerente->realizarReuniao();

echo "<hr>";

echo "<h2>Dados do Desenvolvedor</h2>";
$desenvolvedor->exibirFuncionario();
$desenvolvedor->programar();

echo "<hr>";

echo "<h2>Teste do método programar() no Gerente</h2>";
$gerente->programar();

?>
