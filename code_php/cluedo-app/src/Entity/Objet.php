<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name:"objet")]
class Objet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_objet", type:"integer")]
    private ?int $id = null;

    #[ORM\Column(name:"nom", length:50)]
    private string $nom;

    #[ORM\ManyToMany(targetEntity: Piece::class, mappedBy:"objets")]
    private Collection $pieces;

    public function __construct(){ $this->pieces=new ArrayCollection(); }

    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $n): self { $this->nom=$n; return $this; }
}
