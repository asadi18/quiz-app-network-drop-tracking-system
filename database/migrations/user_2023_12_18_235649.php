<?php

namespace LaraCore\Database\Migrations;

use LaraCore\Framework\Db\Migrations\Blueprint;
use LaraCore\Framework\Db\Migrations\Migration;

class user_2023_12_18_235649 extends Migration
{
  public function up()
  {
    $this->create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('email')->nullable();
      $table->string('studentId');
      $table->timestamps();
    });
  }

  public function down()
  {
    $this->drop('users');
  }
}