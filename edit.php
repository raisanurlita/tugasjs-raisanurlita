<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <?php
    include 'koneksi.php';

    $customer = mysqli_query($conn, "SELECT * from customer where id='$_GET[id]'");

    while ($c = mysqli_fetch_array($customer)) {
        $id = $c["id"];
        $first_name = $c["first_name"];
        $last_name = $c["last_name"];
        $email = $c["email"];
        $phone = $c["phone"];
        $address = $c["address"];
    }
    ?>
    <center>
        <h3 style="margin-top: 50px;">Edit Data Customer</h3>
    </center>
    <div class="container">
        <form id="form_tambah" action="proses_edit.php?id=<?php echo $id ?>" method="post">
            <div class="form-group mb-3">
                <div class="form-label">Id</div>
                <input type="text" name="id" data-name="id" class="required form-control" disabled value="<?php echo $id ?>">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">First Name</div>
                <input type="text" name="first_name" data-name="F" class="required form-control" value="<?php echo $first_name ?>">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Last Name</div>
                <input type="text" name="last_name" data-name="Nama Belakang" class="required form-control" value="<?php echo $last_name ?>">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Email</div>
                <input type="text" name="email" data-name="Email" class="required form-control" value="<?php echo $email ?>">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Phone</div>
                <input type="text" name="phone" data-name="HP" class="required form-control" value="<?php echo $phone ?>">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Address</div>
                <input type="text" name="address" data-name="Address" class="required form-control" value="<?php echo $address ?>">
            </div>
            <div>
                <input type="submit" name="Submit" value="Simpan" class="btn btn-primary btn-sm" style="width: 90px;" onclick="return confirm('Simpan Perubahan?')">
            </div>
            <script>
                $(document).ready(function() {
                    $('#form_tambah').submit(function(e) {
                        e.preventDefault(); // Mencegah pengiriman form

                        // Menghapus pesan error yang mungkin ada
                        $('.error').remove();

                        // Cek setiap input dengan class "required"
                        $('.required').each(function() {
                            if ($(this).val() === '') {
                                // Mendapatkan nama kolom dari atribut data-name
                                var columnName = $(this).data('name');

                                // Jika input kosong, tambahkan pesan error dan beri warna merah di kolomnya
                                $(this).after('<div class=" form-text error text-danger" style="font-size: 12px;">' + columnName + ' tidak boleh kosong</div>');
                                $(this).css('border-color', 'red');
                            }
                        });

                        // Jika tidak ada input yang kosong, submit form
                        if ($('.error').length === 0) {
                            $(this).unbind('submit').submit();
                        }
                    });

                    // Menghapus pesan error dan warna merah saat input diubah
                    $('.required').keyup(function() {
                        $(this).next('.error').remove();
                        $(this).css('border-color', '');
                    });
                });
            </script>
            </tbody>
            </table>
        </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>