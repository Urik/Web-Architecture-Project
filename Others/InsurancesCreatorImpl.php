<?php

class InsurancesCreatorImpl implements IInsurancesCreator {
	public function createInsurance($variables){ 
		$fields = array(
            "descripcion" => $descripcion,
            "tasa" => $taza,
            "compania_id" => $this->id
        );
        return (new CoberturaDAO())->create($fields);
	}
	
	public function updateInsurance($object) {
		return (new CoberturaDAO())->update($cobertura);
	}
	
	public function deleteInsurance($object) {
		return (new CoberturaDAO())->delete($cobertura);
	}
}

?>