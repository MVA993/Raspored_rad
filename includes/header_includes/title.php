<?php
    if (isset($_SESSION['opcija'])){
        $opcija     = $_SESSION['opcija'];
    }
    $korisnik       = $box;
    
    $sql            = "SELECT *
                       FROM zaposleni 
                       WHERE korisnicko_ime = '$korisnik'";
    $result         = mysqli_query($con,$sql);
    $ime            = mysqli_fetch_assoc($result);

    if (!empty($ime['id'])){
        $test_ime       = $ime['ime']. " ". $ime['prezime'];
        if (empty($opcija)){
            echo        $test_ime;
        }elseif ($opcija!==$test_ime){
            get_title($opcija, $con);
        }
    }elseif (!empty($opcija)){
        get_title($opcija, $con);
    }