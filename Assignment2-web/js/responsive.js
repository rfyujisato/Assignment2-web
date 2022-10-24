//Dynamic navigation menu
function dynamicMenu() {
    var nav = document.getElementById("navigation");
    if(nav.className === "navigation") {
        nav.className += " responsive";
    } else {
        nav.className = "navigation";
    }
}