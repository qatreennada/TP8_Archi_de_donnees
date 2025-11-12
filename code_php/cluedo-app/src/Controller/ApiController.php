#[Route('/api/joueurs-personnages', methods:['GET'])]
public function jp(\App\Repository\ParticipationRepository $r){
  return $this->json($r->joueursAvecPersonnage());
}
