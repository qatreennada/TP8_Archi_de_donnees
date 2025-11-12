<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "role")]
class Role
{
    #[ORM\Id]
    #[ORM\Column(name:"id_role", type:"smallint")]
    private int $idRole;

    #[ORM\Column(name:"libelle", length:30)]
    private string $libelle;

    public function getIdRole(): int { return $this->idRole; }
    public function setIdRole(int $id): self { $this->idRole=$id; return $this; }
    public function getLibelle(): string { return $this->libelle; }
    public function setLibelle(string $v): self { $this->libelle=$v; return $this; }
}
