<?php

class ContaBancaria {
    public $titular;
    public $saldo;

    public function __construct($titular, $saldo) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        if ($valor <= 0) {
            echo "Valor de depósito inválido!<br>";
            return;
        }

        $this->saldo += $valor;
        echo "Depósito de R$ " . number_format($valor, 2, ',', '.') .
             " realizado com sucesso.<br>";
    }

    public function sacar($valor) {
        if ($valor <= 0) {
            echo "Valor de saque inválido!<br>";
            return;
        }

        if ($valor > $this->saldo) {
            echo "Saque recusado! Saldo insuficiente.<br>";
            return;
        }

        $this->saldo -= $valor;
        echo "Saque de R$ " . number_format($valor, 2, ',', '.') .
             " realizado com sucesso.<br>";
    }

    public function consultarSaldo() {
        echo "Titular: " . $this->titular . "<br>";
        echo "Saldo atual: R$ " .
             number_format($this->saldo, 2, ',', '.') . "<br>";
    }
}

class ContaCorrente extends ContaBancaria {
    public $limite;

    public function __construct($titular, $saldo, $limite) {
        parent::__construct($titular, $saldo);
        $this->limite = $limite;
    }

    public function usarLimite($valor) {
        if ($valor <= 0) {
            echo "Valor inválido para usar o limite.<br>";
            return;
        }

        if ($valor > $this->limite) {
            echo "Operação recusada! Limite insuficiente.<br>";
            return;
        }

        $this->limite -= $valor;
        $this->saldo -= $valor;

        echo "Limite utilizado: R$ " .
             number_format($valor, 2, ',', '.') . "<br>";
    }
}

class ContaPoupanca extends ContaBancaria {
    public $taxaRendimento;

    public function __construct($titular, $saldo, $taxaRendimento) {
        parent::__construct($titular, $saldo);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento() {
        $rendimento = $this->saldo * ($this->taxaRendimento / 100);
        $this->saldo += $rendimento;

        echo "Rendimento aplicado: R$ " .
             number_format($rendimento, 2, ',', '.') . "<br>";
    }
}

$conta = new ContaBancaria("Bruno", 1000.00);

echo "<h2>Operações bancárias</h2>";

$conta->consultarSaldo();

echo "<br>Realizando depósito:<br>";
$conta->depositar(500.00);
$conta->consultarSaldo();

echo "<br>Realizando saque:<br>";
$conta->sacar(200.00);
$conta->consultarSaldo();

echo "<br><h3>Teste de saque recusado</h3>";

$conta->sacar(2000.00);

echo "Saldo após a tentativa de saque:<br>";
$conta->consultarSaldo();
?>
