<?php

namespace LaraCore\Database\Seeders;

use LaraCore\Database\Factories\QuizFactory;
use LaraCore\Framework\Console\Log;

class QuizSeeder
{
  public function run()
  {
    // call the QuizFactory to create a quiz
    QuizFactory::new()->create();
  }
}