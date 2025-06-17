<?php
    function redirectWithoutMessage($destination){
        header("location:".$destination);
    }
    function redirect($destination,$message){
        echo "<script>alert('".$message."'); window.location.href='$destination';</script>";
    }
    function onlyAlertMessage($message){
        echo "<script>alert('".$message."');</script>";
    }
