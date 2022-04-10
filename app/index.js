const signUpPopup = document.getElementById('signup-popup')
const loginPopup = document.getElementById('login-popup')
const orderBtn = document.getElementById('order-btn')
const bookBtn = document.getElementById('book-btn')
const fullMenuBtn = document.getElementById('full-menu')
const formToggle = document.getElementsByClassName('form-toggle')
const formClose = document.getElementsByClassName('close-form')
const adminLogout = document.getElementsByClassName('admin-logout')
const logoutAlert = document.getElementById('logout-alert')
const newDishPopup = document.getElementById('new-dish-popup')
const logoutBtns = document.getElementsByClassName('logout');
const filterBtns = document.getElementsByClassName('filter')
const whishlistPopup = document.getElementById('whishlist-alert')


let url = new URL(window.location.href);
let strUrl = window.location.href;
if (url.searchParams.get('category')) {
    let category = url.searchParams.get('category');
    for (const filter of filterBtns) {
        if (category === filter.innerHTML){
            filter.classList.add('active-filter')
        } 
    }
} else if(!url.searchParams.get('category') && strUrl.includes('menu.php')){
    filterBtns[0].classList.add('active-filter');
}

function getCookie(name) {
    return (document.cookie.match('(^|;) *' + name + '=([^;]*)') || [])[2];
}

function togglePopup(btn, popup) {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        popup.classList.toggle('hide-popup');
    })
}
function closePopup(btn, popup) {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        popup.classList.add('hide-popup');
    })
}
function toggleAlert(btn, alert) {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        alert.classList.toggle('hide-popup');
    })
}

if (!getCookie('userId')) {
    togglePopup(orderBtn, signUpPopup);
    togglePopup(bookBtn, signUpPopup);
    togglePopup(fullMenuBtn, signUpPopup);
} else {
    for (const btn of logoutBtns) {
        toggleAlert(btn, logoutAlert)
    }
}
if (signUpPopup) {
    for (const button of formToggle) {
        togglePopup(button, signUpPopup);
        togglePopup(button, loginPopup);
    }
    for (const close of formClose) {
        closePopup(close, signUpPopup);
        closePopup(close, loginPopup);
    }
}

if(logoutAlert){
    for (const close of formClose) {
        closePopup(close, whishlistPopup);
        closePopup(close, logoutAlert);
        closePopup(close, newDishPopup);
    }
}


const addDishBtn = document.getElementById('add-btn');
togglePopup(addDishBtn, newDishPopup);




