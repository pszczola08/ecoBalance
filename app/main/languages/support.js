import { setText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Zgłoś błąd/sugestię/pytanie",
    mainPanel: "Panel Główny",
    settings: "Ustawienia",
    greeting: "Cześć",
    registerMonth: "Zarejestruj nowy miesiąc",
    statistics: "Statystyki",
    support: "Zgłoś problem, zasugeruj zmianę lub zadaj pytanie",
    type: "Typ zgłoszenia: ",
    choose: "Wybierz typ zgłoszenia",
    bug: "Błąd",
    suggestion: "Sugestia",
    question: "Pytanie",
    email: "Podaj swój adres e-mail: ",
    content: "Podaj dokładny opis...",
    submit: "Prześlij"
}
const en = {
    lang: "en",
    title: "EcoBalance - Report bug/suggestion/question",
    mainPanel: "Main Panel",
    settings: "Settings",
    greeting: "Hello",
    registerMonth: "Register new month",
    statistics: "Statistics",
    support: "Report a bug, suggest a change or ask a question",
    type: "Report type: ",
    choose: "Choose report type",
    bug: "Bug",
    suggestion: "Suggestion",
    question: "Question",
    email: "Your e-mail address: ",
    content: "Describe everything...",
    submit: "Send"
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
    if(counter > 1) {
        setText(String(nameId), lang)
    }
    counter++;
}