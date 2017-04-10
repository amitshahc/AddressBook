<?php

namespace NS_AddressBook;

/**
 * Description of group
 *
 * @author Amit
 */
class Group {

    use Utils;

    protected $id = null;
    private $name, $description;
    private $members = [];

    function __construct($id = null) {

        if (is_null($id)) {
            $this->name = NULL;
            $this->description = NULL;
        } else {
            //var_dump($_SESSION['group']);
            $obj = $this->getStoredData($id, $_SESSION['group']);

            if ($obj !== FALSE) {
                $this->id = $id;
                $this->name = $obj->name;
                $this->description = $obj->description;
                $this->members = $obj->members;
                //print_r($this);
            } else {
                throw new \Exception("No data found with id = " . $id);
            }
        }
    }

    public function setData(array $data) {

        foreach ($data as $key => $val) {
            $this->_validate($key, $val);
            $this->{$key} = addslashes(trim($val));
        }
    }

    public function getData($key) {

        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $arrData[$k] = $this->{$v};
            }

            return $arrData;
        }

        return $this->{$key};
    }

    public function addMembers($member) {
        if (is_array($member)) {
            foreach ($member as $mid) {
                if (!in_array($mid, $this->members)) {
                    array_push($this->members, $mid);
                }
            }
        } else {
            if (!in_array($member, $this->members)) {
                array_push($this->members, $member);
            }
        }
    }

    public function getMembers() {
        return $this->members;
    }

    protected function _validate($key, $val) {
        //Validation as per requirement
        //throw new \Exception("Invalid {$key} value");
        return;
    }

}
