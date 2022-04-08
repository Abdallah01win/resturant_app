const signUpPopup = document.getElementById('signup-popup')
const loginPopup = document.getElementById('login-popup')
const orderBtn = document.getElementById('order-btn')
const bookBtn = document.getElementById('book-btn')
const fullMenuBtn = document.getElementById('full-menu') 
const formToggle = document.getElementsByClassName('form-toggle')
const formClose = document.getElementsByClassName('close-form')

function getCookie(name) {
    return (document.cookie.match('(^|;) *'+name+'=([^;]*)')||[])[2];
}

function togglePopup(btn, popup){
    btn.addEventListener('click', (e)=>{
        e.preventDefault();
        popup.classList.toggle('hide-popup');
    })
}
function closePopup(btn, popup){
    btn.addEventListener('click', (e)=>{
        e.preventDefault();
        popup.classList.add('hide-popup');
    })
}

if (!getCookie('userId')) {
    togglePopup(orderBtn, signUpPopup);
    togglePopup(bookBtn, signUpPopup);
    togglePopup(fullMenuBtn, signUpPopup);
}

for (const button of formToggle) {
    togglePopup(button, signUpPopup);
    togglePopup(button, loginPopup);
}
for (const close of formClose) {
    closePopup(close, signUpPopup);
    closePopup(close, loginPopup);
}