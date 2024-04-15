<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrofeuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('trofeus')->insert([
        [
          'nome' => 'Produto 1',
          'campus_id' => 1,
          'ano' => 2024,
          'colocacao' => 1,
          'status_id' => 1,
          'obs' => 'Sem observações',
          'url_imagem' => 'caminho_para_imagem1.jpg',
          'created_at' => now(),
          'updated_at' => now(),
          'modalidade_id' => 1,
        ],
        [
          'nome' => 'Produto 2',
          'campus_id' => 1,
          'ano' => 2024,
          'colocacao' => 2,
          'status_id' => 1,
          'obs' => 'Sem observações',
          'url_imagem' => 'caminho_para_imagem2.jpg',
          'created_at' => now(),
          'updated_at' => now(),
          'modalidade_id' => 1,
        ],
        [
          'nome' => 'Produto 3',
          'campus_id' => 1,
          'ano' => 2024,
          'colocacao' => 3,
          'status_id' => 1,
          'obs' => 'Sem observações',
          'url_imagem' => 'caminho_para_imagem3.jpg',
          'created_at' => now(),
          'updated_at' => now(),
          'modalidade_id' => 1,
        ],
        [
          'nome' => 'Produto 4',
          'campus_id' => 1,
          'ano' => 2024,
          'colocacao' => 4,
          'status_id' => 1,
          'obs' => 'Descrição curta do Produto 4',
          'url_imagem' => 'caminho_para_imagem4.jpg',
          'created_at' => now(),
          'updated_at' => now(),
          'modalidade_id' => 1,
        ],
        [
          'nome' => 'Produto 5',
          'campus_id' => 1,
          'ano' => 2024,
          'colocacao' => 5,
          'status_id' => 1,
          'obs' => 'Sem observações',
          'url_imagem' => 'caminho_para_imagem5.jpg',
          'created_at' => now(),
          'updated_at' => now(),
          'modalidade_id' => 1,
        ],
        [
          'nome' => 'Produto 6',
          'campus_id' => 1,
          'ano' => 2024,
          'colocacao' => 6,
          'status_id' => 1,
          'obs' => 'Sem observações',
          'url_imagem' => 'caminho_para_imagem6.jpg',
          'created_at' => now(),
          'updated_at' => now(),
          'modalidade_id' => 1,
        ],
      ]);
    }
}
