<?php /* error_reporting(E_ALL ^ E_WARNING); */
?>
<div class="header_box">
    <div class="top_bar">
        <div class="logo_box">
            <img src="includes\images\logo100px.png">
        </div>
        <div class="user_box">
            <div class="name_box">
                <?php get_user($con, $box); ?>
            </div>
            <div class="logout_box">
                <form action="includes/header_includes/logout.php">
                    <button class="logout"><i class="fas fa-sign-out-alt"></i> ODJAVA</button>
                </form>
            </div>
            <div class="upload_box">
                <?php $task_page= upload_btn_show($con, $box); ?>
            </div>
        </div>
    </div>
    <div id="nav_bar">
        <div class="select_box">
            <form method="get" action="?sort=SELECTEDVALUEHERE">  
                <select id="selection" name="selection" class="selection" onchange="this.form.submit();">
                    <div class="list">
                    <option class="select_btn"></option>
                        <?php dropdown_list($con); ?>
                    </div>
                </select>    
                <span class="custom_arrow"></span>
            </form>          
            <?php if(isset($_GET['selection']))  {$_SESSION['opcija']=$_GET['selection'];} ?>  
        </div>
        <div class="title_box">
            <?php include "includes/header_includes/title.php" ?>
        </div>
    </div>    
    <form method="post" action="" id="date_form"> 
        <div class="date_bar" style="width:100%;"> 
            <div class="datepicker">
                <div class="date_box">
                    <label>OD: </label>
                    <input type="text" id="date_from" name="date_from" value="" autocomplete="off">
                </div>
                <div class="date_box">
                    <label>DO: </label>
                    <input type="text" id="date_to" name="date_to" value="" autocomplete="off">
                </div>
            </div>
            <div class="date_btn">
                    <button type="submit" name="show" class="date_show"><i class="fas fa-print"></i> PRIKAŽI</button>
            </div>    
        </div>
    </form>
    
</div>