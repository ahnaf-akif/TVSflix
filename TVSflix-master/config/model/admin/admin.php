<?php
    require_once("../../../lib/database/db_query.php");
    function isAdmin($username){
        return AdminValidation($username);
    }
    function Language(){
        return LanguageAll();
    }

    function Actor(){
        return TVS_Actor();
    }
    

    function Genere(){
        return GenereInfo();
    }

    function CreateTVS($arr){
        return AddTVS($arr);
    }

    function CreateSeason($arr){
        return AddSeason($arr);
    }

/*function loadAllUser(){
    return getAllUser();
}*/
?>