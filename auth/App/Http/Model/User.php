<?php

namespace App\Http\Model;

use BMVC\Core\ModelTree;

final class User extends ModelTree
{

  /**
   * @var string
   */
  protected $tableName = 'users';

  /**
   * @param string|null $par
   * @param int|null $uid
   * @return false|mixed
   */
  public function _get(string $par = null, int $uid = null)
  {
    if ($uid) {
      $sql = $this->wget(['id' => $uid, 'status' => 1]);
    } elseif (@$_SESSION[md5('user_id')]) {
      $sql = $this->wget(['id' => $_SESSION[md5('user_id')], 'status' => 1]);
    } else {
      $sql = $this->wget(['status' => 1]);
    }

    return $sql ? ($par ? $sql[$par] : $sql) : false;
  }

  /**
   * @return array
   */
  public function getUsers(): array
  {
    return $this->DB()
      ->from($this->tableName)
      ->select("id, username, email, name, role, status, time, edit_time")
      ->all();
  }
}