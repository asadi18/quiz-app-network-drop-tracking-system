<?php

namespace LaraCore\Database\Migrations;

use LaraCore\Framework\Db\Migrations\Blueprint;
use LaraCore\Framework\Db\Migrations\Migration;

class submission_2023_12_18_235102 extends Migration
{
  public function up()
  {
    $this->create('submissions', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id')->nullable();
      $table->integer('quiz_id')->nullable();
      $table->text('submission_info');
      $table->text('submission_ans');
      $table->text('right_ans');
      $table->tinyInteger('pick_ans');
      $table->timestamps();
    });
  }

  public function down()
  {
    $this->drop('submissions');
  }
}