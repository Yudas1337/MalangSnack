<?php

/**
 * Define auth interface.
 *
 * @return void
 * @return string
 */

interface IAuth
{
    public function _doRegister(): void;
    public function _doLogin($email, $password): void;
}
