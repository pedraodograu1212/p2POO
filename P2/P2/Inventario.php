<?php
class Inventario {
    private int $capacidadeMaxima;
    private array $itens;  

    public function __construct(int $capacidadeMaxima) {
        $this->setCapacidadeMaxima($capacidadeMaxima);
        $this->itens = [];
    }

    public function getCapacidadeMaxima(): int {
        return $this->capacidadeMaxima;
    }

    public function setCapacidadeMaxima(int $capacidadeMaxima): void {
        if ($capacidadeMaxima < 0) {
            $this->capacidadeMaxima = 0;
        } else {
            $this->capacidadeMaxima = $capacidadeMaxima;
        }
    }

    public function capacidadeLivre(): int {
        $ocupado = 0;
        foreach ($this->itens as $item) {
            $ocupado += $item->getTamanho();
        }
        return $this->capacidadeMaxima - $ocupado;
    }

    public function adicionar(Item $item): void {
        if ($item->getTamanho() <= $this->capacidadeLivre()) {
            $this->itens[] = $item;
            echo "Item '" . $item->getNome() . "' adicionado ao inventário.\n";
        } else {
            echo "Espaço insuficiente para adicionar o item '" . $item->getNome() . "'.\n";
        }
    }

    public function remover(Item $item): void {
        foreach ($this->itens as $index => $itemAtual) {
            if ($itemAtual === $item) {
                unset($this->itens[$index]); // Remove o item
                $this->itens = array_values($this->itens); // Reindexa o array
                echo "Item '" . $item->getNome() . "' removido do inventário.\n";
                return;
            }
        }
        echo "Item '" . $item->getNome() . "' não encontrado no inventário.\n";
    }

    public function getItens(): array {
        return $this->itens;
    }
}
