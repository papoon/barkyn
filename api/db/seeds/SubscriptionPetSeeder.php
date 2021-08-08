<?php


use Phinx\Seed\AbstractSeed;

class SubscriptionPetSeeder extends AbstractSeed
{
    //seeded 0.0207s
    public function run()
    {
        $data = [
            [
                'idsubscription'    => 1,
                'idpet' => 1,
            ],
            [
                'idsubscription'    => 1,
                'idpet' => 2,
            ],
        ];

        $this->table('subscriptionpet')->insert($data)->saveData();
    }
}
