<?php

namespace v1;

use Services\Customer as CustomerService;

class Customer
{

    /**
     *
     * @url GET /
     *
     * @return array
     * @throws RestException
     */
    public function all(): array
    {
        $customerService = new CustomerService();
        return $customerService->getAll();
    }

    /**
     *
     * @url GET /{$idCustomer}
     *
     * @return array
     * @throws RestException
     */
    public function get(int $idCustomer): array
    {
        $customerService = new CustomerService();
        return $customerService->get($idCustomer);
    }

    /**
     *
     * @url PUT /{$idCustomer}
     *
     * @return array
     * @throws RestException
     */
    public function updateName(int $idCustomer, array $columnsValues): bool
    {
        $customerService = new CustomerService();
        return $customerService->update($idCustomer, $columnsValues);
    }
}
