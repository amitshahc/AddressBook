<?php

require_once ('../config.php');

use NS_AddressBook\AddressBook as AddressBook;

try {
    $objAdb = new AddressBook();

    //Sample array data
    $arrG1 = array(
        'name' => "Group 1 name",
        'description' => "G 1 Desc"
    );

    $arrG2 = array(
        'name' => "Group 2 name",
        'description' => "G 1 Desc"
    );

    $gid1 = $objAdb->addGroup($arrG1);
    $gid2 = $objAdb->addGroup($arrG1);

    $objAdb->addGroupMember($gid1, ["1", "2", "5"]);
    $objAdb->addGroupMember($gid2, ["1", "3", "9"]);

    var_dump($_SESSION['group']);
} catch (Exception $e) {
    echo $e->getMessage();
}
