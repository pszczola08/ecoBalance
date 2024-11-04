const prefersDarkTheme = window.matchMedia("(prefers-color-scheme: dark)");

if (prefersDarkTheme.matches) {
    document.getElementById("theme").setAttribute("href", "./styleDark.css")
} else {
    document.getElementById("theme").setAttribute("href", "./styleLight.css")
}