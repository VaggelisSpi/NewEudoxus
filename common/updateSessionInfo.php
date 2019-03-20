<?php

    session_start();
    if (isset($_REQUEST['number'])) {
        $num = $_REQUEST["number"];
        $_SESSION['numberOfSubjects'] = $num;

        for ($i=0; $i < $num; $i++) {
            $varName = "q_".$i;
            if (isset($_REQUEST[$varName])) {
                $var = $_REQUEST[$varName];
                $_SESSION[$varName] = $var;
            }
        }

        echo 1;
    }
    else{
        echo 0;
    }


?>
