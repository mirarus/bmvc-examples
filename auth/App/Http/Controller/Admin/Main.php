<?php

namespace App\Http\Controller\Admin;

use Exception;
use BMVC\Libs\View;

class Main
{

  /**
   * @return void
   * @throws Exception
   */
  public function index()
  {
    View::load("index", [
      'theme' => 'admin',
      'title' => "Home"
    ], true);
  }
}