<?php

class Produto {
    public $nome;
    public $preco;
    public $codigo;

    public function __construct($nome, $preco, $codigo) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }

    public function exibirProduto() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Código: " . $this->codigo . "<br>";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }

    public function aplicarDesconto($percentual) {
        // Valida se o desconto está entre 0 e 100
        if ($percentual < 0 || $percentual > 100) {
            echo "Desconto inválido! O preço não foi alterado.<br>";
            return;
        }

        $this->preco = $this->preco - ($this->preco * $percentual / 100);

        echo "Desconto de " . $percentual . "% aplicado com sucesso!<br>";
        echo "Novo preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}

class Livro extends Produto {
    public $autor;
    public $isbn;

    public function __construct($nome, $preco, $codigo, $autor, $isbn) {
        parent::__construct($nome, $preco, $codigo);
        $this->autor = $autor;
        $this->isbn = $isbn;
    }
}

class Eletronico extends Produto {
    public $marca;
    public $garantiaMeses;

    public function __construct($nome, $preco, $codigo, $marca, $garantiaMeses) {
        parent::__construct($nome, $preco, $codigo);
        $this->marca = $marca;
        $this->garantiaMeses = $garantiaMeses;
    }
}

$livro = new Livro(
    "Clean Code", 100.00, "L001", "Robert C. Martin", "9780132350884"
);

$eletronico = new Eletronico(
    "Notebook", 2000.00, "E001", "Dell", 12
);

echo "<h2>Livro</h2>";
$livro->exibirProduto();
echo "Autor: " . $livro->autor . "<br>";
echo "ISBN: " . $livro->isbn . "<br>";

echo "<br>Aplicando desconto de 10%:<br>";
$livro->aplicarDesconto(10);

echo "<hr>";

echo "<h2>Eletrônico</h2>";
$eletronico->exibirProduto();
echo "Marca: " . $eletronico->marca . "<br>";
echo "Garantia: " . $eletronico->garantiaMeses . " meses<br>";

echo "<br>Aplicando desconto de 15%:<br>";
$eletronico->aplicarDesconto(15);

echo "<hr>";
echo "<h2>Teste de desconto inválido</h2>";

echo "Preço atual do livro: R$ "
    . number_format($livro->preco, 2, ',', '.') . "<br>";

$livro->aplicarDesconto(-5);

echo "Preço após tentativa inválida: R$ "
    . number_format($livro->preco, 2, ',', '.') . "<br>";

?>
