<?php

namespace LaraCore\Database\Seeders;

use LaraCore\Framework\Seeders\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call(QuizSeeder::class);
    // $this->call(UserSeeder::class);
    // $this->call(SubmissionSeeder::class);
  }
}