<?php

namespace App\Http\Middleware;

class Auth
{

  /**
   * @var string[]
   */
  private $whitelist = [
    'auth/signin',
    'auth/signup'
  ];

  /**
   * @var string[]
   */
  private $user_whitelist = [
    'logout',
    'account'
  ];

  /**
   * @var string[]
   */
  private $admin_whitelist = [
    'logout',
    'account',
    'admin'
  ];

  /**
   * @return void
   */
  public function handle(): void
  {
    if (in_array(page(), $this->whitelist)) {
      if (auth_check()) redirect(url());
    } else {
      if (!auth_check()) getErrors(404);

      if (is_user() && !in_array(array_shift(@explode('/', page())), $this->user_whitelist)) getErrors(404);
      if (is_admin() && !in_array(array_shift(@explode('/', page())), $this->admin_whitelist)) getErrors(404);
    }
  }
}