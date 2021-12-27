<?php
    // Connecting to the database
    function pr($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    function prx($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        die();
    }

    // Utility function to perform select queries.
    function get_products($con, $category = "", $limit=""){
        $sql = "SELECT * FROM product WHERE status=1";

        if ($category != '') {
            $sql .= " and category_id='$category'";
        }
        $sql .= " ORDER BY id DESC";
        if($limit != ''){
            $sql .= " LIMIT $limit;";
        }
        
        $res = mysqli_query($con, $sql);
        $data = array();
        while($row = mysqli_fetch_assoc($res)){
            $data[] = $row;
        }
        return $data;
    }

function get_product_details($con, $id)
{
    $sql = "SELECT * FROM product WHERE id='$id'";

    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
    return $data;
}
?>