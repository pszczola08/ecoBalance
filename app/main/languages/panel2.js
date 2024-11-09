import { setText, getLanguage } from '../../lib/languageLib.js';

const pl = {
    didntRegister: "Nie zarejestrowano jeszcze obecnego miesiąca.",
    registered: "Zarejestrowano już obecny miesiąc."
}
const en = {
    didntRegister: "Current month has't been registered registered yet.",
    registered: "You have registered current month"
}


if(getLanguage() == "pl") {
    var lang = pl;
} else {
    var lang = en;
}

setText("didntRegister", lang);
setText("registered", lang);
