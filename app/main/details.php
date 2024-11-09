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
            <a href="statistics.php" class="current" id="statistics"></a>
            <a href="settings.php" id="settings"></a>
            <a href="report.php" id="support"></a>
        </nav>
        <article>
            <script src="./languages/details.js" type="module"></script>
            <p id="article"></p>
            <?php
                $year = $_GET["year"];
                $month = $_GET["month"];

                $id = $_SESSION['userId'];
                $tbName = "user" . $id . "_data";
                $getMonths = DB -> query("
                    SELECT * FROM $tbName
                    WHERE year = $year AND month = $month
                ");
                if($getMonths -> num_rows > 0) {
                    $row = $getMonths -> fetch_assoc();
                    $points = 0;
                    $points += 8 * $row["usingCar"];
                    $points += 10 * $row["timesUsedPlane"];
                    $points += 6 * $row["usingMotorcycle"];
                    $points += 4 * $row["usingPublicTransport"];
                    switch ($row["heatingType"]) {
                        case 'coal':
                            $points += 9;
                            break;
                        case 'gas':
                            $points += 6;
                            break;
                        case 'heatingOil':
                            $points += 7;
                            break;
                        case 'wood':
                            $points += 5;
                            break;
                        case 'otherNonRenewable':
                            $points += 8;
                            break;
                        case 'heatPump':
                            $points += 2;
                            break;
                        case 'pellets':
                            $points += 5;
                            break;
                        case 'solarPanels':
                            $points += 3;
                            break;
                        case 'otherRenewable':
                            $points += 3;
                            break;
                        default:
                            $points += 0; 
                            break;
                    }
                    $points += 5 * $row["usingAC"];
                    switch ($row["energySource"]) {
                        case 'renewable':
                            $points += 2;
                            break;
                        case 'nonRenewable':
                            $points += 7;
                            break;
                        default:
                            $points += 0;
                            break;
                    }
                    $points += 7 * $row["eatingRedMeat"];
                    $points += 5 * $row["eatingDairy"];
                    $points += 4 * $row["eatingProcessedFood"];
                    $points += 3 * $row["eatingFruitAndVegetablesFromImport"];
                    $points += 6 * $row["timesBoughtFastFashion"];
                    $points += 8 * $row["timesBoughtDevices"];
                    $points += 7 * $row["timesBoughtAGD"];
                    $points += 4 * $row["usingBottledWater"];
                    $points += 3 * $row["usingPaperDocuments"];
                    switch ($row["segregatingTrash"]) {
                        case 0:
                            $points += 5;
                            break;
                        default:
                            $points += 0;
                            break;
                    }

                    echo "
                        <script>
                            window.onload = function() {
                                document.getElementById('article').innerText += ' ' + '$month' + '/' + '$year' + ':';
                            }
                        </script>
                    ";
                    echo "<br>";
                    echo "<span id='points'></span>";
                    if($points <= 18) {
                        $pid = 'veryLow';
                    } else if($points >= 19 && $points <= 36) {
                        $pid = 'low';
                    } else if($points >= 37 && $points <= 54) {
                        $pid = 'medium';
                    } else if($points >= 55 && $points <= 72) {
                        $pid = 'high';
                    } else {
                        $pid = 'veryHigh';
                    }
                    echo "$points (<span id='$pid'></span>)";
                    echo "<p id='whatYouCanDo'></p>";
                    echo "<ul>";
                    if($row["usingCar"] != 0 || $row["usingMotorcycle"]) {
                        echo "
                            <li id='changeToBusses'></li>
                        ";
                    }
                    if($row["usingAC"] != 0) {
                        echo "
                            <li id='stopAC'></li>
                        ";
                    }
                    if($row["eatingRedMeat"] != 0) {
                        echo "
                            <li id='stopRedMeat'></li>
                        ";
                    }
                    if($row["timesBoughtFastFashion"] > 0) {
                        echo "
                            <li id='ff'></li>
                        ";
                    }
                    if($row["usingBottledWater"] != 0) {
                        echo "
                            <li id='bottledWaterChange'></li>
                        ";
                    }
                    if($row["segregatingTrash"] == 0) {
                        echo "
                            <li id='segregate'></li>
                        ";
                    }
                    echo "</ul>";
                } else {
                    generateDiv("notExist");
                }
            ?>
            </aside>
        </article>
    </main>
    <script src="./theme.js"></script>
</body>
</html>