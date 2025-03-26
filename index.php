<?php
// Koneksi ke database 
$host = "localhost";
$user = "root"; 
$pass = "";
$db = "db_bioskop";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data film dari database
$sql = "SELECT * FROM film ORDER BY id_film DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
</head>
<body>
    <h2>Daftar Film</h2>
    
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Sutradara</th>
            <th>Tahun Rilis</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['id_film']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['sutradara']; ?></td>
            <td><?= $row['tahun_rilis']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php

mysqli_close($conn);
?>
