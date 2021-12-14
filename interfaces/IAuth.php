<?php

interface IAuth
{
    public function _doRegister(): void;
    public function _doLogin(): void;
}
