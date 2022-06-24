<?php

namespace MySQL;

use PDO;
class DMUser
{
    private $id;
    private $login;
    private $pass;
    private $l;

    public function __construct()
    {
        $this->l = new PDO('mysql:host=localhost;dbname=SIT', 'root', '1201');
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

}