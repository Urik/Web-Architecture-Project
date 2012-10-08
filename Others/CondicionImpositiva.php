<?php

class CondicionImpositiva extends Thing {
    private $name = "";
    private $description = "";
    
    function __construct($id, $name, $description) {
        $this->setId($id);
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
    
    public function getVariablesAsMap() {
        $map = array(
            CondicionImpositivaColumns::NAME => $this->name,
            CondicionImpositivaColumns::DESCRIPTION => $this->description
        );
        return $map;
    }
}

?>
