<?php

namespace NS_AddressBook;

/**
 * Description of Person
 *
 * @author Amit.Shah
 */
class Person {

    use Utils;

    protected $id = NULL;
    private $first_name, $last_name, $address1, $address2, $email1, $email2, $phone1, $phone2;

    function __construct($id = null) {

        if (is_null($id)) {
            $this->id = $id;
            $this->first_name = NULL;
            $this->last_name = NULL;
            $this->address1 = NULL;
            $this->address2 = NULL;
            $this->email1 = NULL;
            $this->email2 = NULL;
            $this->phone1 = NULL;
            $this->phone2 = NULL;
        } else {
            $arrStoredPerson = &$_SESSION['person'];
            
            $key = $this->find_in_array($arrStoredPerson, 'id', $id);
            

            print_r($arrStoredPerson[$key]);
        }
    }

    public function setData(array $data) {
        foreach ($data as $key => $val) {
            $this->_validate($key, $val);
            $this->{$key} = addslashes(trim($val));
        }
    }

    protected function _validate($key, $val) {
        //Validation as per requirement
        //throw new \Exception("Invalid {$key} value");
        return;
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

    public function __set($name, $value) {
        throw new \Exception("{$name}: key name do not exists");
        //return false;
    }

}
