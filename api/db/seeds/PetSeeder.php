<?php


use Phinx\Seed\AbstractSeed;

class PetSeeder extends AbstractSeed
{
    //seeded 0.0177s
    public function run()
    {
        $data = [
            [
                'name'    => 'faisca',
                'gender' => 'male',
                'idpetlifestage' => 1,
                'weight' => '5.45'
            ],
            [
                'name'    => 'tamara',
                'gender' => 'female',
                'idpetlifestage' => 2,
                'weight' => '3.5'
            ],
        ];

        $this->table('pet')->insert($data)->saveData();
    }
}
