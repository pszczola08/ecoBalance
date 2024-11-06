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
                    <input type="text" name="username" placeholder="" id="usernameInput" required minlength="8" maxlength="40"><br>
                    <input type="password" name="password" placeholder="" id="passwordInput" required><br>
                    <input type="password" name="secondPassword" placeholder="" id="secondPasswordInput" required><br>
                    <input type="submit" value="" id="submitButton">
                </form>
                <?php
                    @$username = $_POST['username'];
                    @$password = $_POST['password'];
                    @$secondPassword = $_POST['secondPassword'];
                    if(!empty ($username) && !empty($password) && !empty($secondPassword)) {
                        $errors = false;
                        try {
                            require "../lib/globalVariables.php";
                        } catch(Exception $e) {
                            $errors = true;
                            echo("<div id='dbConnectionError'></div>");
                        }

                        if($errors == false) {
                            if($password == $secondPassword) {

                            } else {
                                echo("<div id='passwordsAreNotTheSameError'></div>");
                            }
                        }
                    }
                ?>
            </div>
        </article>
    </main>
    <script src="./languages/register.js"></script>
    <script src="./theme.js"></script>
    
</body>
</html>