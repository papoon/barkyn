<?php

namespace Models;

class SubscriptionPet
{

    private $db;
    private $table = 'subscriptionpet';
    public function __construct(DB $db = null)
    {
        $this->db = $db ?? DB::getConnection();
    }

    public function deletePet(int $idPet, $idSubscription)
    {
        return $this->db->from($this->table)->where('idpet')->is($idPet)->andWhere('idsubscription')->is($idSubscription)->delete();
    }
}
