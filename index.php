<?php 
include     "includes/head_tag.php"; ?>
    <body>
        <div class="body">
            <?php   $box    = $_SESSION["ime"];
                    $page   = "schedule";
                    include "includes/header.php";
            ?>
            <div class="main_content">
            <table style="width: 100%;" class="">
                    <tr class="">
                        <td class="accordion_header" style="width: 20%;">Datum</td>
                        <td class="accordion_header" style="width: 20%;">Dan</td>
                        <td class="accordion_header" style="width: 30%;">Šifra promene</td>
                        <td class="accordion_header" style="width: 30%;">Radno vreme</td>
                    </tr>
                    </table>
                    <?php include "includes/get_date_span.php"; ?>
                    
                
            </div>
        </div>
    </body>
    <script src="javascript/main.js"></script>           
    <script src="javascript/datepicker.js"></script>
</html>