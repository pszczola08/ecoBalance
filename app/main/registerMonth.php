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
            <a href="registerMonth.php" class="current" id="registerMonth"></a>
            <a href="statistics.php" id="statistics"></a>
            <a href="settings.php" id="settings"></a>
            <a href="report.php" id="support"></a>
        </nav>
        <article>
            <form action="registerMonth.php" method="post">
                <?php
                    @$month = $_POST['month'];
                    @$year = $_POST['year'];
                    @$usingCar = $_POST['usingCar'];
                    @$timesUsedPlane = $_POST['timesUsedPlane'];
                    @$usingMotor = $_POST['usingMotor'];
                    @$usingPublicTransport = $_POST['usingPublicTransport'];
                    @$heating = $_POST['heating'];
                    @$usingAC = $_POST['usingAC'];
                    @$energy = $_POST['energy'];
                    @$redMeat = $_POST['redMeat'];
                    @$dairy = $_POST['dairy'];
                    @$processed = $_POST['processed'];
                    @$importFruit = $_POST['importFruit'];
                    @$fastFashion = $_POST['fastFashion'];
                    @$devices = $_POST['devices'];
                    @$agd = $_POST['agd'];
                    @$bottledWater = $_POST['bottledWater'];
                    @$paper = $_POST['paper'];
                    @$segregate = $_POST['segregate'];
                    $checkboxNames = [
                        'usingCar',
                        'usingMotor',
                        'usingPublicTransport',
                        'usingAC',
                        'redMeat',
                        'dairy',
                        'processed',
                        'importFruit',
                        'bottledWater',
                        'paper',
                        'segregate'
                    ];
                    foreach ($checkboxNames as $name) {
                        if (isset($_POST[$name]) && $_POST[$name] === 'on') {
                            ${$name} = 1;
                        } else {
                            ${$name} = 0;
                        }
                    }         

                    if (
                        !empty($month) && 
                        !empty($year) && 
                        $timesUsedPlane >= 0 &&
                        !empty($heating) && 
                        !empty($energy) && 
                        $fastFashion >= 0 && 
                        $devices >= 0 && 
                        $agd >= 0
                    ) {
                        $tbName = "user" . $id . "_data";
                        $checkForMonth = DB -> query(
                            "SELECT COUNT(*) FROM $tbName WHERE year = $year AND month = $month"
                        );
                        $result = $checkForMonth -> fetch_row();
                        if($result[0] == 0) {
                            $insert = DB -> query("
                                INSERT INTO $tbName
                                VALUES
                                (
                                    '$id', '$month', '$year',
                                    '$usingCar', '$timesUsedPlane', '$usingMotor', '$usingPublicTransport',
                                    '$heating', '$usingAC', '$energy',
                                    '$redMeat', '$dairy', '$processed', '$importFruit',
                                    '$fastFashion', '$devices', '$agd',
                                    '$bottledWater', '$paper', '$segregate'
                                )
                            ");
                            if($insert) {
                                echo "
                                    <script>
                                        window.open('details.php?year=' + $year + '&month=' + $month, '_self');
                                    </script>
                                ";
                            } else {
                                generateDiv("dbError");
                            }
                        } else {
                            generateDiv("monthAlreadyExists");
                        }
                    }
                ?>
                <h1 id="h1"></h1>
                <h2 id="h2"></h2>
                <span id="monthName"></span>
                <select required name="month">
                    <option value="" id="noMonth" selected hidden></option>
                    <option value="1" id="m1"></option>
                    <option value="2" id="m2"></option>
                    <option value="3" id="m3"></option>
                    <option value="4" id="m4"></option>
                    <option value="5" id="m5"></option>
                    <option value="6" id="m6"></option>
                    <option value="7" id="m7"></option>
                    <option value="8" id="m8"></option>
                    <option value="9" id="m9"></option>
                    <option value="10" id="m10"></option>
                    <option value="11" id="m11"></option>
                    <option value="12" id="m12"></option>
                </select><br>
                <span id="year"></span>
                <input type="number" min="2020" max="2150" name="year" required>

                <h3 id="h3_1"></h3>
                <label>
                    <span id="usingCar"></span>
                    <input type="checkbox" name="usingCar"><br>
                </label>
                <span id="timesUsedPlane"></span>
                <input type="number" min="0" required max="200" name="timesUsedPlane"><br>
                <label>
                    <span id="usingMotor"></span>
                    <input type="checkbox" name="usingMotor"><br>
                </label>
                <label>
                    <span id="usingPublicTransport"></span>
                    <input type="checkbox" name="usingPublicTransport"><br>
                </label>

                <h3 id="h3_2"></h3>
                <span id="heating"></span>
                <select required name="heating">
                    <option id="chooseHeating" value="" hidden selected></option>
                    <option id="coal" value="coal"></option>
                    <option id="gas" value="gas"></option>
                    <option id="heatingOil" value="heatingOil"></option>
                    <option id="wood" value="wood"></option>
                    <option id="otherNonRenewable" value="otherNonRenewable"></option>
                    <option id="heatPump" value="heatPump"></option>
                    <option id="pellets" value="pellets"></option>
                    <option id="solarPanels" value="solarPanels"></option>
                    <option id="otherRenewable" value="otherRenewable"></option>
                </select><br>
                <label>
                    <span id="usingAC"></span>
                    <input type="checkbox" name="usingAC"><br>
                </label>
                <span id="energy"></span>
                <select required name="energy">
                    <option id="chooseEnergy" value="" selected hidden></option>
                    <option id="renewable" value="renewable"></option>
                    <option id="nonRenewable" value="nonRenewable"></option>
                </select><br>

                <h3 id="h3_3"></h3>
                <label>
                    <span id="redMeat"></span>
                    <input type="checkbox" name="redMeat"><br>
                </label>
                <label>
                    <span id="dairy"></span>
                    <input type="checkbox" name="dairy"><br>
                </label>
                <label>
                    <span id="processed"></span>
                    <input type="checkbox" name="processed"><br>
                </label>
                <label>
                    <span id="importFruit"></span>
                    <input type="checkbox" name="importFruit"><br>
                </label>

                <h3 id="h3_4"></h3>
                <span id="fastFashion"></span>
                <input type="number" name="fastFashion" min="0" max="200"><br>
                <span id="devices"></span>
                <input type="number" min="0" max="200" required name="devices"><br>
                <span id="agd"></span>
                <input type="number" min="0" max="200" required name="agd"><br>

                <h3 id="h3_5"></h3>
                <label>
                    <span id="bottledWater"></span>
                    <input type="checkbox" name="bottledWater"><br>
                </label>
                <label>
                    <span id="paper"></span>
                    <input type="checkbox" name="paper"><br>
                </label>
                <label>
                    <span id="segregate"></span>
                    <input type="checkbox" name="segregate"><br>
                </label>
                <input type="submit" id="submitButton">
            </form>
        </article>
    </main>
    <script src="./languages/registerMonth.js" type="module"></script>
    <script src="./theme.js"></script>
</body>
</html>