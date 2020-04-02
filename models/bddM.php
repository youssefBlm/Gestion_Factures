<?php

require_once CLASSES . DS . 'db.php';

class BddModel
{

    public function construct()
    {
    }

    public function creatBdd($filesql)
    {
        $query = file_get_contents($filesql);
    $array = explode(";\n", $query);
    $b = true;
    for ($i=0; $i < count($array) ; $i++) {
        $str = $array[$i];
        if ($str != '') {
            echo $str;
            /* $str .= ';';
             $b &= mysql_query($str);  */
        }  
    }
     
    return $b;
    }
    
}
