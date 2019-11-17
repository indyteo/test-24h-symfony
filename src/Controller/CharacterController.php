<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Personnage;

class CharacterController extends AbstractController
{
    /**
     * @Route("/character/{id}", name="character")
     */
    public function index($id=0) {
		// Choix aléatoire du prénom depuis le fichier "prenoms.txt" dans le dossier "public"
		$liste_prenoms = file('./prenoms.txt');
		$liste_prenoms = str_replace(array("\n", "\r"), "", $liste_prenoms);
		$prenom = $liste_prenoms[array_rand($liste_prenoms)];
		
		// Affectation d'un âge et du type correspondant
		if ($id % 2 == 0) {
			$age = rand(1, 100);
			$type = 'normal.e';
		}
		else {
			$age = rand(1, 1000);
			$type = 'participant.e aux 24h';
		}
		
		// Instanciation de la personne
		$personne = new Personnage($id, $prenom, $age, $type);
		// Envoie des données
        return $this->json([
            'name' => $personne->getPrenom(),
            'age' => $personne->getAge(),
			'type' => $personne->getType()
        ]);
    }
}
