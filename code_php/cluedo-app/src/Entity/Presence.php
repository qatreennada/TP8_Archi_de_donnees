<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"presence")]
class Presence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_presence", type:"integer")]
    private ?int $id = null;

    #[ORM\ManyToOne] #[ORM\JoinColumn(name:"id_partie", referencedColumnName:"id_partie", nullable:false)]
    private Partie $partie;

    #[ORM\ManyToOne] #[ORM\JoinColumn(name:"id_perso", referencedColumnName:"id_perso", nullable:false)]
    private Personnage $personnage;

    #[ORM\ManyToOne] #[ORM\JoinColumn(name:"id_piece", referencedColumnName:"id_piece", nullable:false)]
    private Piece $piece;

    #[ORM\Column(name:"date_jour", type:"date_mutable")]
    private \DateTimeInterface $dateJour;

    #[ORM\Column(name:"heure_debut", type:"time_mutable")]
    private \DateTimeInterface $heureDebut;

    #[ORM\Column(name:"heure_fin", type:"time_mutable")]
    private \DateTimeInterface $heureFin;

    
}
