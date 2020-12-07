<?php
    
    require_once("../../../lib/database/db_query.php");
    function CreateUser($arr){
        return AddUser($arr);
    }

    function CheckData($arr){
        return LoginValidation($arr);
    }

    function CheckUsername($username){
        return GetUsername($username);
    }

    function GetData($username){
        return UserData($username);
    }

    function getUserByUsername($username)
    {
        UserByUsername($username);
    }

    function GetRecentCount($id){
        return CountRecent($id);
    }

    function GetCompleteCount($id){
        return CountComplete($id);
    }

    function GetUserWatchData($id,$table){
        return UserWatchData($id,$table);
    }

    function GetTVSInformation($id){
        return TVSinfo($id);
    }

    function GetTVSRate($id){
        return TVSRate($id);
    }

    function GetTVSLan($id){
        return TVSLanguageUser($id);
    }
    function GetTVSGenere($id){
        return TVSGenere($id);
    }

    function AllSeason($id){
        return AllSeasonData($id);
    }

    function NewTVS($type){
        return TVS($type);
    }
?>