<?php 
 include 'koneksi.php';
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
      
        <div class="container">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
            <h2>Edit Data Pengguna Terdaftar</h2>
            <br>
        <form action="user_edit_aksi.php" method="POST" class="login-email">
            <?php 
      $id = $_GET['id'];              
      $data = mysqli_query($conn, "select * from users where id='$id'");
      while($d = mysqli_fetch_array($data)){
      ?>
            <div class="input-group">
                <input type="text" class="form-control" name="username" value="<?php echo $d['username'] ?>" required="required">
                
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $d['email']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" min="5" placeholder="Kosong Jika tidak ingin di ganti">
            </div>

                <div class="input-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
                <?php
              }

              ?>
            <div class="input-group">
            <a href="dashboard.php" class="btn">Kembali</a>
            </div>
        </form>
    </div>
    </center>
</body>
</html>