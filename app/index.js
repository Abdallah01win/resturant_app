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
const navWishlistBtn = document.getElementById('nav-wishlist');


const checkoutPopup = document.getElementById('checkout-popup');
const checkoutBtn = document.getElementById('checkout');
if (checkoutPopup) {
    checkoutBtn.addEventListener('click', () => {
        checkoutPopup.classList.toggle('hide-popup')
    })
}

let url = new URL(window.location.href);
let strUrl = window.location.href;
if (url.searchParams.get('category')) {
    let category = url.searchParams.get('category');
    for (const filter of filterBtns) {
        if (category === filter.innerHTML) {
            filter.classList.add('active-filter')
        }
    }
} else if (!url.searchParams.get('category') && strUrl.includes('menu.php')) {
    filterBtns[0].classList.add('active-filter');
}

const errorAlert = document.getElementById('error-alert');
const errorMsg = document.getElementById('error-msg');
const error = url.searchParams.get('error');
function showError(msg) {
    errorAlert.classList.toggle('hide-popup');
    errorMsg.innerText = msg;
}

switch (error) {
    case 'stmtfaild':
        showError("Somthing went wrong! pleas try again.");
        break;
    case 'passwordsdontmatch':
        showError("Your passwords don't match! try again.");
        break;

    case 'wrongpassword':
        showError("Wrong password! try again.");
        break;

    case 'usernotfound':
        showError("Email not found! try signing up");
        break;

    case 'emailtaken':
        showError("This email is already in use! try another.");
        break;

    case 'invaliduid':
        showError("Your User Name is invalid! try agaian.");
        break;

    case 'dishalreadyincart':
        showError("Dish is already in your cart!");
        break;

    case 'dishalreadyinwhishlist':
        showError("Dish is already in your wishlist!");
        break;

    case 'accessdenied':
        showError("Access denied");
        break;
}

const alertUser = url.searchParams.get('alert');
switch (alertUser) {
    case 'addedtocart':
        showError("Dish added to your cart");
        break;
    case 'addedtowl':
        showError("Dish added to your wishlist");
        break;
    case 'deletedfromcart':
        showError("Dish deleted from your cart");
        break;
    case 'deletedfromwhishlist':
        showError("Dish deleted from your wishlist");
        break;
    case 'orderplaced':
        showError("Your order is placed.");
        break;
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
    for (const btn of logoutBtns) {
        togglePopup(btn, signUpPopup);
    }
} else {
    for (const btn of logoutBtns) {
        toggleAlert(btn, logoutAlert)
    }
}

if(whishlistPopup){
    togglePopup(navWishlistBtn, whishlistPopup);
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

if(errorAlert){
    for(const close of formClose){
        closePopup(close, errorAlert);
        closePopup(close, logoutAlert);
    }
}

if(checkoutPopup){
    for (const button of formToggle) {
        togglePopup(button, checkoutPopup);
    }
    for(const close of formClose){
        closePopup(close, checkoutPopup);
    }
}

if(whishlistPopup){
    for(const close of formClose){
        closePopup(close, whishlistPopup);
    }
}

const addDishBtn = document.getElementById('add-btn');
if (newDishPopup) {
    togglePopup(addDishBtn, newDishPopup);
    for(const close of formClose){
        closePopup(close, newDishPopup);
    }
}

if (url.searchParams.get('mode') === 'edit') {
    newDishPopup.classList.toggle('hide-popup');
}

const orderStatus = document.getElementsByClassName('orderStatus');
if(orderStatus){
    for(stat of orderStatus){
        let text = stat.innerText;
        switch(text){
            case 'pending': stat.classList.add('pending')
            break;
            case 'denied': stat.classList.add('denied')
            break;
            case 'confirmed': stat.classList.add('confirmed')
            break;
        }
    }
}