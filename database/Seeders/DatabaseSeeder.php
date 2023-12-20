<?php

namespace LaraCore\Database\Seeders;

use LaraCore\Framework\Seeders\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->callMany([
      QuizSeeder::class,
      // UserSeeder::class,
      // SubmissionSeeder::class
    ]);
  }
}