<?php


use Phinx\Seed\AbstractSeed;

class SubscriptionSeeder extends AbstractSeed
{
    //seeded 0.0237s
    public function run()
    {
        $data = [
            [
                'baseprice'    => '29.95',
                'totalprice' => '29.95',
                'startdate'  => date('Y-m-d'),
                'enddate' => NULL,
                'nextorderdate' => date('2021-08-15'),
                'idcustomer' => 1
            ]
        ];

        $this->table('subscription')->insert($data)->saveData();
    }
}
