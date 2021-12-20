<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "koma");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}





function registrasi($data) {
	global $conn;
	$namalengkap = mysqli_real_escape_string($conn, $data["nama"]); 
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$email = mysqli_real_escape_string($conn, $data["email"]);
	$telepon = mysqli_real_escape_string($conn, $data["notelp"]);
	$alamat = mysqli_real_escape_string($conn, $data["alamat"]);

	//upload img
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}
	
	
	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
		alert('username sudah terdaftar!')
		</script>";
		return false;
	}
	
	
	
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$namalengkap', '$username', '$password', '$email', '$telepon', '$alamat', '$gambar')");
	
	return mysqli_affected_rows($conn);
	
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

	return $namaFileBaru;
}


?>