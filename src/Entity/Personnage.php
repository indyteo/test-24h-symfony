<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageRepository")
 */
class Personnage {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;
	
	// Constructeur de notre personnage
	public function __construct(int $id, string $prenom, int $age, string $type) {
		$this->id = $id;
		$this->prenom = $prenom;
		$this->age = $age;
		$this->type = $type;
	}

    public function getId(): ?int {
        return $this->id;
    }

    public function getPrenom(): ?string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int {
        return $this->age;
    }

    public function setAge(int $age): self {
        $this->age = $age;

        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): self {
        $this->type = $type;

        return $this;
    }
}
