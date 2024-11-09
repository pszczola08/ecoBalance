import { setText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Detale",
    submitButton: "Zarejestruj",
    mainPanel: "Panel Główny",
    settings: "Ustawienia",
    greeting: "Cześć",
    registerMonth: "Zarejestruj nowy miesiąc",
    statistics: "Statystyki",
    support: "Zgłoś problem, zasugeruj zmianę lub zadaj pytanie",
    article: "Detale z miesiąca ",
    points: "Wynik śladu węglowego: ",
    veryLow: "Bardzo niski",
    low: "Niski",
    medium: "Średni",
    high: "Wysoki",
    veryHigh: "Bardzo wysoki",
    whatYouCanDo: "Co możesz zrobić produkować mniej śladu węglowego?",
    notExist: "Podany miesiąc nie został jeszcze zarejestrowany",
    changeToBusses: "Jeśli możesz, zamień jazdę autem/motorem na komunikację miejską",
    stopAC: "Ogranicz korzystanie z klimatyzacji",
    stopRedMeat: "Ogranicz spożycie mięsa czerwonego",
    ff: "Kupuj mniej masowo produkowanych ubrań",
    bottledWaterChange: "Zamień wodę butelkowaną na pojemniki wielorazowe",
    segregate: "Segreguj śmieci"
}
const en = {
    lang: "en",
    title: "EcoBalance - Detale",
    submitButton: "Register",
    mainPanel: "Main Panel",
    settings: "Settings",
    greeting: "Hello",
    registerMonth: "Register new month",
    statistics: "Statistics",
    support: "Report a bug, suggest a change or ask a question",
    article: "Details from ",
    points: "Carbon footprint score: ",
    veryLow: "Very low",
    low: "Low",
    medium: "Mediocre",
    high: "High",
    veryHigh: "Very high",
    whatYouCanDo: "What can you do to make less carbon footprint?",
    notExist: "This month hasn't been registered yet",
    changeToBusses: "If you can, use public transport instead of car/motorcycle",
    stopAC: "Limit using AC",
    stopRedMeat: "Limit red meat in your diet",
    ff: "Buy less mass-produced clothing",
    bottledWaterChange: "Switch from bottled water to containers you can use multiple times",
    segregate: "Segregate waste"
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