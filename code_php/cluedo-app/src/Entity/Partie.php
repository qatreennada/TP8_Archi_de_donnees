<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"partie")]
class Partie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_partie", type:"integer")]
    private ?int $id = null;

    #[ORM\Column(name:"date_partie", type:"date_mutable")]
    private \DateTimeInterface $datePartie;

    public function getId(): ?int { return $this->id; }
    public function getDatePartie(): \DateTimeInterface { return $this->datePartie; }
    public function setDatePartie(\DateTimeInterface $d): self { $this->datePartie=$d; return $this; }
}
