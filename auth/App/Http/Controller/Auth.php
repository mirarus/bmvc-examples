<?php

namespace App\Http\Controller;

use BMVC\Libs\{Request, Response, Validate, Session, Hash};
use App\Http\Model\User;
use Exception;

class Auth
{

  /**
   * @return void
   */
  public function logout(): void
  {
    Session::delete(md5('user_id'));
    Session::delete();
    redirect(url());
  }

  /**
   * @return void
   */
  public function _post_signin(): void
  {
    $status = false;
    $result = null;

    $un_email = Request::post('un_email');
    $password = Request::post('password');

    if (Validate::check($un_email) && Validate::check($password)) {

      if (Validate::email($un_email)) {
        $_get = (new User)->get('email', $un_email);
      } else {
        $_get = (new User)->get('username', $un_email);
      }

      if ($_get != null && $_get['status'] == 1) {

        if (Hash::check($password, $_get['password'])) {

          Session::set(md5('user_id'), $_get['id']);

          if (Session::get(md5('user_id'))) {
            $status = true;
            $result = "Operation success";
          } else {
            $result = "Operation failed";
          }
        } else {
          $result = "Invalid password";
        }
      } else {
        $result = "An account with this informations was not found";
      }
    } else {
      $result = "Fill in the required fields";
    }

    echo Response::json($result, $status);
  }

  /**
   * @return void
   * @throws Exception
   */
  public function _post_signup(): void
  {
    $status = false;
    $result = null;

    $username = Request::post('username');
    $email = Request::post('email');
    $password = Request::post('password');

    if (Validate::check($username) && Validate::check($email) && Validate::check($password)) {
      if (Validate::email($email)) {

        if (!(new User)->get('username', $username)) {
          if (!(new User)->get('email', $email)) {

            $_add = (new User)->add([
              'username' => $username,
              'email' => $email,
              'password' => Hash::make($password),
              'role' => 'user',
              'status' => 1,
            ]);
            if ($_add != null) {

              $_get = (new User)->get('email', $email);
              if ($_get != null) {

                Session::set(md5('user_id'), $_get['id']);

                if (Session::get(md5('user_id'))) {
                  $status = true;
                  $result = "Operation success";
                } else {
                  $result = "Operation failed";
                }
              } else {
                $result = "Operation failed";
              }
            } else {
              $result = "Operation failed";
            }
          } else {
            $result = 'Email address is already in use';
          }
        } else {
          $result = 'Username is already in use';
        }
      } else {
        $result = 'Email address is invalid';
      }
    } else {
      $result = "Fill in the required fields";
    }

    echo Response::json($result, $status);
  }

  /**
   * @return void
   * @throws Exception
   */
  public function _post_change(): void
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