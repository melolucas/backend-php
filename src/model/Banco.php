<?php
    
namespace Moovin\Job\Backend\Model;

class Model
{

    // Deposito
    public function deposito($usuario, $valor)
    {
        $usuario['saldo'] = $usuario['saldo'] + $valor;
        return 'Deposito realizado com sucesso. Seu novo saldo é B$ ' . $usuario['saldo'];   
    }

    // Saque
    public function saque($usuario, $valor)
    {   
        if ($usuario['tipoconta'] == 'Corrente') {
            if($valor > 600.00) {
                return 'Limite da conta excedido. Seu limite para saque é de R$ 600,00';
            }
            $taxa = 2.50;
        } else {
            if ($valor > 1000.00) {
                return 'Limite da conta excedido. Seu limite para saque é de R$ 1000,00';
            }
            $taxa = 0.80;
        }

        $opSaque = $valor + $taxa;
        if ($opSaque > $usuario['saldo']) {
            return "Saldo insuficiente, o valor disponível em sua conta é de B$ " . $usuario['saldo'];
        }

        $usuario['saldo'] = $usuario['saldo'] - ($valor + $taxa);
        return 'Saque realizado com sucesso. Seu novo saldo é B$ ' . $usuario['saldo'];
    }

    // Transferência
    public function transferencia($usuario, $destinatario, $valor)
    {
        if ($valor > $usuario['saldo']) {
            return 'Transferência negada. Saldo insuficiente o valor disponivel na sua conta é de B$ ' . $usuario['saldo'];
        }

        $usuario['saldo'] = $usuario['saldo'] - $valor;
        $destinatario['saldo'] = $destinatario['saldo'] + $valor;
        return 'Transferência realizada com sucesso. Saldo atual: B$ ' . $usuario['saldo'];
    }
}
