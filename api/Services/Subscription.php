<?php

namespace Services;

use Models\Subscription as ModelsSubscription;
use Models\SubscriptionPet as ModelsSubscriptionPet;

class Subscription
{

    private $modelSubscription;
    private $modelSubscriptionPet;
    public function __construct(ModelsSubscription $modelSubscription = null, ModelsSubscriptionPet $modelSubscriptionPet = null)
    {
        $this->modelSubscription    = $modelSubscription    ?? new ModelsSubscription();
        $this->modelSubscriptionPet = $modelSubscriptionPet ?? new ModelsSubscriptionPet();
    }

    /**
     * Get Customer Subscription
     *
     * @param integer $idCustomer
     * @return array
     */
    public function getSubscriptionCustomer(int $idCustomer): array
    {
        return $this->modelSubscription->getSubscriptionCustomer($idCustomer);
    }

    /**
     * Delete pet from subscription
     *
     * @param integer $idPet
     * @param integer $idSubscription
     * @return boolean
     */
    public function removePet(int $idPet, int $idSubscription): bool
    {
        return $this->modelSubscriptionPet->deletePet($idPet, $idSubscription);
    }

    /**
     * Update Next Order Date
     *
     * @param integer $idSubscription
     * @param string $date
     * @return void
     */
    public function updateNextOrder(int $idSubscription, string $date): bool
    {
        return $this->modelSubscription->update($idSubscription, ['nextorderdate' => $date]);
    }
}
