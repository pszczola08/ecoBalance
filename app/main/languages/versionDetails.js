import { setText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Szczegółowy opis wersji",
    mainPanel: "Panel Główny",
    settings: "Ustawienia",
    greeting: "Cześć",
    registerMonth: "Zarejestruj nowy miesiąc",
    statistics: "Statystyki",
    support: "Zgłoś problem, zasugeruj zmianę lub zadaj pytanie",
    h1_0p0: "Wersja 0.0",
    p0p0_det: `
        <ul>
            <li>Stworzono aplikację EcoBalance</li>
        </ul>
    `
}
const en = {
    lang: "en",
    title: "EcoBalance - Detailed version description",
    mainPanel: "Main Panel",
    settings: "Settings",
    greeting: "Hello",
    registerMonth: "Register new month",
    statistics: "Statistics",
    support: "Report a bug, suggest a change or ask a question",
    h1_0p0: "Version 0.0",
    p0p0_det: `
        <ul>
            <li>EcoBalance app was created</li>
        </ul>
    `
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
    if(counter > 1) {
        setText(String(nameId), lang)
    }
    counter++;
}