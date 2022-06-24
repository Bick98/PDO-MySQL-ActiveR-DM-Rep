<?php

namespace MySQL;
use MySQL\DM;


class Rep
{
    private DM $DM;
    private $users = array();

    public function __construct()
    {
        $this->DM = new DM();
        $this->users = $this->DM->MDGetAllFromTable();
    }

    public function getAll()
    {

        echo "<p>------------------------------</p>";
        $this->DM->MDGetAll($this->users);
        echo "<p>------------------------------</p>";

    }

    public function getById($id)
    {

        echo "<p>------------------------------</p>";
        $this->DM->MDGetByID($id,$this->users);

        echo "<p>------------------------------</p>";
    }

    public function getByLogin($log)
    {

        echo "<p>------------------------------</p>";
        $this->DM->MDGetByLogin($log,$this->users);

        echo "<p>------------------------------</p>";
    }
    public function Add($log,$pas)
    {
        $this->DM->MDAdd($log,$pas);
        $this->users = $this->DM->MDGetAllFromTable();
    }
    public function Change($id,$newpas)
    {
        $this->DM->MDChange($id,$newpas);
        $this->users = $this->DM->MDGetAllFromTable();
    }
    public function Delete($id)
    {
        $this->DM->MDDelete($id);
        $this->users = $this->DM->MDGetAllFromTable();
    }

}