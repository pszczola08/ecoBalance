import { setText, setInfoText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Rejestracja",
    h1: "Witaj!",
    haveAcc: "Masz już konto? <a href='./login.php'>Zaloguj się</a>!",
    h2: "Utwórz konto EcoBalance",
    usernameInput: "Nazwa użytkownika",
    passwordInputPlaceholder: "Hasło",
    secondPasswordInputPlaceholder: "Powtórz hasło",
    submitButton: "Utwórz Konto",
    dbConnectionError: "Połączenie zostało przerwane",
    passwordsAreNotTheSameError: "Hasła nie są takie same!",
    usernameInputTitle: "Nazwa użytkownika może zawierać tylko małe i duże litery oraz cyfry.",
    usernameAlreadyExists: "Nazwa użytkownika jest już zajęta",
    success: "Utworzono konto!"
}
const en = {
    lang: "en",
    title: "EcoBalance - Registration",
    h1: "Welcome!",
    haveAcc: "If you already have an account, <a href='./login.php'>log in</a>!",
    h2: "Create EcoBalance account",
    usernameInput: "Username",
    passwordInputPlaceholder: "Password",
    secondPasswordInputPlaceholder: "Repeat password",
    submitButton: "Create account",
    dbConnectionError: "Connection failed",
    passwordsAreNotTheSameError: "Passwords are not the same!",
    usernameInputTitle: "Username must contain only capital and small letters and digits",
    usernameAlreadyExists: "This username is taken",
    success: "Account was created!"
}


if(getLanguage() == "pl") {
    var lang = pl;
} else {
    var lang = en;
}

document.documentElement.lang = lang.lang;
document.title = lang.title;

setText('h1', lang);
setText('haveAcc', lang);
setText('h2', lang);

setValue('usernameInput', 'placeholder', lang);
setValue('passwordInputPlaceholder', 'placeholder', lang);
setValue('secondPasswordInputPlaceholder', 'placeholder', lang);
setValue('submitButton', 'value', lang);
document.getElementById('usernameInput').setAttribute('title', lang.usernameInputTitle)

setInfoText('dbConnectionError', lang);
setInfoText('passwordsAreNotTheSameError', lang);
setInfoText('usernameAlreadyExists', lang);
setInfoText('success', lang);