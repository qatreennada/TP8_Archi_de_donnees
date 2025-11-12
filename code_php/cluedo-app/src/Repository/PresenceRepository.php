public function persosEnCuisineEntre(string $d='08:00', string $f='09:00'): array {
  return $this->createQueryBuilder('pr')
    ->select('DISTINCT per.nom')
    ->join('pr.personnage','per')
    ->join('pr.piece','pi')
    ->andWhere('pi.nom = :cuisine')
    ->andWhere('pr.heureDebut < :fin AND pr.heureFin > :debut')
    ->setParameter('cuisine','Cuisine')
    ->setParameter('debut', new \DateTime($d))
    ->setParameter('fin',   new \DateTime($f))
    ->getQuery()->getArrayResult();
}
