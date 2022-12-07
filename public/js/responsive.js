
// PAGES & INCLUDES
const NavbarLoaded = document.querySelector(".__NAV__");
let Hamburger = document.querySelector(".__HAMBURGER__");
let Magnifier = document.querySelector(".__NAV__MAGNIFYING");
let NavItems = document.querySelector(".__NAV__ITEMS");
let NavIcons = document.querySelector(".__NAV__ICONS");


if(NavbarLoaded) {
    
    // Toggle hamburger & menu view
    Hamburger.addEventListener("click", e => {

        document.querySelector(".__NAV__").classList.add("bg-dark");

        Hamburger.querySelector('.fa-solid').classList.toggle('fa-bars');
        Hamburger.querySelector('.fa-solid').classList.toggle('fa-xmark');
        if(NavItems.style.display === "none" || NavItems.style.display === "") {
            NavItems.style.display = "flex";
            NavIcons.style.display = "flex";
        } else {
            NavItems.style.display = "none";
            NavIcons.style.display = "none";
        }
    })

    // Toggle magnifying glass & search bar
    Magnifier.addEventListener("click", e => {
        NavItems.style.display = "none";
        NavIcons.style.display = "none";
    })
}


window.addEventListener('resize', e => {
    if(e.currentTarget.innerWidth > 990) {
        NavItems.style.display = "flex";
        NavIcons.style.display = "flex";
    } else {
        NavItems.style.display = "none";
        NavIcons.style.display = "none";
    }
})