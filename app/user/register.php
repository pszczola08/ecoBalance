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
        <aside>
            <div class="info">
                <h1 id="h1"></h1>
                <p id="haveAcc"></p>
            </div>
        </aside>
        <article>
            <div class="info">
                <h2 id="h2"></h2>
                <form method="post" action="register.php">
                    <input type="text" name="username" id="usernameInput" required minlength="8" maxlength="40" pattern="[a-zA-Z0-9]+"><br>
                    <input type="password" name="password" id="passwordInputPlaceholder" required><br>
                    <input type="password" name="secondPassword" id="secondPasswordInputPlaceholder" required><br>
                    <input type="submit" id="submitButton">
                </form>
                <?php
                    @$username = $_POST['username'];
                    @$password = $_POST['password'];
                    @$secondPassword = $_POST['secondPassword'];
                    if(!empty ($username) && !empty($password) && !empty($secondPassword)) {
                        $errors = false;
                        try {
                            require "../lib/globalVariables.php";
                            require "../lib/divGen.php";
                            require "../lib/functions.php";
                        } catch(Exception $e) {
                            $errors = true;
                            generateDiv('dbConnectionError');
                        }

                        if($errors == false) {
                            if($password == $secondPassword) {
                                $checkForUsername = DB -> query(
                                    "SELECT COUNT(*) FROM users WHERE username = '$username'"
                                );
                                if(!$checkForUsername) {
                                    generateDiv('dbConnectionError');
                                    DB -> close();
                                } else {
                                    $info = $checkForUsername -> fetch_row();
                                    if($info[0] == 0) {
                                        $hashpass = SHA1($password);
                                        $insert = DB -> query(
                                            "INSERT INTO users(username, password) VALUES ('$username', '$hashpass')"
                                        );
                                        if($insert) {
                                            session_start();
                                            $_SESSION['username'] = $username;
                                            redirect("./createAcc.php", "_self");
                                        } else {
                                            generateDiv("dbConnectionError");
                                            DB -> close();
                                        }
                                    } else {
                                        generateDiv("usernameAlreadyExists");
                                        DB -> close();
                                    }
                                }
                            } else {
                                generateDiv("passwordsAreNotTheSameError");
                                DB -> close();
                            }
                        }
                    }
                ?>
            </div>
        </article>
    </main>
    <script src="./languages/register.js" type="module"></script>
    <script src="./theme.js"></script>
    
</body>
</html>