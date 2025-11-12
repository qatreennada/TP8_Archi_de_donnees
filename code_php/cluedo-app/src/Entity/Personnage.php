<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"personnage")]
class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_perso", type:"integer")]
    private ?int $id = null;

    #[ORM\Column(name:"nom", length:50)]
    private string $nom;

    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $n): self { $this->nom=$n; return $this; }
}
