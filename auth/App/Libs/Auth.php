<?php

namespace App\Libs;

use App\Http\Model\User;
use BMVC\Libs\{Session, Validate};

class Auth
{

  /**
   * @param int|null $uid
   * @param string|null $role
   * @return array|null
   */
  public static function user(int $uid = null, string $role = null): ?array
  {
    $sq = [];
    if ($_SESSION[md5('user_id')]) {
      $sq = (new User)->wget(['id' => $_SESSION[md5('user_id')], 'status' => 1]);
    } elseif ($uid) {
      $sq = (new User)->wget(['id' => $uid, 'status' => 1]);
    }

    if ($role == null) {
      return $sq ?: null;
    } elseif ($sq['role'] == $role) {
      return $sq ?: null;
    }

    return null;
  }

  /**
   * @param $index
   * @param string|null $role
   * @param int|null $uid
   * @return array|mixed|null
   */
  public static function get($index = null, string $role = null, int $uid = null)
  {
    if (self::check()) {
      return $index ? self::user($uid, $role)[$index] : self::user($uid, $role);
    }
    return false;
  }

  /**
   * @param int|null $uid
   * @return bool
   */
  public static function check(int $uid = null): bool
  {
    $uid = $uid ?: Session::get(md5('user_id'));

    if (Validate::check($uid)) {
      if (self::user($uid)) return true;
      Session::destroy();
    }
    return false;
  }

  /**
   * @param int|null $uid
   * @param string $role
   * @return bool
   */
  public static function role(int $uid = null, string $role = 'user'): bool
  {
    return (self::check($uid) && self::user($uid, $role));
  }
}