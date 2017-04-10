<?php

require_once ('../config.php');

use NS_AddressBook\AddressBook as AddressBook;

try {
    $objAdb = new AddressBook();

    //Sample array data
    $arrP1 = array(
        'first_name' => "Amit",
        'last_name' => "Shah",
        'address1' => "Some address line 1",
        'address2' => "Some address line 2",
        'email1' => "email@1.com",
        'email2' => "email@2.com",
        'phone1' => "0123456798",
        'phone2' => "+987-654-3211"
    );
    
    $arrP2 = array(
        'first_name' => "Pooja",
        'last_name' => "Sharma",
        'address1' => "Some address line 1",
        'address2' => "Some address line 2",
        'email1' => "email@1.com",
        'email2' => "email@2.com",
        'phone1' => "0123456798",
        'phone2' => "+987-654-3211"
    );
    
    $pid1 = $objAdb->addPerson($arrP1);

    $pid2 = $objAdb->addPerson($arrP2);

    var_dump($_SESSION['person']);
    
} catch (Exception $e) {
    echo $e->getMessage();
}