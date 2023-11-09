<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#kampus-merdeka').DataTable();
        });
    </script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                include "koneksi.php";
                $query = mysqli_query($conn, "SELECT * FROM customer ORDER BY id ASC");
                ?>

                <center>
                    <h2 style="margin-top: 50px;">DATA CUSTOMER:</h2>
                </center>
                <a class="btn btn-info" style="margin-bottom:20px; margin-top:30px;" href="tambah.php?"> + Tambah Data </a>
                <table class="table table-striped table-bordered" id="kampus-merdeka" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th style="width: 130px;">Nama Lengkap</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th style="width: 130px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query) > 0) {
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                        ?> <tr>
                                    <td> <?php echo $data["id"] ?></td>
                                    <td> <?php echo $data['first_name'] . " " . $data['last_name'] ?> </td>
                                    <td> <?php echo $data["email"] ?></td>
                                    <td> <?php echo $data["phone"] ?></td>
                                    <td> <?php echo $data["address"] ?></td>
                                    <td> <?php echo $data["created_at"] ?></td>
                                    <td> <a class="btn btn-danger" style="padding: 5px;" href="proses_delete.php?id=<?php echo $data["id"] ?>" onclick="return confirm('Yakin Data Akan Dihapus?')">Delete</a> &nbsp; <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"] ?>">Edit</a></td>

                                </tr>
                            <?php $no++;
                            } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>