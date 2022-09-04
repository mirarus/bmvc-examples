<?php

namespace App\Http\Controller\Admin;

use Exception;
use BMVC\Libs\{View, Hash, Request, Response, Validate};
use App\Http\Model\User as _User;

class User
{

  /**
   * @return void
   * @throws Exception
   */
  public function index()
  {
    View::load("user/index", [
      'theme' => 'admin',
      'title' => "Users",
      'data' => (new _User)->getUsers()
    ], true);
  }

  /**
   * @return void
   * @throws Exception
   */
  public function add()
  {
    View::load("user/add", [
      'theme' => 'admin',
      'title' => "User Create"
    ], true);
  }

  /**
   * @param int $id
   * @return void
   * @throws Exception
   */
  public function edit(int $id)
  {
    $_get = (new _User)->get('id', $id);
    if (!$_get) return getErrors(404);

    View::load("user/edit", [
      'theme' => 'admin',
      'title' => sprintf("User #%s Edit", $_get['id']),
      'data' => $_get
    ], true);
  }

  /**
   * @return void
   * @throws Exception
   */
  public function _post_add(): void
  {
    $status = false;
    $result = null;

    $name = Request::post('name');
    $username = Request::post('username');
    $email = Request::post('email');
    $password = Request::post('password');
    $_role = Request::post('role') ? 'admin' : 'user';
    $_status = Request::post('status') ? 1 : 2;

    if (Validate::check($name) && Validate::check($email) && Validate::check($password) && Validate::check($_role) && Validate::check($_status)) {
      if (Validate::email($email)) {

        if (!(new _User)->get('username', $username)) {
          if (!(new _User)->get('email', $email)) {

            $_add = (new _User)->add([
              'name' => $name,
              'username' => $username,
              'email' => $email,
              'password' => Hash::make($password),
              'role' => $_role,
              'status' => ($_status == 1 ? 1 : 0)
            ]);
            if ($_add != null) {

              $_get = (new _User)->get('username', $username);
              if ($_get != null) {

                $status = true;
                $result = "Operation success";
              } else {
                $result = 'Operation failed';
              }
            } else {
              $result = 'Operation failed';
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
  public function _post_edit(): void
  {
    $status = false;
    $result = null;
    $e_img = null;

    $id = Request::post('id');
    $name = Request::post('name');
    $email = Request::post('email');
    $password = Request::post('password');
    $_role = Request::post('role') ? 'admin' : 'user';
    $_status = Request::post('status') ? 1 : 2;

    if (Validate::check($id) && Validate::integer($id) && Validate::check($name) && Validate::check($email) && Validate::check($_role) && Validate::check($_status)) {

      if ((new _User)->get('id', $id)) {
        if (Validate::email($email)) {
          if (!(new _User)->get('email', $email) || ((new _User)->get('id', $id)['email'] == $email)) {

            $_edit = (new _User)->edit('id', $id, (Validate::check($password) ? [
              'name' => $name,
              'password' => Hash::make($password),
              'role' => $_role,
              'status' => ($_status == 1 ? 1 : 0)
            ] : [
              'name' => $name,
              'role' => $_role,
              'status' => ($_status == 1 ? 1 : 0)
            ]));

            if ($_edit || $e_img) {
              $status = true;
              $result = 'Operation success';
            } else {
              $result = 'Operation failed';
            }
          } else {
            $result = 'Email address is already in use';
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

  /**
   * @return void
   */
  public function _post_get(): void
  {
    $status = false;
    $result = null;
    $lang = [];

    $id = Request::post('id');

    if (Validate::check($id)) {

      if ($_get = (new _User)->get('id', $id)) {
        unset($_get['password']);
        $status = true;
        $result = $_get['id'];

        $lang = [
          'cancel' => 'User Deletion has been cancelled',
          'confirm' => sprintf("Delete User account %s ?", ($_get['id'] . ':' . $_get['username']))
        ];
      }
    }
    echo Response::_json(['status' => $status, 'message' => $result, 'lang' => $lang]);
  }

  /**
   * @return void
   */
  public function _post_delete(): void
  {
    $status = false;
    $result = null;

    $id = Request::post('id');

    if (Validate::check($id)) {

      if ((new _User)->delete('id', $id)) {
        $status = true;
        $result = 'Operation success';
      } else {
        $result = 'Operation failed';
      }
    } else {
      $result = "Fill in the required fields";
    }
    echo Response::json($result, $status);
  }
}