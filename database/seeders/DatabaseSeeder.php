<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Trofeu\Trofeu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      CampusSeeder::class,
      ModalidadeSeeder::class,
      StatusTrofeuSeeder::class,
      TrofeuSeeder::class,
    ]);
  }
}
