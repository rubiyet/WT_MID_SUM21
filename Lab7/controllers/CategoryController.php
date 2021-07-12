<?php
    include 'models/db_config.php';
    $err_db = "";
    if(isset($_POST["add_category"])){
        $rs = insertCategory($_POST["name"]);
        if($rs === true){
            header("Location: allcategories.php"); 
        }
        $err_db = $rs;
    }
    function insertCategory($name){
        $query = "insert into categories values(Null,'$name')";
        return execute($query);
    }
    function getAllCategories(){
        $query = "select * from categories";
        $rs = get($query);
        return $rs;
    }
    function getCategory($id){
        $query = "select * from categories where id = $id";
        $rs = get($query);
        return $rs[0];
    }
?>