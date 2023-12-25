<?php

namespace LaraCore\App\Models;

use LaraCore\Framework\Db\DataModel;

class Submission extends DataModel
{
  protected $table = 'submissions';
  protected $fillable = [
    'user_id',
    'quiz_id',
    'submission_info',
    'submission_ans',
    'right_ans',
    // 'pick_ans',
  ];

  public function tableName(): string
  {
    return $this->table;
  }

  public function attributes(): array
  {
    return $this->fillable;
  }

  // public function save()
  // {
  //   return parent::save();
  // }
}