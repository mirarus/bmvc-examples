<?php

namespace App\Http\Controller;

use App\Http\Model\User;
use Exception;
use BMVC\Libs\{View, Hash, Request, Response, Validate};

class Account
{

  /**
   * @return void
   * @throws Exception
   */
  public function index()
  {
    View::load("account", [
      'title' => sprintf("Account @%s", auth_get('username')),
    ], true);
  }

  /**
   * @return void
   * @throws Exception
   */
  public function _post_edit(): void
  {
    $status = false;
    $result = null;

    $name = Request::post('name');
    $email = Request::post('email');
    $password = Request::post('password');
    $id = auth_get('id');

    if (Validate::integer($id) && Validate::check($name) && Validate::check($email)) {

      if ((new User)->get('id', $id)) {

        if (Validate::email($email)) {

          $_edit = (new User)->edit('id', $id, (Validate::check($password) ? [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
          ] : [
            'name' => $name,
            'email' => $email
          ]));

          if ($_edit) {
            $status = true;
            $result = 'Operation success';
          } else {
            $result = 'Operation failed';
          }
        } else {
          $result = "Email address is invalid";
        }
      } else {
        $result = "User not found";
      }
    } else {
      $result = "Fill in the required fields";
    }
    echo Response::json($result, $status);
  }
}