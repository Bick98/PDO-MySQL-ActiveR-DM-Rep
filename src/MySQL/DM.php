<?php

namespace MySQL;

use MySQL\DMUser;
use PDO;

class DM
{
    private $l;

    public function __construct()
    {
        $this->l = new PDO('mysql:host=localhost;dbname=SIT', 'root', '1201');
    }
    public function Command($command)
    {
        $sql = $this->l->prepare($command);
        $sql->execute();
    }

    public function MDGetAllFromTable(): array
    {
        $command = "select * from logPas";
        $sql = $this->l->prepare($command);
        $sql->execute();
        $result = $sql->fetchAll();
        $users = array();
        if (isset($result)) {
            foreach ($result as $row)
            {
                $NewRecord = new DMUser();
                $NewRecord->setId($row['id']);
                $NewRecord->setLogin($row['login']);
                $NewRecord->setPass($row['pass']);
                array_push($users, $NewRecord);
            }

        }
        return $users;
    }
    public function MDGetAll($users)
    {

        foreach ($users as $record)
        {
            $id = $record->getId();
            $log = $record->getLogin();
            $pas = $record->getPass();
            echo "<p>" . $id . ' ' .$log . ' ' . $pas . "</p>" ;
        }
    }

    public function MDGetByID($id,$users)
    {
        $result = '';
        foreach ($users as $record)
        {
            if ($record->getId() === $id)
            {
                $result = $record->getId() .' '. $record->getLogin();
            }
        }
        if ($result === '')
        {
            echo "Записи с таким id нет";
        }
        else
        {
            echo $result;
        }
    }

    public function MDGetByLogin($log,$users)
    {
        $result ='<p>';
        foreach ($users as $record)
        {
            if ($record->getLogin() === $log)
            {
                $result = $result . ' ' . $record->getId() . " " . $record->getLogin() ."</p>" ;
            }
        }
        echo $result;
    }

    public function MDAdd($log,$pas)
    {
        $this->Command("insert into logPas(login,pass) values ('$log','$pas')");
    }

    public function MDChange($id,$newpas) {
        $this->Command("update logPas set  pass = '$newpas' where id = $id");
    }

    public function MDDelete($id) {
        $this->Command("delete from logPas where id = $id");

    }


}