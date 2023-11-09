<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>
    <?php
    include 'koneksi.php';
    ?>
    <center>
        <h3 style="margin-top: 50px;">Tambah Data Customer</h3>
    </center>
    <div class="container">
        <form action="proses_tambah.php" method="post" name="formtambah">
            <div class="form-group mb-3">
                <div class="form-label">Id</div>
                <input type="text" onkeyup="checkform()" name="id" data-name="id" class="required form-control">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">First Name</div>
                <input type="text" onkeyup="checkform()" name="first_name" data-name="First Name" class="required form-control">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Last Name</div>
                <input type="text" onkeyup="checkform()" name="last_name" data-name="Last Name" class="required form-control">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Email</div>
                <input type="text" onkeyup="checkform()" name="email" data-name="Email" class="required form-control">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Phone</div>
                <input type="text" onkeyup="checkform()" name="phone" data-name="Phone" class="required form-control">
            </div>
            <div class="form-group mb-3">
                <div class="form-label">Address</div>
                <input type="text" onkeyup="checkform()" name="address" data-name="Address" class="required form-control">
            </div>
            <div>
                <input id="submit" type="submit" name="Submit" value="Simpan" disabled="disabled" class="btn btn-primary btn-sm" style="width: 90px;">
            </div>
            </tbody>
            </table>
        </form>
    </div>
    </div>
    <script>
        function checkform() {
            var f = document.forms['formtambah'].elements;
            var fieldsMustBeFilled = true;

            for (var i = 0; i < f.length; i++) {
                if (f[i].value.length == 0)
                    fieldsMustBeFilled = false;
            }

            if (fieldsMustBeFilled) {
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById("submit").disabled = true;
            }
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>