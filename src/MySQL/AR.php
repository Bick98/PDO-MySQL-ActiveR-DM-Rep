<?php

namespace MySQL;

use PDO;

class AR
{
    private $id;
    private $date;
    private $user;
    private $msg;
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
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function getMsg()
    {
        return $this->msg;
    }
    public function setMsg($msg)
    {
        $this->msg=$msg;
    }
    public function ARGetAll()
    {
        $command = "select * from messages";
        $sql = $this->l->prepare($command);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function ARGetByID($id) {
        $command = "select * from messages where id = $id";
        $stmt = $this->l->prepare($command);
        $stmt->execute();
        $result = $stmt->fetchAll()[0];
        $NewRecord = null;

        if (isset($result)) {
            $NewRecord = new AR();
            $NewRecord->setId($result['id']);
            $NewRecord->setDate($result['date']);
            $NewRecord->setUser($result['user']);
            $NewRecord->setmsg($result['msg']);
        }
        return $NewRecord;
    }

    public function ARGetByName($name)
    {
        $command = "select * from messages where user like '%$name%'";
        $stmt = $this->l->prepare($command);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function ARAdd() {
        $date = $this->date;
        $user = $this->user;
        $msg = $this->msg;

        if ($date != '' && $user != '' &&  $msg != '')
        {
            $command = "insert into messages(date,user,msg) values('$date','$user', '$msg')";
            $stmt = $this->l->prepare($command);
            $stmt->execute();

        }
    }

    public function ARChange() {
        $id = $this->id;
        $msg = $this->msg;
        $command = "update messages set  msg = '$msg' where id = $id";
        $stmt = $this->l->prepare($command);
        $stmt->execute();
    }

    public function ARDelete() {
        $id = $this->id;
        $command = "delete from messages where id = $id";
        $stmt = $this->l->prepare($command);
        $stmt->execute();

    }

}