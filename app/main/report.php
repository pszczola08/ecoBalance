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
            <a href="settings.php" id="settings"></a>
            <a href="report.php" class="current" id="support"></a>
        </nav>
        <article>
            <form action="report.php" method="post">
                <span id="type"></span>
                <select name="type">
                    <option id="choose" hidden selected value=""></option>
                    <option id="bug" value="bug"></option>
                    <option id="suggestion" value="suggestion"></option>
                    <option id="question" value="question"></option>
                </select>
                <br>
                <span id="email"></span>
                <input type="email" name="mail" maxlength="100">
                <br>
                <textarea name="content" id="content" required></textarea>
                <input type="submit" id="submit">
            </form>
        </article>
    </main>
    <script src="./theme.js"></script>
    <script src="./languages/support.js" type="module"></script>
    <?php
        @$type = $_POST['type'];
        @$email = $_POST['mail'];
        @$content = $_POST['content'];
        if(!empty($content)) {
            $send = DB -> query("
                INSERT INTO support
                VALUES
                ('$type', '$email', '$content')
            ");
        }
    ?>
</body>
</html>