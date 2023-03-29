<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container-logout">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
            <h2>Data Pengguna Terdaftar</h2>
            <br>
            <table width="100%">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>EMAIL</th>    
            <th>OPSI</th>
        </tr>
                <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($conn,"select * from users");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <th><?php echo $no++; ?></th>
                <th><?php echo $d['username']; ?></th>
                <th><?php echo $d['email']; ?></th>
                <th>
                    <a href="user_edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                    <a href="hapus_user.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </th>
            </tr>
            <?php 
        }
        ?>
              </table>
             
            <div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
            </div>
        </form>
    </div>
</body>
</html>