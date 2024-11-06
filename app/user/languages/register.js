const pl = {
    lang: "pl",
    title: "EcoBalance - Rejestracja",
    h1: "Witaj!",
    haveAcc: "Masz już konto? <a href='./login.php'>Zaloguj się</a>!",
    h2: "Utwórz konto EcoBalance",
    usernameInputPlaceholder: "Nazwa użytkownika",
    passwordInputPlaceholder: "Hasło",
    secondPasswordInputPlaceholder: "Powtórz hasło",
    submitButton: "Utwórz Konto",
    dbConnectionError: "Połączenie zostało przerwane",
    passwordsAreNotTheSameError: "Hasła nie są takie same!"
}
const en = {
    lang: "en",
    title: "EcoBalance - Registration",
    h1: "Welcome!",
    haveAcc: "If you already have an account, <a href='./login.php'>log in</a>!",
    h2: "Create EcoBalance account",
    usernameInputPlaceholder: "Username",
    passwordInputPlaceholder: "Password",
    secondPasswordInputPlaceholder: "Repeat password",
    submitButton: "Create account",
    dbConnectionError: "Connection failed",
    passwordsAreNotTheSameError: "Passwords are not the same!"
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
    document.getElementById('secondPasswordInput').setAttribute("placeholder", lang.secondPasswordInputPlaceholder);
    document.getElementById('submitButton').setAttribute("value", lang.submitButton);
    document.getElementById('dbConnectionError').innerText = lang.dbConnectionError;
    document.getElementById('passwordsAreNotTheSameError').innerText = lang.passwordsAreNotTheSameError;
}