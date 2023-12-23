<?php

namespace LaraCore\Database\Factories;

use LaraCore\App\Models\Quize;
use LaraCore\Framework\Factories\Factory;

class QuizFactory extends Factory
{
  public function definition()
  {
    $quizJson = file_get_contents(base_path('quiz.json'));
    $quiz = json_decode($quizJson, true);
    return [
      'questions' => json_encode($quiz[9])
    ];
  }

  public function create()
  {
    $data = $this->definition();
    $this->make(Quize::class, $data);
  }
  public static function new()
  {
    return new static;
  }
}
