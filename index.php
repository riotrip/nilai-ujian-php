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
    <title>List Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script>
        function prosesNilai() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("cariNil");
            filter = input.value.toUpperCase();
            table = document.getElementById("daftarNilai");
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
        <h3 class="text-center">List Nilai</h3>
        <div class="my-5">
            <form class="d-flex mb-3" role="search">
                <input class="form-control me-2" onkeyup="prosesNilai()" id="cariNil" type="text" placeholder="Search" aria-label="Search">
            </form>
            <table class="table table-bordered border-dark" id="daftarNilai">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Nilai Matematika</th>
                        <th>Nilai IPA</th>
                        <th>Nilai Bahasa Indonesia</th>
                        <th>Nilai Bahasa Inggris</th>
                        <th>Total Nilai</th>
                        <th>Rata-rata</th>
                        <th>Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * from nilai n, siswa s where s.id = n.id_siswa ORDER BY total DESC");
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        $nama = $data['nama'];
                        $mtk = $data['mtk'];
                        $ipa = $data['ipa'];
                        $ind = $data['ind'];
                        $eng = $data['eng'];
                        $total = $data['total'];
                        $rata = $data['rata'];
                    ?>
                        <tr>
                            <td><?= $nama; ?></td>
                            <td><?= $mtk; ?></td>
                            <td><?= $ipa; ?></td>
                            <td><?= $ind; ?></td>
                            <td><?= $eng; ?></td>
                            <td><?= $total; ?></td>
                            <td><?= $rata; ?></td>
                            <td><?= $i++; ?></td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
            <table class="table table-bordered border-dark">
                <thead>
                    <tr>
                        <th>Nilai Total</th>
                        <th>Rata-rata</th>
                        <th>Matematika</th>
                        <th>IPA</th>
                        <th>Bahasa Indonesia</th>
                        <th>Bahasa Inggris</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = "SELECT AVG(mtk) as r_mtk, AVG(ipa) as r_ipa, AVG(ind) as r_ind, AVG(eng) as r_eng, AVG(total) as r_total, SUM(total) as n_total FROM nilai";
                    $all = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_assoc($all)) {
                        $r_mtk = $row['r_mtk'];
                        $r_ipa = $row['r_ipa'];
                        $r_ind = $row['r_ind'];
                        $r_eng = $row['r_eng'];
                        $r_total = $row['r_total'];
                        $n_total = $row['n_total'];
                    ?>
                        <tr>
                            <td><?= $n_total ?></td>
                            <td><?= $r_total ?></td>
                            <td><?= $r_mtk ?></td>
                            <td><?= $r_ipa ?></td>
                            <td><?= $r_ind ?></td>
                            <td><?= $r_eng ?></td>
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