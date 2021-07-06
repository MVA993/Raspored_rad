<?php
    include "includes/connection.php";

    if(!empty($opcija)){
        $id     =get_id($opcija);
    }elseif (!empty($ime['id'])){
        $id     =$ime['id'];
        $opcija =$id;
    }

    if (!empty($id)){
        $sql    ="SELECT *
                  FROM raspored
                  WHERE id_lice='$id'";
        
        if (empty($_POST["date_from"]) && empty($_POST["date_to"])){
            $sql        .=" AND datum >= DATE_FORMAT(now(),'%y-%m-%d')";
            $sql        .=" AND datum <= DATE_FORMAT(DATE_ADD(now(), INTERVAL 30 DAY),'%y-%m-%d')";
        }

        if (!empty($_POST["date_from"])){
            $date_from  =mysql_date($_POST["date_from"]);
            $sql        .=" AND datum >= '$date_from'";
        }

        if (!empty($_POST["date_to"])){
            $date_to    =mysql_date($_POST["date_to"]);
            $sql        .=" AND datum <= '$date_to'";
        }

        /*echo            $sql;*/ 

        $result         = mysqli_query($con, $sql);
        $resultCheck    = mysqli_num_rows($result);

        /*echo            $resultCheck;*/
    

        if ($resultCheck > 0) {
            while ($s_row = mysqli_fetch_assoc($result)){            
                if ($page === "schedule"){
                    table_print($s_row, $con, $box, $opcija);
                }elseif($page === "task_status"){
                    task_status_list($s_row,$con);
            }
        }
    }
}