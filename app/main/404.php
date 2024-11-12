<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="./styleDesktop.css">
    <link rel="stylesheet" href="./styleMobile.css">
    <link rel="stylesheet" href="../globalStyle.css">
    <link rel="stylesheet" id="theme">
    <style>
        header {
            background-color: #4e7a72;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }
        
        @media screen and (orientation: portrait) {
            header {
                border-radius: 40px;
                height: 20dvh;
                margin-bottom: 30px;
            }
            a {
                display: block;
                text-align: center;
            }
        }
        @media screen and (orientation: landscape) {
            header {
                border-radius: 10px;
                height: 20dvh;
                margin-bottom: 10px;
                font-size: xx-large;
            }
            a {
                display: block;
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header id="header">
        
    </header>
    <main>
        <a href="/projects/ecobalance/app/main/panel.php" id="a"></a>
    </main>
    <script>
        const prefersDarkTheme = window.matchMedia("(prefers-color-scheme: dark)");

        if (prefersDarkTheme.matches) {
            document.getElementById("theme").setAttribute("href", "./styleDark.css")
        } else {
            document.getElementById("theme").setAttribute("href", "./styleLight.css")
        }
    </script>
    <script>
        const pl = {
            lang: "pl",
            title: "EcoBalance - Błąd 404",
            header: "Podana strona nie istnieje.",
            a: "Powrót na stronę główną"
        }
        const en = {
            lang: "en",
            title: "EcoBalance - Error 404",
            header: "This page doesn't exist.",
            a: "Back to main page"
        }

        const userLanguage = navigator.language || navigator.userLanguage;
        var lan = userLanguage.slice(0, 2);
        if(lan == "pl") {
            var lang = pl;
        } else {
            var lang = en;
        }

        document.documentElement.lang = lang.lang;
        document.title = lang.title;
        document.getElementById('header').innerHTML = lang['header'];
        document.getElementById('a').innerHTML = lang['a'];
    </script>
</body>
</html>