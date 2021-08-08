<?php


use Phinx\Seed\AbstractSeed;

class CustomerSeeder extends AbstractSeed
{
    //seeded 0.0307s
    public function run()
    {
        $data = [
            [
                'name'    => 'barkyn',
                'email' => 'barkyn@barkyn.com',
                'birthdate'  => date('2016-11-01'),
                'gender' => 'female'
            ]
        ];

        $this->table('customer')->insert($data)->saveData();
   
    }
}
