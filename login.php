<DOCTYPE! html>
<head>
    <title>Prijava</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/login_style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logo">
        <img src="includes/images/logo200px.png">
    </div>
    <div class="login_box">
        <div class="title">
                <h2>Dobro došli</h2>
        </div>
        <form action="includes/check.php" method="post" class="login" >
            <div class="name_box">
                <input class="imput" type="text" placeholder="Unesite korisničko ime..." name="user" required oninvalid="this.setCustomValidity('Niste uneli korisničko ime!')"
                oninput="this.setCustomValidity('')">
            </div>
            <div class="pass_box">
                <input class="imput" type="password" placeholder="Unesite lozinku..." name="pass" required oninvalid="this.setCustomValidity('Niste uneli lozinku!')"
                oninput="this.setCustomValidity('')">
            </div>
            <div class="btn_box">
                <button type="Submit" class="btn">Prijava</button>
                <?php
                    if (isset($_GET["error"])){
                    if ($_GET["error"] == "wronglogin") {
                        echo "<p>Unesite tačne informacije!</p>";
                    }else if ($_GET["error"] == "nodb") {
                        echo "<p>Niste povezani na bazu podataka!</p>";
                    }
                    }
                ?>
            </div>
        </form>
    </div>
</body>