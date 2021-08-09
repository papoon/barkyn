<?php

namespace Models;

use Models\DB;

class Customer
{

    private $db;
    private $table = 'customer';
    public function __construct(DB $db = null)
    {
        $this->db = $db ?? DB::getConnection();
    }

    /**
     * get all customers
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->db->from($this->table)->select()->all();
    }

    public function update(int $idCustomer, array $fields): bool
    {
        return $this->db->update($this->table)->where('id')->is($idCustomer)->set($fields);
    }
}
