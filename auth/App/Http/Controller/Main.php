<?php

namespace App\Http\Controller;

use BMVC\Libs\View;
use Exception;

class Main
{

  /**
   * @return void
   * @throws Exception
   */
  public function index()
  {
    View::load("index", [
      'title' => auth_check() ? sprintf("Account @%s", auth_get('username')) : 'Dashboard',
    ], true);
  }
}