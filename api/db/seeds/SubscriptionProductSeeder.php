<?php


use Phinx\Seed\AbstractSeed;

class SubscriptionProductSeeder extends AbstractSeed
{
    //seeded 0.0148s
    public function run()
    {
        $data = [
            [
                'idsubscription'    => 1,
                'idproduct' => 2,
                'quantity' => 2
            ],
            [
                'idsubscription'    => 1,
                'idproduct' => 1,
                'quantity' => 1
            ],
        ];

        $this->table('subscriptionproduct')->insert($data)->saveData();
    }
}
