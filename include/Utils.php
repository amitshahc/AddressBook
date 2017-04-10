<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NS_AddressBook;

/**
 *
 * @author Amit
 */
trait Utils
{

    function find_in_array(array &$arr, $key_name, $needle)
    {

        $key = FALSE;
        //\var_dump($arr);
        \array_walk($arr, function ($v, $k) use(&$key, $needle)
        {//echo $key_name;
            if (\in_array($needle, $v['id']))
            {
                $key = $k;
            }
        });

        return $key;
    }

    public
            function getStoredData($key, &$arr)
    {
        if (array_key_exists($key, $arr))
        {
            return $arr[$key];
        }
        return FALSE;
    }

}
