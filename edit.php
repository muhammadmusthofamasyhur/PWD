<?php
// Memanggil file koneksi.php
require 'config.php'; // Make sure config.php is correctly included

// Perkondisian untuk mengecek apakah tombol submit sudah ditekan.
if (isset($_POST['update'])) {
    $id = intval($_POST['id']); // Pastikan id adalah integer
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $institusi = mysqli_real_escape_string($con, $_POST['institusi']);
    $negara = mysqli_real_escape_string($con, $_POST['negara']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';

    // Syntax untuk mengupdate data user berdasarkan id
    $query = "UPDATE users SET 
        name='$name', 
        email='$email', 
        institusi='$institusi', 
        negara='$negara', 
        alamat='$alamat'";

    if ($password) {
        $query .= ", password='$password'";
    }

    $query .= " WHERE id='$id'";
    
    // Execute the query and check for errors
    if (mysqli_query($con, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Mengambil id dari url
$id = intval($_GET['id']); // Pastikan id adalah integer
$result = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
$user_data = mysqli_fetch_array($result);

if ($user_data) {
    $nama = $user_data['name'];
    $email = $user_data['email'];
    $institusi = $user_data['institusi'];
    $negara = $user_data['negara'];
    $alamat = $user_data['alamat'];
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <a href="index.php">Home</a>
    <br /><br />
    <form name="update_user" method="post" action="">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" value="<?php echo htmlspecialchars($nama); ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"></td>
            </tr>
            <tr>
                <td>Institusi</td>
                <td><input type="text" name="institusi" value="<?php echo htmlspecialchars($institusi); ?>"></td>
            </tr>
            <tr>
                <td>Negara</td>
                <td><input type="text" name="negara" value="<?php echo htmlspecialchars($negara); ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>"></td>
            </tr>
            <tr>
                <td>Password (kosongkan jika tidak ingin mengubah)</td>
                <td><input type="password" name="password" placeholder="Masukkan password baru"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
