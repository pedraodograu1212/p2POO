<?php

require_once('Item.php');
require_once('Inventario.php');
require_once('Ataque.php');
require_once('Defesa.php');
require_once('Magia.php');
require_once('Player.php');

// Criação dos jogadores
$player1 = new Player("Jogador1", 1);
$player2 = new Player("Jogador2", 1);

// Criação dos itens
$espada = new Ataque("Espada", 7, "Ataque");
$escudo = new Defesa("Escudo", 4, "Defesa");
$feitiço = new Magia("Feitiço", 2, "Magia");

// Coleta de itens pelo Jogador 1
$player1->coletarItem($espada);
$player1->coletarItem($escudo);

// Coleta de itens pelo Jogador 2
$player2->coletarItem($feitiço);
$player2->coletarItem($escudo);

// Exibe o inventário dos jogadores
echo "Inventário de " . $player1->getSobrenome() . ":\n";
$player1->mostrarInventario();

echo "\nInventário de " . $player2->getSobrenome() . ":\n";
$player2->mostrarInventario();

// Jogador 1 tenta coletar mais itens, mas o inventário pode estar cheio
$player1->coletarItem(new Ataque("Machado", 7, "Ataque"));
$player1->coletarItem(new Defesa("Cota de Malha", 4, "Defesa"));

// Exibe o inventário após tentar coletar mais itens
echo "\nInventário de " . $player1->getSobrenome() . " após coletar mais itens:\n";
$player1->mostrarInventario();

// Jogador 1 sobe de nível
$player1->subirNivel();
echo "\nJogador 1 subiu de nível!\n";
echo "Novo inventário de " . $player1->getSobrenome() . " após subir de nível:\n";
$player1->mostrarInventario();

// Exibe novamente os inventários dos jogadores
echo "\nInventário de " . $player1->getSobrenome() . " (final):\n";
$player1->mostrarInventario();

echo "\nInventário de " . $player2->getSobrenome() . " (final):\n";
$player2->mostrarInventario();

?>
