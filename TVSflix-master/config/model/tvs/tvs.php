<?php
    include_once("../../../lib/database/db_execution.php");
    
    function ChecktvsID($id){
        $sql="SELECT * FROM tvsinfo WHERE ID=$id";
        return ExecuteQuery($sql);
    }

    function ChechGenre($id){
        $sql="SELECT * FROM genereinfo WHERE ID=$id";
        return ExecuteQuery($sql);
    }
    function GenreInfo($id){
        $sql="SELECT * FROM genereinfo WHERE ID=$id";
        return ExecuteQuery($sql);
    }
    function TVSfromGenre($id){
        $sql="SELECT * FROM generelist WHERE genereID=$id";
        return ExecuteQuery($sql);
    }
    function TVS_info($id){
        $sql="SELECT * FROM tvsinfo WHERE ID=$id";
        return ExecuteQuery($sql);
    }

    function CheckLan_TVS($id){
        $sql="SELECT * FROM language WHERE ID=$id";
        return ExecuteQuery($sql);
    }
    function TVS_LAN($id){
        $sql="SELECT * FROM languagelist WHERE lanID=$id";
        return ExecuteQuery($sql);
    }
?>