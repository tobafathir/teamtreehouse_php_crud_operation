<?php 

include "connection.php";

$siswa=$db->query("select * from siswa");
$data_siswa=$siswa->fetchAll();

foreach ($data_siswa as $key) {
}

if(isset($_POST['search']))
{
    $filter=$_POST['search'];
    // $filter=$db->quote($_POST['search']);
    // First
    // $data=$db->query("select * from siswa where nama=".$filter." or pekerjaan=$filter");
    // $data->execute();
    // var_dump($data->fetchAll());

    // Second
    $search=$db->prepare("select * from siswa where nama=? or pekerjaan=?"); // PDO statement
    $search->bindValue(1,$filter,PDO::PARAM_STR);
    $search->bindValue(2,$filter,pdo::PARAM_STR);
    $search->execute();     //Execution of PDO statement
    $data=$search->fetchAll(); //Result from PDO statement
    var_dump($data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Data Siswa</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6">

        <table class="table table-striped">
  <h1 class="text-info">Data Siswa</h1>
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Pekerjaan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($data_siswa as $key) : ?>
    <tr>
      <td><?php echo $key["nama"]; ?></td>
      <td><?php echo $key["pekerjaan"]; ?></td>
      <td><?php echo $key["nilai"]; ?></td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>

        </div>
    </div>
</div>
<!-- form Cari siswa -->
<div class="container">
    <div class="row">
        <div class="col-6">
        <h3 class="text-info">Cari Data Siswa</h3>
            <form class="from-inline" action="index.php" method="POST">
                <input type="text" class="from-control" name="search" placeholder="nama atau pekerjaan">
                <input type="submit" value="cari">
            </form>

            <form class="mt-2" action="index.php" method="post">
                <input class="btn btn-outline-info" type="submit" value="Tampilkan Semua">
            </form>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>