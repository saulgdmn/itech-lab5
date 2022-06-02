<?php
    include('bd.php');
    echo "<head><link href=\"style.css\" type=\"text/css\" rel=\"stylesheet\"></head>";

    function build_table($array){
        $html = '<table>';
        $html .= '<tr>';
        foreach($array[0] as $key=>$value){
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
            }
        $html .= '</tr>';
    
        foreach( $array as $key=>$value){
            $html .= '<tr>';
            foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
        }
        
        $html .= '</table>';
        return $html;
    }
    


    switch ($_POST['type']) {
        case "vendor":
            $vendor = $_POST['vendor'];
            $res = $dbh->query("SELECT items.name name, vendors.name vendor, category.name category, items.price price, items.quantity quantity, items.quality quality FROM items
                JOIN vendors ON items.fid_vendor = vendors.id_vendor
                JOIN category ON items.fid_category = category.id_category
                WHERE vendors.name = '$vendor';")->fetchAll(PDO::FETCH_ASSOC);
            echo build_table($res);
            break;
        case "category":
            $category = $_POST['category'];
            $stm = $dbh->prepare("SELECT items.name name, vendors.name vendor, category.name category, items.price price, items.quantity quantity, items.quality quality FROM items
                JOIN vendors ON items.fid_vendor = vendors.id_vendor
                JOIN category ON items.fid_category = category.id_category
                WHERE category.name = ?;");
            $stm->bindParam(1, $category, PDO::PARAM_STR);
            $stm->execute();
            $res = $stm->fetchAll(PDO::FETCH_ASSOC);
            echo build_table($res);
            break;
        case "price":
            $price_low = $_POST['price_low'];
            $price_high = $_POST['price_high'];
            $stm = $dbh->prepare("SELECT items.name name, vendors.name vendor, category.name category, items.price price, items.quantity quantity, items.quality quality FROM items
                JOIN vendors ON items.fid_vendor = vendors.id_vendor
                JOIN category ON items.fid_category = category.id_category
                WHERE items.price BETWEEN ? AND ?;");
            $stm->execute(array($price_low, $price_high));
            $res = $stm->fetchAll(PDO::FETCH_ASSOC);
            echo build_table($res);
            break;
    }

    
?>