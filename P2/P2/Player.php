<?php
class Player {
    private string $sobrenome;
    private int $nivel;
    private $inventario;

    public function __construct($sobrenome, $nivel) {
        $this->setSobrenome($sobrenome);
        $this->setNivel($nivel);
        $this->inventario = new Inventario(20); 
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel(int $nivel): void {
        if ($nivel < 0) {
            $this->nivel = 0;
        } else {
            $this->nivel = $nivel;
        }
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): void {
        if (empty($sobrenome)) {
            $this->Sobrenome = "Informe um sobrenome válido";
        } else {
            $this->sobrenome = $sobrenome;
        }
    }

    public function getInventario() {
        return $this->inventario;
    }

    public function subirNivel() {
        $this->nivel++;
        $novaCapacidade = 20 + ($this->nivel * 3);
        $this->inventario->setCapacidadeMaxima($novaCapacidade); // Atualiza a capacidade do inventário
    }

    public function coletarItem(Item $item) {
        if ($this->inventario->capacidadeLivre() >= $item->getTamanho()) {
            $this->inventario->adicionar($item);
            echo "Item coletado: " . $item->getNome() . "<br>";
        } else {
            echo "Espaço insuficiente para adicionar o item '" . $item->getNome() . "'.<br>";
        }
    }

    public function soltarItem($sobrenome) {
        if ($this->inventario->removerItem($sobrenome)) {
            echo "Item solto: " . $sobrenome . "<br>";
        } else {
            echo "Item não encontrado no inventário: " . $sobrenome . "<br>";
        }
    }

    public function mostrarInventario() {
        $itens = $this->inventario->getItens();
        if (empty($itens)) {
            echo "O inventário está vazio.<br>";
        } else {
            foreach ($itens as $item) {
                echo $item->getNome() . " (Classe: " . $item->getClasse() . ", Tamanho: " . $item->getTamanho() . ")<br>";
            }
        }
    }
}
