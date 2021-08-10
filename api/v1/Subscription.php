<?php

namespace v1;

use Services\Subscription as ServicesSubscription;

class Subscription
{


    /**
     *
     * @url GET /customer/{$idCustomer}
     *
     * @return array
     * @throws RestException
     */
    public function getByIdCustomer(int $idCustomer): array
    {
        $subscription = new ServicesSubscription();
        return $subscription->getSubscriptionCustomer($idCustomer);
    }

    /**
     *
     * @url DELETE /{idSubscription}/pet/{idPet}
     *
     * @return array
     * @throws RestException
     */
    public function deletePet(int $idSubscription, int $idPet): bool
    {
        $subscription = new ServicesSubscription();
        return $subscription->removePet($idPet, $idSubscription);
    }
}
