import { setText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Zarejestruj Nowy Miesiąc",
    submitButton: "Zarejestruj",
    mainPanel: "Panel Główny",
    settings: "Ustawienia",
    greeting: "Cześć",
    registerMonth: "Zarejestruj nowy miesiąc",
    statistics: "Statystyki",
    support: "Zgłoś problem lub zasugeruj zmianę",
    article: "Wykres twojego śladu węglowego"
}
const en = {
    lang: "en",
    title: "EcoBalance - Register New Month",
    submitButton: "Register",
    mainPanel: "Main Panel",
    settings: "Settings",
    greeting: "Hello",
    registerMonth: "Register new month",
    statistics: "Statistics",
    support: "Report a bug or suggest a change",
    article: "Chart of your carbon footprint"
}

if(getLanguage() == "pl") {
    var lang = pl;
} else {
    var lang = en;
}

document.documentElement.lang = lang.lang;
document.title = lang.title;

let counter = 0;
for(let nameId in pl) {
    if(counter > 2) {
        setText(String(nameId), lang)
    }
    counter++;
}