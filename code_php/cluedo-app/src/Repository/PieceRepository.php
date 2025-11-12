public function piecesSansPresence(): array {
  return $this->createQueryBuilder('pi')
    ->leftJoin('App\Entity\Presence','pr','WITH','pr.piece = pi')
    ->andWhere('pr.id IS NULL')
    ->getQuery()->getResult();
}
