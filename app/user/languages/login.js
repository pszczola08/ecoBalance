const pl = {
    lang: "pl",
    title: "EcoBalance - Logowanie",
    h1: "Witaj ponownie!",
    haveAcc: "Nie masz jeszcze konta? <a href='./register.php'>Zarejestruj się</a>!",
    h2: "Zaloguj się do EcoBalance",
    usernameInputPlaceholder: "Nazwa użytkownika",
    passwordInputPlaceholder: "Hasło",
    submitButton: "Zaloguj się"
}
const en = {
    lang: "en",
    title: "EcoBalance - Log in",
    h1: "Welcome back!",
    haveAcc: "If you don't have an account yet, <a href='./register.php'>register</a>!",
    h2: "Log in to EcoBalance",
    usernameInputPlaceholder: "Username",
    passwordInputPlaceholder: "Password",
    submitButton: "Log in"
}

const userLanguage = navigator.language || navigator.userLanguage;
userLanguage.slice(0, 2);
if(userLanguage == "pl") {
    switchLang("pl");
} else {
    switchLang("en");
}

function switchLang(language) {
    if(language == "pl") {
        var lang = pl;
    } else {
        var lang = en;
    }

    document.documentElement.lang = lang.lang;
    document.title = lang.title;
    document.getElementById('h1').innerText = lang.h1;
    document.getElementById('haveAcc').innerHTML = lang.haveAcc;
    document.getElementById('h2').innerText = lang.h2;
    document.getElementById('usernameInput').setAttribute("placeholder", lang.usernameInputPlaceholder);
    document.getElementById('passwordInput').setAttribute("placeholder", lang.passwordInputPlaceholder);
    document.getElementById('submitButton').setAttribute("value", lang.submitButton);
}