<?php

use App\Libs\Auth;

/**
 * @return array|null
 */
function auth_user(): ?array
{
  return Auth::user(...func_get_args());
}

/**
 * @return array|mixed|null
 */
function auth_get()
{
  return Auth::get(...func_get_args());
}

/**
 * @return bool
 */
function auth_check(): bool
{
  return Auth::check(...func_get_args());
}

/**
 * @return bool
 */
function auth_role(): bool
{
  return Auth::role(...func_get_args());
}

/**
 * @param string $role
 * @param int|null $uid
 * @return void
 */
function auth_err(string $role = 'user', int $uid = null): void
{
  if (!auth_role($uid, $role)) getErrors(404);
}

/**
 * @return bool
 */
function is_user(): bool
{
  return auth_role(func_get_arg(0), 'user');
}

/**
 * @return bool
 */
function is_admin(): bool
{
  return auth_role(func_get_arg(0), 'admin');
}

/**
 * @return array|null
 */
function user_data(): ?array
{
  return auth_user(...func_get_args());
}