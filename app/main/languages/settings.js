import { setText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Ustawienia",
    deleteRequest: "Wyślij prośbę o usunięcie konta",
    mainPanel: "Panel Główny",
    settings: "Ustawienia",
    greeting: "Cześć",
    registerMonth: "Zarejestruj nowy miesiąc",
    statistics: "Statystyki",
    support: "Zgłoś problem, zasugeruj zmianę lub zadaj pytanie",
    h1: "Ustawienia",
    h2_1: "Konto",
    password: "Zmień hasło",
    delete: "Usuń konto",
    h2_2: "Informacje o aplikacji",
    version: "Wersja: 0.0",
    versionDetail: "Szczegółowy opis zmian"
}
const en = {
    lang: "en",
    title: "EcoBalance - Settings",
    deleteRequest: "Request account deletion",
    mainPanel: "Main Panel",
    settings: "Settings",
    greeting: "Hello",
    registerMonth: "Register new month",
    statistics: "Statistics",
    support: "Report a bug, suggest a change or ask a question",
    h1: "Settings",
    h2_1: "Account",
    password: "Change password",
    delete: "Delete account",
    version: "Version: 0.0",
    versionDetail: "Detailed change log"
}

if(getLanguage() == "pl") {
    var lang = pl;
} else {
    var lang = en;
}

document.documentElement.lang = lang.lang;
document.title = lang.title;
setValue('deleteRequest', 'value', lang);

let counter = 0;
for(let nameId in pl) {
    if(counter > 2) {
        setText(String(nameId), lang)
    }
    counter++;
}