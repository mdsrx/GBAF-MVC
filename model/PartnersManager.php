<?php

require_once("Manager.php");

class PartnersManager extends Manager
{
	public function getPartners() {
		$db = $this->dbConnect();

		$partnersRequest = $db->query('SELECT id_acteur, acteur, description, logo FROM acteurs ORDER BY id_acteur');

		return $partnersRequest;
	}
}