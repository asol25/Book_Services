const $$ = document.querySelectorAll.bind(document);
const $ = document.querySelector.bind(document);

const dialog = $('#dialog-shopping');
const dialogButtonShopping = $('.dialog-button-shopping');

dialogButtonShopping.addEventListener('click', (e) => {
    e.preventDefault();
    dialog.show();
})
