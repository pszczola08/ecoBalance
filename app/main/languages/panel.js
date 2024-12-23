import { setText, getLanguage } from '../../lib/languageLib.js';
import { getMonthAndYear } from "../../lib/dateLib.js";

const pl = {
    lang: "pl",
    title: "EcoBalance - Panel Główny",
    mainPanel: "Panel Główny",
    settings: "Ustawienia",
    greeting: "Cześć",
    registerMonth: "Zarejestruj nowy miesiąc",
    statistics: "Statystyki",
    support: "Zgłoś problem, zasugeruj zmianę lub zadaj pytanie",
    whatsNew: `
        <h1>Co nowego?</h1>
        <p style='font-size: large;'>Wersja: 0.0</p>
        <p>

        </p>
    `,
    monthRegisterInfo: `
        <h1>Obecny miesiąc: ${getMonthAndYear('pl')}</h1>
    `
}
const en = {
    lang: "en",
    title: "EcoBalance - Main Panel",
    mainPanel: "Main Panel",
    settings: "Settings",
    greeting: "Hello",
    registerMonth: "Register new month",
    statistics: "Statistics",
    support: "Report a bug, suggest a change or ask a question",
    whatsNew: `
        <h1>What's new?</h1>
        <p style='font-size: large;'>Version: 0.0</p>
        <p>
            
        </p>
    `,
    monthRegisterInfo: `
        <h1>Current month: ${getMonthAndYear('en')}</h1>
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