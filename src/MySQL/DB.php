<?php

namespace MySQL;

use PDO;

class DB
{
    private $l;

    public function __construct()
    {
        $this->l = new PDO('mysql:host=localhost;dbname=SIT', 'root', '1201');
    }


    public function execute($sql)
    {
        $sth = $this->l->prepare($sql);
        return $sth->execute();
    }


}