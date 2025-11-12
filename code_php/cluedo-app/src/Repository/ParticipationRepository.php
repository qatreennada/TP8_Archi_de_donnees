public function joueursAvecPersonnage(): array {
  return $this->createQueryBuilder('pa')
    ->select('j.pseudo AS joueur','per.nom AS personnage')
    ->join('pa.joueur','j')
    ->leftJoin('pa.personnage','per')
    ->getQuery()->getArrayResult();
}
