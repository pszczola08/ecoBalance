<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./styleDesktop.css">
    <link rel="stylesheet" href="./styleMobile.css">
    <link rel="stylesheet" href="../globalStyle.css">
    <link rel="stylesheet" id="theme">
    <style>
        article > div {
            border-width: 2px;
            border-style: dotted;
            border-radius: 5px;
            padding: 0 20px;
            max-height: 40dvh;
            overflow: auto;
            margin: 7px;

        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['userId'])) {
            require "../lib/functions.php";
            redirect("../user/login.php", "_self");
        } else {
            $id = $_SESSION['userId'];
        }
    ?>
    <header>
        <span id="greeting">

        </span>
        ,
        <?php
            $errors = false;
            try {
                require "../lib/globalVariables.php";
                require "../lib/divGen.php";
                require "../lib/functions.php";
            } catch(Exception $e) {
                $errors = true;
                redirect("../user/login.php", "_self");
            }
            if($errors == false) {
                $getResults = DB -> query(
                    "SELECT * FROM users WHERE id = '$id'"
                );
                if($getResults) {
                    $row = $getResults -> fetch_row();
                    if($row) {
                        $username = $row[1];
                    } else {
                        redirect("../user/login.php", "_self");
                    }
                } else {
                    redirect("../user/login.php", "_self");
                }
            } else {
                redirect("../user/login.php", "_self");
            }
            echo $username . "!";
        ?>
    </header>
    <main>
        <nav>
            <a href="panel.php" class="current" id="mainPanel"></a>
            <a href="registerMonth.php" id="registerMonth"></a>
            <a href="statistics.php" id="statistics"></a>
            <a href="settings.php" id="settings"></a>
            <a href="report.php" id="support"></a>
        </nav>
        <article>
            <!-- <div id="whatsNew"></div> -->
            <div id="monthRegisterInfo">
                
            </div>
        </article>
    </main>
    <script src="./languages/panel.js" type="module"></script>
    <script src="./theme.js"></script>
    <?php
        $date = new DateTime();
        $month = $date -> format('m');
        $year = $date -> format('Y');
        $tbName = "user" . $id . "_data";
        $check = DB -> query(
            "SELECT COUNT(*) FROM $tbName WHERE month = $month AND year = $year"
        );
        $c = $check -> fetch_row();
        if($c[0] == 0) {
            echo "<script> ";
            echo "window.onload = function() { document.getElementById('monthRegisterInfo').innerHTML += `<p id='didntRegister'></p>`; ";
            echo "const script = document.createElement('script'); ";
            echo "script.src = './languages/panel2.js'; ";
            echo "script.type = 'module'; ";
            echo "document.body.appendChild(script); } ";
            echo "</script>";
        } else {
            echo "<script> ";
            echo "window.onload = function() { document.getElementById('monthRegisterInfo').innerHTML += `<p id='registered'></p>`; ";
            echo "const script = document.createElement('script'); ";
            echo "script.src = './languages/panel2.js'; ";
            echo "script.type = 'module'; ";
            echo "document.body.appendChild(script); } ";
            echo "</script>";
        }
    ?>
</body>
</html>