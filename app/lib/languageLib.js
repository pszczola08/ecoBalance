export function setText(id, array) {
    document.getElementById(id).innerHTML = array[id];
}

export function setValue(id, value, array) {
    document.getElementById(id).setAttribute(value, array[id]);
}

export function setInfoText(id, array) {
    try {
        document.getElementById(id).innerHTML = array[id];
    } catch {
        console.warn(`element ${id} doesn't exist`);
    }
}

export function getLanguage() {
    const userLanguage = navigator.language || navigator.userLanguage;
    return userLanguage.slice(0, 2);
}