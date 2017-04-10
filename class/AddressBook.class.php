<?php

namespace NS_AddressBook;

/**
 * Description of AddressBook
 *
 * @author Amit.Shah
 */
class AddressBook {

    //use Utils;

    public function __construct() {
        //echo "hello";
        //$p = new Person();
    }

    protected function getPerson($id = NULL) {

        //$id = (is_null($id)) ? (count($_SESSION['person']) + 1) : $id;
        return new Person($id);
    }

    public function addPerson(array $arrData) {
        //var_dump($p);

        $nextId = count($_SESSION['person']) + 1;
        $arrData['id'] = $nextId;

        $person = $this->getPerson();

        $person->setData($arrData);

        $_SESSION['person'][$nextId] = $person;

        //array_push($_SESSION['person'],(array) $person);
        //return $person->getData(['id','first_name']);

        return $person->getData('id');
    }

    public function getGroup($id = NULL) {

        //$id = (is_null($id)) ? (count($_SESSION['group']) + 1) : $id;

        return new Group($id);
    }

    public function addGroup(array $arrData) {

        $nextId = count($_SESSION['group']) + 1;
        $arrData['id'] = $nextId;

        $group = $this->getGroup();

        $group->setData($arrData);

        $_SESSION['group'][$nextId] = $group;
        //array_push($_SESSION['group'],(array) $group);

        return $group->getData('id');
    }

    public function addGroupMember($gid, $arrPersonId) {
        //echo "get gid=".$gid;
        $group = $this->getGroup($gid);

        $group->addMembers($arrPersonId);

        $_SESSION['group'][$gid] = $group;
    }

    public function getGroupMembers($gid) {
        $group = $this->getGroup($gid);

        return $group->getMembers();
    }

}
