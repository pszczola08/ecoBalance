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
            <a href="panel.php" id="mainPanel"></a>
            <a href="registerMonth.php" id="registerMonth"></a>
            <a href="statistics.php" id="statistics"></a>
            <a href="settings.php" class="current" id="settings"></a>
            <a href="report.php" id="support"></a>
        </nav>
        <article>
            <h1 id="h1"></h1>

            <h2 id="h2_1"></h2>
            <span id="password"></span>
            <input type="text" name="password"><br>
            <span id="delete"></span>
            <input type="button" onclick="window.open('delete.php', '_self')" id="deleteRequest">

            <h2 id="h2_2"></h2>
            <span id="version"></span>
            <a id="versionDetail" href="versionDetail.php" style="margin-left: 10px; color: #565192;"></a>
        </article>
    </main>
    <script src="./theme.js"></script>
    <script src="./languages/settings.js" type="module"></script>
</body>
</html>