const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generateString(length) {
    let result = '';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

var today = new Date();

var string = today.getFullYear()+''+generateString(3)+''+(today.getMonth()+1)+''+generateString(3)+''+today.getDate()
+''+generateString(3)+''+today.getHours()+''+generateString(3)+''+today.getMinutes()+''+generateString(3)
+''+today.getSeconds();

var el_down = document.getElementById("showmakhuyenmai");
var inputF = document.getElementById("makhuyenmai");

function gfg_Run() {
    inputF.value = string;
    el_down.innerHTML = string;
}