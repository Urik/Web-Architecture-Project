<?php

class InsurancesCreatorImpl implements IInsurancesCreator {
	public function createInsurance($variables){ 
		$fields = array(
            "descripcion" => $descripcion,
            "tasa" => $taza,
            "compania_id" => $this->id
        );
        return (new InsuranceDAO())->create($fields);
	}
	
	public function updateInsurance($object) {
		return (new InsuranceDAO())->update($cobertura);
	}
	
	public function deleteInsurance($object) {
		return (new InsuranceDAO())->delete($cobertura);
	}
}

?>