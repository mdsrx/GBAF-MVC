<?php

require_once("Manager.php");

class PartnersManager extends Manager
{
	public function getPartners() {
		$db = $this->dbConnect();

		$partnersRequest = $db->query('SELECT id_acteur, acteur, description, logo FROM acteurs ORDER BY id_acteur');

		return $partnersRequest;
	}

	public function getPartner($id_partner) {
		$db = $this->dbConnect();

		$partnerRequest = $db->prepare('SELECT id_acteur, acteur, description, logo FROM acteurs WHERE id_acteur = :id_acteur');
		$partnerRequest->execute(array(
			'id_acteur' => $id_partner
		));
		$partner = $partnerRequest->fetch();
		$partnerRequest->closeCursor();

		return $partner;
	}

	public function getComments($id_partner) {
		$db = $this->dbConnect();

		$sqlRequest = 	'
							SELECT
							p.post,
							p.id_user,
							DATE_FORMAT(p.date_post, \'le %d/%m/%Y à %Hh%imin%ss\') AS dateCom,
							m.nom,
							m.prenom
							FROM posts AS p
							LEFT JOIN membres AS m
							ON p.id_user = m.id_user
							WHERE id_acteur = ?
							ORDER BY dateCom
							DESC
						';


		$requestComments = $db->prepare($sqlRequest);
		$requestComments->execute(array($id_partner));

		return $requestComments;
	}
}