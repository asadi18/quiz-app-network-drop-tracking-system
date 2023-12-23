<?php

namespace LaraCore\App\Models;

use LaraCore\Framework\Db\DataModel;
use LaraCore\Framework\Session;

class Users extends DataModel
{
  protected $table = 'users';
  protected $fillable = ['studentId'];

  public function tableName(): string
  {
    return $this->table;
  }

  public function attributes(): array
  {
    return $this->fillable;
  }

  public function save()
  {
    return parent::save();
  }

  /**
   * login user
   */
  public function login()
  {
    $user = $this->findOne(['studentId' => $this->studentId]);
    if ($user) {
      $data = [
        'id' => $user->id,
        'studentId' => $user->studentId,
        'name' => $user->name,
      ];
      // dd($user->id);
      Session::set('user', $data);
      return true;
    } else {
      return false;
    }
  }
}