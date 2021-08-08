<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
{
    //seeded 0.0205s
    public function run()
    {
        $data = [
            [
                'name' => 'ração frango',
                'code' => '23er456t',
                'price' => '19.95'
            ],
            [
                'name' => 'ração salmão',
                'code' => '1145rt6y',
                'price' => '19.95'
            ],
        ];

        $this->table('product')->insert($data)->saveData();
    }
}
