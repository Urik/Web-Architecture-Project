<?php

class CondicionImpositiva extends Thing {
    private $name = "";
    private $description = "";
    
    function __construct($name, $description) {
        $this->name = $name;
        $this->description = $description;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}

?>