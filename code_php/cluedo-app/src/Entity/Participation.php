<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"participation")]
#[ORM\UniqueConstraint(name:"uniq_partie_joueur", columns:["id_partie","id_joueur"])]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id", type:"integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Partie::class)]
    #[ORM\JoinColumn(name:"id_partie", referencedColumnName:"id_partie", nullable:false)]
    private Partie $partie;

    #[ORM\ManyToOne(targetEntity: Joueur::class)]
    #[ORM\JoinColumn(name:"id_joueur", referencedColumnName:"id_joueur", nullable:false)]
    private Joueur $joueur;

    #[ORM\ManyToOne(targetEntity: Role::class)]
    #[ORM\JoinColumn(name:"id_role", referencedColumnName:"id_role", nullable:false)]
    private Role $role;

    #[ORM\ManyToOne(targetEntity: Personnage::class)]
    #[ORM\JoinColumn(name:"id_perso", referencedColumnName:"id_perso", nullable:true)]
    private ?Personnage $personnage = null;

   
}
