const form = document.querySelector('#formreg');

  form.addEventListener('submit', function (e) {

    e.preventDefault();

    nama = form.elements.nama.value,
    username = form.elements.username.value,
    password = form.elements.password.value,
    email = form.elements.email.value,
    konfPass = form.elements.konfirmPass.value,
    notelp = form.elements.notelp.value,
    alamat = form.elements.alamat.value,
    check(username, password, konfPass, nama, email, alamat, notelp);

    nama = '';
    username = '';
    konfPass = '';
    password = '';
    email =  '';
    notelp = '';
    alamat ='';
});

const check = (username, password, konfPass, nama, email, alamat, notelp) =>  {
    if (nama === '') {
        alert("nama tidak boleh kosong");
    }else if (username === '') {
        alert("username tidak boleh kosong");
    }else if (password === '' || password != konfPass) {
        alert("Silahkan isi password dengan benar!");
    }else if (email === '') {
        alert("email tidak boleh kosong");
    }else if (notelp === '') {
        alert("notelp tidak boleh kosong");
    }else if (alamat === '') {
        alert("alamat tidak boleh kosong");
    }else if(document.getElementById("cek").checked == false){
        alert("silahkan centang ketentuannya.");
    }else{
        window.location.href='login.php';
    }
}