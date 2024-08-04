<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('modalidades')->insert([
        [
        'nome' => 'volei',
        'descricao' => '123',
        ],
        [
          'nome' => 'basquete',
          'descricao' => '123'
        ]
      ]);
    }
}
