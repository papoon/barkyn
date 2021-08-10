<?php

namespace Services;

use Models\Customer as ModelsCustomer;

class Customer
{

    private $modelCustomer;
    public function __construct(ModelsCustomer $modelCustomer = null)
    {
        $this->modelCustomer = $modelCustomer ?? new ModelsCustomer();
    }

    /**
     * Get all Customers
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->modelCustomer->getAll();
    }

    /**
     * Get all Customers
     *
     * @return array
     */
    public function get(int $idCustomer): array
    {
        return $this->modelCustomer->get($idCustomer);
    }

    /**
     * Update Customer
     *
     * @param integer $idCustomer
     * @param array $columnsValues -> array key => values keys are the name of the table columns and values are the values to update that columns
     * @return boolean
     */
    public function update(int $idCustomer, array $columnsValues): bool
    {
        return $this->modelCustomer->update($idCustomer, $columnsValues);
    }
}
