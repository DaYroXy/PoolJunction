let navbar = document.querySelector('.nav-bar-scroll-change');

if(navbar) {
    document.addEventListener('scroll', e => {
        if(window.scrollY > 100) {
            navbar.classList.add('bg-dark');
        } else {
            if(!navbar.querySelector('.fa-xmark')) {
                navbar.classList.remove('bg-dark');
            }
        }
    })
}