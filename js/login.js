const formlog = document.querySelector('#formlog');

formlog.addEventListener('submit', function (e) {
    e.preventDefault();

    uname = formlog.elements.username.value,
    pass = formlog.elements.password.value,

   check(uname, pass);
   uname = '';
   pass = '';
});


function check(uname, pass){
    if (uname === '') {
        alert("username tidak boleh kosong");
    }else if (pass === '') {
        alert("password tidak boleh kosong");
    }
}