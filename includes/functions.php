<?php

    function mysql_date ($date) {
        $date       = strtotime($date);
        $date       = date('Y-m-d',$date);
        return      $date;
    } /* Prebacuje datum iz stringa u SQL format */
    
    function rs_date ($date) {
        $date       = strtotime($date);
        $date       = date('d.m.Y',$date);
        return      $date;
    } /* Prebacuje datum iz stringa u d.m.Y format */

    function get_id($option) {
        $new        = $option;
        $arr        = explode(' ',trim($new));
        $id         = $arr[0];
        return      $id;
    } /* Izvlači prvu reč iz odabrane opcije u select listi */

    function get_user($con, $user){
        $sql        = "SELECT *
                       FROM zaposleni 
                       WHERE korisnicko_ime = '$user'";
        
        $result     = mysqli_query($con,$sql);
        $ime        = mysqli_fetch_assoc($result);
        
        if (empty($ime["id"])){
            echo    "ADMIN";
        }else{    
            $trenutni_korisnik = $ime["ime"]." ".$ime["prezime"];
            echo    $trenutni_korisnik;
        }
        
    } /* Izvlači ime i prezime prijavljenog korisnika iz baze */

    function get_user_id ($con, $user) {
        $sql        = "SELECT id
                       FROM zaposleni 
                       WHERE korisnicko_ime = '$user'";
        
        $result     = mysqli_query($con,$sql);
        $ime        = mysqli_fetch_assoc($result);
        
        if(!empty($ime["id"])){
            $user_id    = $ime["id"];
            return      $user_id; 
        }
    }/* Daje ID trenutno prijavljenog korisnika*/

    function upload_btn_show($con, $user){
        $sql        = "SELECT *
                       FROM prijava 
                       WHERE korisnicko_ime = '$user'";

        $result     = mysqli_query($con,$sql);
        $prijava    = mysqli_fetch_assoc($result);

        if ($prijava["status"] == 1){
            echo "
            <label for='file' class='upload_btn'><i class='fas fa-file-upload'></i> OTPREMI FAJL</label> 
            <input type='file' name='file' id='file'>
            <span id='uploaded_file'></span>
            ";
        }
    } /* Prikazuje dugme za otpremu fajlova ukoliko je status korisnika adekvatan */

    function dropdown_list($con) {
        $sql    	    = "SELECT * 
                           FROM zaposleni
                           ORDER BY ime";

        $result         = mysqli_query($con,$sql);
        $resultCheck    = mysqli_num_rows($result);

        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $num    = $row["id"];
                $ime    = $row["ime"]." ".$row["prezime"];
                echo    "<option class='select_btn' value='".$num." ".$ime."'>".$ime."</option>";
            }
        }
    } /* Lista zaposlenih iz baze podataka u select listu */

    function print_title($con, $option, $user){
        $sql            = "SELECT *
                           FROM zaposleni 
                           WHERE korisnicko_ime = '$user'";

        $result         = mysqli_query($con,$sql);
        $ime            = mysqli_fetch_assoc($result);
    
        if (!empty($ime['id'])){
            $test_name       = $ime['ime']. " ". $ime['prezime'];
            if (empty($option)){
                echo         $test_name;
            }elseif ($option!==$test_name){
                get_title($option, $con);
            }
        }elseif (!empty($option)){
            get_title($option, $con);
        }
    } /* Štampa ime trenutno odabranog zaposlenog kao naslov - funkcija nije u upotrebi */

    function get_title ($option, $con) {
        $id         = get_id($option);

        $sql        = "SELECT *
                       FROM zaposleni
                       WHERE id ='$id'";

        $result     = mysqli_query($con,$sql);
        $ime        = mysqli_fetch_assoc($result);

        echo        $ime['ime']. " ". $ime['prezime'];
    } /* Izvlači ime i prezime korisnika na osnovu id-a dobivenog iz select liste */ 

    function weekday($date){
        $day_num = date('w', $date);
        switch($day_num){
            case"0":
                $weekday = "Nedelja";
                break;
            case"1":
                $weekday = "Ponedeljak";
                break;
            case"2":
                $weekday = "Utorak";
                break;
            case"3":
                $weekday = "Sreda";
                break;
            case"4":
                $weekday = "Četvrtak";
                break;
            case"5":
                $weekday = "Petak";
                break;
            case"6":
                $weekday = "Subota";
                break;
        }
        return $weekday;
    } /* Štampa ime dana na osnovu datog datuma */

    function code_color($code){
        $ar              = explode(' ',trim($code));
        $class_word      = $ar[0];
        switch ($class_word){
            case"001":
                $table_class = "redovan_rad";
                break;
            case"010":
                $table_class = "godisnji_odmor";
                break;
            case"024":
                $table_class = "neradni_dan";
                break;
            case"012":
                $table_class = "drzavni_praznik_zarada";
                break;
            case"006";
                $table_class = "bolovanje_poslodavac_bolest";
                break;
        }
        return $table_class;
    } /* Boji red u tabeli na osnovu šifre promene */

    function today_date($date){
        date_default_timezone_set('Europe/Belgrade');
        $date_check     = date('d.m.Y');
        $date_table     = date('d.m.Y',$date);

        if ($date_table === $date_check){
            $date_today = ", today";
        } else {
            $date_today = "";
        }   

        return $date_today;
    } /* Proverava da li je datum u redu tabele današnji dan, ako jeste daje mu posebnu klasu */

    function table_print($row, $con, $user, $option){
        $date           = strtotime($row['datum']);
        $weekday        = weekday($date);
        $code           = $row['naziv_sifra_promena'];
        $table_class    = code_color($code);
        $date_today     = today_date($date);

        echo            "<div class='accordion'>
                        <table style='width: 100%;'>
                        <tr class='".$table_class."'>
                                <td class='accordion_cell".$date_today."' style='width: 20%;'>".date('d.m.Y',$date)."</td>
                                <td class='accordion_cell1".$date_today."' style='width: 20%;'>".$weekday."</td>
                                <td class='accordion_cell2".$date_today."' style='width: 30%;'>".$row['naziv_sifra_promena']."</td>
                                <td class='accordion_cell3".$date_today."' style='width: 30%;'>".$row['radno_vreme_od']." - ".$row['radno_vreme_do']."</td>
                        </tr>
                        </table>
                        </div>";

        todo_print($row, $con, $user, $option);
    } /* Štampa red iz MYSQL tabele u formatu HTML tabele unutar accordion dugmeta - optimizovano za tabelu rasporeda rada */

    function todo_print($row, $con, $user, $option){
        $id             = $row['id_lice'];
        $date           = $row['datum'];

        $sql            = "SELECT *
                           FROM obaveza
                           WHERE id_lice = '$id'";
            
        $result         = mysqli_query($con, $sql);
        $resultCheck    = mysqli_num_rows($result);
    
        echo "<div class='panel'>
             <table style='width:100;'>";

        $user_id        = get_user_id($con, $user);
        $option_id      = get_id($option);
    
        if ($resultCheck > 0){
            while ($t_row = mysqli_fetch_assoc($result)){
                $task_date      = $t_row['datum'];
                $status         = $t_row['status'];
                $task_id        = $t_row['id'];
                
                if($date == $task_date){
                        if($status == 0){
                            $_SESSION['page']   = "1";

                            if  ($user_id == $option_id){
                                $table_form     = "<form method='POST' action='includes/task_complete.php'>
                                                        <input type='hidden' name='hidden_btn' value=".$task_id.">
                                                            <button type='submit' class='date_show' name='action_btn' value='1'>
                                                                <i class='fas fa-check-square'></i> ZAVRŠENO
                                                            </button>
                                                  </form>";
                            }else{
                                $table_form     = " ";
                            }

                        echo    "<tr>
                                    <td style='width:40%;' >".$t_row['obaveza']."</td>
                                    <td style='width:20%;' >".$t_row['vreme_od']." - ".$t_row['vreme_do']."</td>
                                    <td style='width:40%;' >
                                        ".$table_form."
                                    </td>
                                </tr>";
                    }
                }
            }            
        }echo    "</table>
        </div>";
    } /* Štampa mini-tabelu koja prikazuje obaveze za dati datum unutar panela */

    function task_status_link ($con, $user, $page){
        $sql        = "SELECT status
                       FROM prijava 
                       WHERE korisnicko_ime = '$user'";

        $result     = mysqli_query($con,$sql);
        $prijava    = mysqli_fetch_assoc($result);
        
        if ($prijava["status"] == 1 || $prijava["status"] == 2){
            if ($page == "task_status"){
                $class      = "active";
            }else{
                $class      = "";
            }
            echo "
                <a href='task_status.php' class=".$class.">
                    OBAVEZE-LISTA
                </a>
            ";
        } 
    } /* Proverava da li prijavljeni korisnik ima dozvolu i ako ima prikazuje dugme za listu obaveza. */   

    function print_status ($status){
        switch($status){
          case"0": 
            $status     = "Nezavršeno";
            break;
          case"1";
            $status     = "Završeno";
            break;
          }
          return $status; 
    } /* Proverava i štampa status obaveze.*/

    function task_status_list($row, $con){
        $date           = strtotime($row['datum']);
        $weekday        = weekday($date);
        $id             = $row['id_lice'];
        $datecheck      = $row['datum'];

        echo            "<div class='accordion'>
                            <table style='width:100%;'>
                                <tr>
                                    <td style='width:30%;'>".date('d.m.Y',$date)."</td>
                                    <td style='width:30%;'>".$weekday."</td>
                                </tr>
                            </table>
                        </div>";
        
        $sql            = "SELECT *
                           FROM obaveza
                           WHERE id_lice = $id";

        $result         = mysqli_query($con, $sql);
        $resultCheck    = mysqli_num_rows($result);

        echo            "<div class='panel'>
                        <table style='width:100;'>";

        if($resultCheck > 0){
            while ($t_row = mysqli_fetch_assoc($result)){
                $task_date              = $t_row['datum'];
                $id_check               = $t_row['id'];
                $status                 = print_status($t_row['status']);

                if ($status === 'Završeno'){
                    $status_class       = 'color: green;';
                }elseif($status === 'Nezavršeno'){
                    $status_class       = 'color: red;';
                }else{
                    $status_class       = " ";
                }

                $_SESSION['page']       = "2";

                if($datecheck == $task_date){
                        echo    "<tr>
                                    <td style='width:20%;' >".$t_row['obaveza']."</td>
                                    <td style='width:20%;' >".$t_row['vreme_od']." - ".$t_row['vreme_do']."</td>
                                    <td style='width:30%; text-align:center;".$status_class."' >".$status."</td>
                                    <td style='width:30%;' >
                                        <div class='panel_buttons'>
                                        <form method='POST' action='includes/task_complete.php'>
                                            <input type='hidden' name='hidden_btn' value=".$id_check.">
                                            <button type='submit' class='task_btn' name='action_btn' value='1'>
                                                <i class='fas fa-check'></i>
                                            </button>
                                            <button type='submit' class='task_btn' name='action_btn' value='2'>
                                                <i class='fas fa-redo-alt'></i>
                                            </button>
                                            <button type='submit' class='task_btn' name='action_btn' value='3'>
                                                <i class='fas fa-eraser'></i>
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>";
                    }
            }
        }echo    "</table>
        </div>";
    } /* Štampa listu obaveza, njihov trenutni status i dozvoljava 3 jednostavne komande */

    function status_change ($con, $id, $btn, $page){
        switch ($btn){
            case"1": 
                $sql    = "UPDATE obaveza SET status = 1 WHERE id=$id";
                $case   = 1;
                break;
            case"2":
                $sql    = "UPDATE obaveza SET status = 0 WHERE id=$id";
                $case   = 2;
                break;
            case"3": 
                $sql    = "DELETE FROM obaveza WHERE id=$id";
                $case   = 3;
                break;
            }

        echo $sql;
        echo "<br>";

        if (mysqli_query($con,$sql)){
            switch($case){
                case"1": 
                    if($page == 1){
                    header("location:../index.php");
                    break;
                    }elseif($page == 2){
                        header("location:../task_status.php");
                        break;
                    }
                case"2":
                    header("location:../task_status.php");
                    break;
                case"3": 
                    header("location:../task_status.php");
                    break;
            }
        }else {
            echo "Došlo je do greške"; 
        }
    } /* Menja status obaveze na osnovu pretisnutog dugmeta na stranici Obaveza-lista */

