import { setText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Logowanie",
    h1: "Witaj ponownie!",
    dontHaveAcc: "Nie masz jeszcze konta? <a href='./register.php'>Zarejestruj się</a>!",
    h2: "Zaloguj się do EcoBalance",
    usernameInputPlaceholder: "Nazwa użytkownika",
    passwordInputPlaceholder: "Hasło",
    submitButton: "Zaloguj się",
    dbConnectionError: "Połączenie zostało przerwane",
    userDoesntExist: "Podany użytkownik nie istnieje",
    incorrectPassword: "Podane hasło jest nieprawidłowe"
}
const en = {
    lang: "en",
    title: "EcoBalance - Log in",
    h1: "Welcome back!",
    dontHaveAcc: "If you don't have an account yet, <a href='./register.php'>register</a>!",
    h2: "Log in to EcoBalance",
    usernameInputPlaceholder: "Username",
    passwordInputPlaceholder: "Password",
    submitButton: "Log in",
    dbConnectionError: "Connection failed",
    userDoesntExist: "Incorrect username",
    incorrectPassword: "The password is incorrect"
}


if(getLanguage() == "pl") {
    var lang = pl;
} else {
    var lang = en;
}

document.documentElement.lang = lang.lang;
document.title = lang.title;

setText('h1', lang);
setText('dontHaveAcc', lang);
setText('h2', lang);

setValue('usernameInputPlaceholder', 'placeholder', lang)
setValue('passwordInputPlaceholder', 'placeholder', lang)
setValue('submitButton', 'value', lang)

setText('dbConnectionError', lang);
setText('userDoesntExist', lang);
setText('incorrectPassword', lang);