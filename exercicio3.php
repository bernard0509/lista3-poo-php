
<?php

class Pessoa {
    public $nome;
    public $idade;
    public $email;

    public function __construct($nome, $idade, $email) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Idade: " . $this->idade . "<br>";
        echo "Email: " . $this->email . "<br>";
    }
}

class Aluno extends Pessoa {
    public $matricula;
    public $curso;

    public function __construct($nome, $idade, $email, $matricula, $curso) {
        parent::__construct($nome, $idade, $email);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function estudar() {
        echo $this->nome . " está estudando " . $this->curso . ".<br>";
    }
}

class Professor extends Pessoa {
    public $especialidade;
    public $salario;

    public function __construct($nome, $idade, $email, $especialidade, $salario) {
        parent::__construct($nome, $idade, $email);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function ministrarAula() {
        echo $this->nome . " está ministrando aula de "
             . $this->especialidade . ".<br>";
    }
}

// 1. Criando dois alunos e um professor
$bruno = new Aluno(
    "Bruno", 20, "bruno@email.com", "2026001", "Sistemas de Informação"
);

$eduarda = new Aluno(
    "Eduarda", 22, "eduarda@email.com", "2026002", "Análise e Desenvolvimento de Sistemas"
);

$vitoria = new Professor(
    "Vitória", 35, "vitoria@email.com", "Programação", 5000
);

// 2. Executando apresentar() e os métodos específicos

echo "<h2>Aluno: Bruno</h2>";
$bruno->apresentar();
echo "Matrícula: " . $bruno->matricula . "<br>";
echo "Curso: " . $bruno->curso . "<br>";
$bruno->estudar();

echo "<hr>";

echo "<h2>Aluna: Eduarda</h2>";
$eduarda->apresentar();
echo "Matrícula: " . $eduarda->matricula . "<br>";
echo "Curso: " . $eduarda->curso . "<br>";
$eduarda->estudar();

echo "<hr>";

echo "<h2>Professora: Vitória</h2>";
$vitoria->apresentar();
echo "Especialidade: " . $vitoria->especialidade . "<br>";
echo "Salário: R$ " . number_format($vitoria->salario, 2, ',', '.') . "<br>";
$vitoria->ministrarAula();

/*
3. O método apresentar() funciona nas subclasses porque Aluno e Professor
herdam da classe Pessoa usando extends. Assim, as duas subclasses podem
utilizar os atributos e métodos públicos definidos na classe pai.
*/

?>