<?php

namespace LaraCore\Database\Factories;

class UserFactory
{
  public static function make()
  {
    $quizJson = file_get_contents(base_path('database/factories/quiz.json'));
    $quiz = json_decode($quizJson, true);
    return $quiz;
  }
}