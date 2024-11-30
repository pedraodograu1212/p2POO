<?php

require_once('item.php');

class Defesa extends Item {
    public function __construct($nome) {
        parent::__construct($nome, 4, 'Defesa'); // defesa pesa 4 no inventario inicalmente
    }
}

?>
