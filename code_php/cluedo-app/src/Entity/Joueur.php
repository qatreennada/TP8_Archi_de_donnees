<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"joueur")]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_joueur", type:"integer")]
    private ?int $id = null;

    #[ORM\Column(name:"pseudo", length:50)]
    private string $pseudo;

    public function getId(): ?int { return $this->id; }
    public function getPseudo(): string { return $this->pseudo; }
    public function setPseudo(string $p): self { $this->pseudo=$p; return $this; }
}
