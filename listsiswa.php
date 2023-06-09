<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Rio Tri Prayogo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script>
        function prosesSiswa() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("cariSis");
            filter = input.value.toUpperCase();
            table = document.getElementById("daftarSiswa");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body>

    <?php
    include('navbar.php');
    ?>

    <div class="container py-5">
        <h3 class="text-center">List Siswa</h3>
        <div class="my-5">
            <form class="d-flex mb-3" role="search">
                <input class="form-control me-2" onkeyup="prosesSiswa()" id="cariSis" type="text" placeholder="Search" aria-label="Search">
            </form>
            <table class="table table-bordered border-dark" id="daftarSiswa">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>NIS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * from siswa");
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        $nama = $data['nama'];
                        $alamat = $data['alamat'];
                        $tgl_lahir = $data['tgl_lahir'];
                        $nis = $data['nis'];
                    ?>
                        <tr>
                            <td><?= $nama; ?></td>
                            <td><?= $alamat; ?></td>
                            <td><?= $tgl_lahir; ?></td>
                            <td><?= $nis; ?></td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</html>