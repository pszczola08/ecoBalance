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
    <link rel="stylesheet" href="" id="theme">
</head>
<body>
    <main>
        <article>
            <div class="info">
                <h2 id="h2"></h2>
                <form method="post">
                    <input type="text" name="username" id="usernameInputPlaceholder" required><br>
                    <input type="password" name="password" id="passwordInputPlaceholder" required><br>
                    <input type="submit" id="submitButton">
                </form>
                <?php
                    @$username = $_POST['username'];
                    @$password = $_POST['password'];
                    if(!empty ($username) && !empty($password)) {
                        $errors = false;
                        try {
                            require "../lib/globalVariables.php";
                            require "../lib/divGen.php";
                        } catch(Exception $e) {
                            $errors = true;
                            generateDiv('dbConnectionError');
                        }

                        if($errors == false) {
                            $getResults = DB -> query(
                                "SELECT * FROM users WHERE username = '$username'"
                            );
                            if($getResults) {
                                $res = $getResults -> fetch_row();
                                if($res) {
                                    if(sha1($password) == $res[2]) {
                                        session_start();
                                        $_SESSION['userId'] = $res[0];
                                        require "../lib/functions.php";
                                        redirect("../main/panel.php", "_self");
                                    } else {
                                        generateDiv("incorrectPassword");
                                    }
                                } else {
                                    generateDiv("userDoesntExist");
                                }
                            } else {
                                generateDiv('dbConnectionError');
                            }
                        }
                    }
                ?>
            </div>
        </article>
        <aside>
            <div class="info">
                <h1 id="h1"></h1>
                <p id="dontHaveAcc"></p>
            </div>
        </aside>
    </main>
    <script src="./languages/login.js" type="module"></script>
    <script src="./theme.js"></script>
</body>
</html>