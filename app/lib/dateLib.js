export function getMonthAndYear(language) {
    if(language == "pl") {
        var lang = plMonths
    } else {
        var lang = enMonths
    }

    let date = new Date()

    let monthNum = date.getMonth() + 1

    let month = lang[monthNum]
    let year = date.getFullYear()

    return month + " " + year
}

export const plMonths = {
    1: "Styczeń",
    2: "Luty",
    3: "Marzec",
    4: "Kwiecień",
    5: "Maj",
    6: "Czerwiec",
    7: "Lipiec",
    8: "Sierpień",
    9: "Wrzesień",
    10: "Październik",
    11: "Listopad",
    12: "Grudzień"
};

export const enMonths = {
    1: "January",
    2: "February",
    3: "March",
    4: "April",
    5: "May",
    6: "June",
    7: "July",
    8: "August",
    9: "September",
    10: "October",
    11: "November",
    12: "December"
};
