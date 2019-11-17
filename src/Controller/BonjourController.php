<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BonjourController extends AbstractController {
	/**
	 * @Route("/info/{nom}", name="bonjour")
	 */
	public function index($nom='') {
		if ($nom == '') {
			// Choix aléatoire du prénom depuis le fichier "prenoms.txt" dans le dossier "public"
			$liste_prenoms = file('./prenoms.txt');
			$liste_prenoms = str_replace(array("\n", "\r"), "", $liste_prenoms);
			$prenom = $liste_prenoms[array_rand($liste_prenoms)];
			$retour = 'Hello inconnu.e, nous avons décidé de vous appeler ' . $prenom . '.';
		}
		elseif ($nom == 'feedtheram')
			$retour = 'Vous êtes bien tombé.e.';
		else
			$retour = 'Hello ' . $nom;
		
		// Envoie des données
		return $this->json([
			'retour' => $retour
		]);
	}
}
