<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name:"piece")]
class Piece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_piece", type:"integer")]
    private ?int $id = null;

    #[ORM\Column(name:"nom", length:50)]
    private string $nom;


    #[ORM\ManyToMany(targetEntity: Objet::class, inversedBy:"pieces")]
    #[ORM\JoinTable(name:"contenir")]
    #[ORM\JoinColumn(name:"id_piece", referencedColumnName:"id_piece")]
    #[ORM\InverseJoinColumn(name:"id_objet", referencedColumnName:"id_objet")]
    private Collection $objets;

    public function __construct(){ $this->objets=new ArrayCollection(); }

    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $n): self { $this->nom=$n; return $this; }
    public function getObjets(): Collection { return $this->objets; }
}
