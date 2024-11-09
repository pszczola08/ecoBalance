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
            <p id="article"></p>
            <aside id="graphs">
                <?php
                    $pts = [];
                    $divs = [];
                    $id = $_SESSION['userId'];
                    $tbName = "user" . $id . "_data";
                    $getMonths = DB -> query("
                        SELECT * FROM $tbName
                        ORDER BY year, month
                    ");
                    if($getMonths) {
                        $results = $getMonths -> fetch_all(MYSQLI_ASSOC);
                        foreach($results as $row) {
                            $year = $row["year"];
                            $month = $row["month"];

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
                    
                            $name = $row["month"] . "/" . $row["year"];
                    
                            if($points <= 18) {
                                $color = '#ff33cc';
                            } else if($points >= 19 && $points <= 36) {
                                $color = '#ff3399';
                            } else if($points >= 37 && $points <= 54) {
                                $color = '#ff3366';
                            } else if($points >= 55 && $points <= 72) {
                                $color = '#ff3333';
                            } else {
                                $color = '#ff3300';
                            }
                    
                            $div = $name . "_div";
                            $divs[] = $div;
                            generateDiv($div);

                            $pts[] = $points;

                            echo "
                                <script>
                                    document.getElementById('$div').style.backgroundColor = '$color';
                                    document.getElementById('$div').setAttribute('title', '$name');
                                    document.getElementById('$div').setAttribute('onclick', 'goToDetails($year, $month)');
                                </script>
                            ";
                        }
                        $getMaxPoints = max($pts);
                        $a = 0;
                        foreach ($results as $row) {
                            $prc = ($pts[$a] / $getMaxPoints) * 100;
                            echo "
                                <script>
                                    document.getElementById('$divs[$a]').style.height = '$prc' + '%';
                                </script>
                            ";
                            $a++;
                        }
                    }
                ?>
                
            </aside>
        </article>
    </main>
    <script src="./languages/statistics.js" type="module"></script>
    <script src="./theme.js"></script>
    <script>
        function goToDetails(year, month) {
            window.open("details.php?year=" + year + "&month=" + month, "_self");
        }
    </script>
</body>
</html>