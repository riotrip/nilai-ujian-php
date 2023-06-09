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
    <title>Input Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

    <?php
    include('navbar.php');
    ?>

    <div class="container py-5">
        <div class="container">
            <h3 class="text-center">Masukkan Nilai</h3>
            <form action="function.php" method="post">
                <div class="container">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <select id="nama" name="nama" class="form-control" required>

                            <?php
                            $query = mysqli_query($con, "SELECT * from siswa");
                            while ($fetch = mysqli_fetch_array($query)) {
                                $nama = $fetch['nama'];
                                $id = $fetch['id'];
                            ?>

                                <option value="<?= $id; ?>"><?= $nama; ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mtk" class="form-label">Nilai Matematika</label>
                        <input type="number" min="0" max="100" step="0.01" name="mtk" class="form-control" id="mtk" placeholder="Matematika" required>
                    </div>
                    <div class="mb-3">
                        <label for="ipa" class="form-label">Nilai IPA</label>
                        <input type="number" min="0" max="100" step="0.01" name="ipa" class="form-control" id="ipa" placeholder="IPA" required>
                    </div>
                    <div class="mb-3">
                        <label for="ind" class="form-label">Nilai Bahasa Indonesia</label>
                        <input type="number" min="0" max="100" step="0.01" name="ind" class="form-control" id="ind" placeholder="Bahasa Indonesia" required>
                    </div>
                    <div class="mb-3">
                        <label for="eng" class="form-label">Nilai Bahasa Inggris</label>
                        <input type="number" min="0" max="100" step="0.01" name="eng" class="form-control" id="eng" placeholder="Bahasa Inggris" required>
                    </div>
                    <input type="hidden" name="rata" id="rata">
                    <button class="btn btn-primary" name="inputnilai">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</html>