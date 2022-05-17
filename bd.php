<?php

    $dsn="mysql:host=localhost;port=3306;dbname=itech";
   
    $username = "root";
    $password="";
    $options=array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
   

    $dbh = new PDO($dsn, $username, $password);

    function gen_options($col, $table)
    {
        global $dbh;
        $sql = "SELECT DISTINCT $col FROM $table";
        $res = "";
        foreach($dbh->query($sql) as $row){
            $res=$res."<option value=".$row[0].">".$row[0]."</option>";
        }
        return $res;
    }
    
    function gen_price_range(){
        global $dbh;
        $sql = "SELECT MIN(price), MAX(price) FROM items;";
        $res = $dbh->query($sql)->fetch();
        return "<input type=\"number\" value=".$res[0]." name=\"price_low\" id=\"price_low\">".
        "<input type=\"number\" value=".$res[1]." name=\"price_high\" id=\"price_high\">";
    }

    
    /*
    function gen_price_range(){
        global $dbh;
        $sql = "SELECT MIN(price), MAX(price) FROM items;";
        $res = $dbh->query($sql)->fetch();
        return "<input type=\"range\" min=".$res[0]." max=".$res[0]." step=\"100\" value=\"1\" id=\"price_low\" name=\"price_low\"/>".
        "<input type=\"range\" min=".$res[0]." max=".$res[0]." step=\"100\" value=\"1\" id=\"price_high\" name=\"price_high\"/>";
    }

    */

    //echo gen_options('name', 'vendors');

    /*
    
    foreach($dbh->query("SELECT items.name, vendors.name FROM items
        JOIN vendors ON items.fid_vendor = vendors.id_vendor
        JOIN category ON items.fid_category = category.id_category;") as $row){
        echo $row[0];
    }

    */
?>