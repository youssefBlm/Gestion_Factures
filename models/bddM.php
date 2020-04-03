<?php

require_once CLASSES . DS . 'db.php';

class BddModel
{

    public function construct()
    {
    }

    public function creatBdd($filesql)
    {
        echo $filesql."<br>";
        echo $_SERVER["SCRIPT_NAME"];
        $query = file_get_contents('fichier.sql');
        
    $array = explode(";\n", $query);
    var_dump( $array);
   /* $b = true;
    for ($i=0; $i < count($array) ; $i++) {
        $str = $array[$i];
        if ($str != '') {
            echo $str;
             $str .= ';';
             $b &= mysql_query($str);  
        }  
    }
     
    return $b;*/
    }
    
}
