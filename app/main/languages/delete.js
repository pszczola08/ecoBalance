import { setText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Usuń konto",
    submit: "Usuń konto",
    mainPanel: "Panel Główny",
    settings: "Ustawienia",
    greeting: "Cześć",
    registerMonth: "Zarejestruj nowy miesiąc",
    statistics: "Statystyki",
    support: "Zgłoś problem, zasugeruj zmianę lub zadaj pytanie",
    cantGoBack: "Uwaga! Ta akcja jest nieodwracalna!",
    continue: "Jestem tego świadomy, kontynuuj mimo tego"
}
const en = {
    lang: "en",
    title: "EcoBalance - Delete account",
    submit: "Delete account",
    mainPanel: "Main Panel",
    settings: "Settings",
    greeting: "Hello",
    registerMonth: "Register new month",
    statistics: "Statistics",
    support: "Report a bug, suggest a change or ask a question",
    cantGoBack: "Warning! This action is irreversible!",
    continue: "I am aware of this, continue anyway"
}

if(getLanguage() == "pl") {
    var lang = pl;
} else {
    var lang = en;
}

document.documentElement.lang = lang.lang;
document.title = lang.title;
setValue("submit", "value", lang);

let counter = 0;
for(let nameId in pl) {
    if(counter > 2) {
        setText(String(nameId), lang)
    }
    counter++;
}