<?php
require_once('item.php');

class Ataque extends Item {
    public function __construct($nome) {
        parent::__construct($nome, 7, 'Ataque'); // ataque tem pesp 7 no iventário inicialmente
    }
}

?>



