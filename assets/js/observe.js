const header = document.querySelector(".nb");
const welcome = document.querySelector(".welcome");
const about = document.querySelector(".about");
const accounts = document.querySelector(".accounts");
const fraud = document.querySelector(".fraud");
const card = document.querySelector(".Gullcard");

const welcomeOptions = {
    rootMargin: "320px 0px 0px 0px"
};
const aboutOptions = {
    rootMargin: "-100px 0px 0px 0px"
};
const accountsOptions = {
    rootMargin: "-100px 0px 0px 0px"
};
const fraudOptions = {
    rootMargin: "-100px 0px 0px 0px"
};

const welcomeObserver = new IntersectionObserver(function(
    entries, 
    welcomeObserver
) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            header.classList.add("nav-scrolled");
            card.classList.add("nav-scrolled-card");
        } else {
            header.classList.remove("nav-scrolled");
            card.classList.remove("nav-scrolled-card");
        }
    });
}, 
welcomeOptions);

const aboutObserver = new IntersectionObserver(function(
    entries, 
    aboutObserver
) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            header.classList.remove("nav-scrolled");
        } else {
            header.classList.add("nav-scrolled");
        }
    });
}, 
aboutOptions);

const accountsObserver = new IntersectionObserver(function(
    entries, 
    accountsObserver
) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            header.classList.add("nav-scrolled");
        } else {
            header.classList.remove("nav-scrolled");
        }
    });
}, 
accountsOptions);

const fraudObserver = new IntersectionObserver(function(
    entries, 
    fraudObserver
) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            header.classList.remove("nav-scrolled");
        } else {
            header.classList.add("nav-scrolled");
        }
    });
}, 
fraudOptions);
                      
welcomeObserver.observe(welcome);

aboutObserver.observe(about);

accountsObserver.observe(accounts);

fraudObserver.observe(fraud);