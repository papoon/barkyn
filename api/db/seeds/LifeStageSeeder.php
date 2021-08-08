<?php


use Phinx\Seed\AbstractSeed;

class LifeStageSeeder extends AbstractSeed
{
    //seeded 0.0155s
    public function run()
    {
        $data = [
            [
                'stage'    => 'puppy'
            ],
            [
                'stage'    => 'adult'
            ],
            [
                'stage'    => 'senior'
            ]
        ];

        $this->table('petlifestage')->insert($data)->saveData();
    }
}
