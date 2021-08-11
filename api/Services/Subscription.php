<?php

namespace Services;

use Exception;
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
     * @throws Exception
     * @return void
     */
    public function updateNextOrder(int $idSubscription, string $date): bool
    {
        if (strpos($date, '-') == false) {
            throw new Exception('Invalid Date');
        }

        $dataArray = explode('-', $date);
        if (count($dataArray) !== 3) {
            throw new Exception('Invalid Date');
        }
        
        [$year, $month, $day] = $dataArray;
        if (checkdate($year, $month, $day)) {
            throw new Exception('Invalid Date');
        }

        if ($date < date('Y-m-d')) {
            throw new Exception('the date ' . $date . 'is in the past');
        }

        return $this->modelSubscription->update($idSubscription, ['nextorderdate' => $date]);
    }
}
