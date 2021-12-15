<?php

/**
 * Define auth interface.
 *
 * @return void
 * @return string
 */

interface IAuth
{
    public function _doRegister($name, $email, $phone_number, $address, $password): void;
    public function _doLogin($email, $password): void;
}
