<?php
include_once 'confDB.php';

class ModelBase {

    function getCon()
    {
        $con = getConfDB();
        return $con;
    }

}
