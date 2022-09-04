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
    View::load((auth_check() ? 'index' : 'auth'), [
      'title' => auth_check() ? 'Dashboard' : 'Auth',
    ], true);
  }
}