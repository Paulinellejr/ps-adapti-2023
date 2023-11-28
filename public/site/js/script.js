let darkmode = false;

const isdarkmode = localStorage.getItem("darkmode");

if (isdarkmode) {
    darkmode = JSON.parse(isdarkmode);
    aplicartema();
}

function aplicartema() {
    const body = document.body;
    if (darkmode) {
        body.classList.add("dark");
    } else {
        body.classList.remove("dark");
    }
}

function toggleDarkMode() {
    darkmode = !darkmode;
    localStorage.setItem("darkmode", darkmode);
    aplicartema();
}
