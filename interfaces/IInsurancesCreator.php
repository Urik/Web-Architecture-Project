<?php

interface IInsurancesCreator {
	public function createInsurance($variables);
	public function updateInsurance($object);
	public function deleteInsurance($object);
}