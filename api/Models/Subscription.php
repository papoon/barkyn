<?php

namespace Models;

class Subscription
{

    private $db;
    private $table = 'subscription';
    public function __construct(DB $db = null)
    {
        $this->db = $db ?? DB::getConnection();
    }

    /**
     * Get Customer Subscription
     *
     * @param integer $idCustomer
     * @return array
     */
    public function getSubscriptionCustomer(int $idCustomer): array
    {
        return $this->db->from($this->table)->where('idcustomer')->is($idCustomer)->select()->all();
    }

    /**
     * Update Subscription
     *
     * @param integer $idSubscription
     * @param array $columnsValues
     * @return boolean
     */
    public function update(int $idSubscription, array $columnsValues): bool
    {
        return $this->db->update($this->table)
            ->where('id')->is($idSubscription)
            ->set($columnsValues);
    }
}
