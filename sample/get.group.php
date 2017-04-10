<?php

require_once ('../config.php');

use NS_AddressBook\AddressBook as AddressBook;


try
{
    //Add group to add new entry 
    include_once('add.group.php');
    
    $objAdb = new AddressBook();

    $gid = 1;
    
    $arrMembers = $objAdb->getGroupMembers($gid);

    var_dump($arrMembers);
}
catch (Exception $e)
{
    echo $e->getMessage();
}