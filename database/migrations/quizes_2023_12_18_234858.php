<?php

namespace LaraCore\Database\Migrations;

use LaraCore\Framework\Db\Migrations\Blueprint;
use LaraCore\Framework\Db\Migrations\Migration;

class quizes_2023_12_18_234858 extends Migration
{
  public function up()
  {
    $this->create('quizzes', function (Blueprint $table) {
      $table->id();
      $table->text('questions');
      $table->timestamps();
    });
  }

  public function down()
  {
    $this->drop('quizzes');
  }
}
