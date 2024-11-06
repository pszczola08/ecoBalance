import { setText, setInfoText, getLanguage, setValue } from '../../lib/languageLib.js';

const pl = {
    lang: "pl",
    title: "EcoBalance - Panel Główny"
}
const en = {
    lang: "en",
    title: "EcoBalance - Main Panel"
}


if(getLanguage() == "pl") {
    var lang = pl;
} else {
    var lang = en;
}

document.documentElement.lang = lang.lang;
document.title = lang.title;