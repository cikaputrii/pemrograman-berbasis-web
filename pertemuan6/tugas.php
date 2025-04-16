<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P6T1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-2">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom px-3">
        <a class="navbar-brand d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 256 256" class="align-text-top">
                <rect fill="none" height="256" width="256"/>
                <path d="M224,216a8,8,0,0,1-8,8H72a8,8,0,0,1,0-16H216A8,8,0,0,1,224,216ZM208,100H153.8L110.9,53.3A3.9,3.9,0,0,0,108,52H91.1a11.6,11.6,0,0,0-9.7,5,11.9,11.9,0,0,0-1.7,10.8L90.5,100H65.9L47.1,77.4A4.1,4.1,0,0,0,44,76H26.8a12.1,12.1,0,0,0-9.7,4.8,11.9,11.9,0,0,0-1.8,10.6l14,46.9A35.8,35.8,0,0,0,63.8,164H240a4,4,0,0,0,4-4V136A36,36,0,0,0,208,100Z"/>
            </svg>
            Web Penerbangan                   
        </a>
    </nav>
</div>

<div class="container mt-5">
    <h3>Halo! <small class="text-muted">Selamat Datang</small></h3>
    <p>Silakan mengisi formulir di bawah</p>
</div>

<br>

<?php
$bandaraAsal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$bandaraTujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

ksort($bandaraAsal);
ksort($bandaraTujuan);

function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
?>

<div class="container mt-4">
    <nav class="navbar navbar-dark bg-dark px-3 mt-4">
        <span class="navbar-brand mx-auto mb-0 h4">
            <strong>Form Pendaftaran Rute Penerbangan</strong>
        </span>
    </nav>

    <br>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Maskapai</label>
            <input type="text" class="form-control" name="maskapai" placeholder="Contoh: Garuda Indonesia" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bandara Asal</label>
            <select class="form-select" name="asal" required>
                <?php foreach($bandaraAsal as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Bandara Tujuan</label>
            <select class="form-select" name="tujuan" required>
                <?php foreach($bandaraTujuan as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" name="hargaTiket" placeholder="Contoh: 5000000" min="1" required>
        </div>

        <button type="submit" class="btn btn-outline-dark">Kirim</button>
    </form>
    <br>
</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <?php
        $maskapai = $_POST['maskapai'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $harga = intval($_POST['hargaTiket']);

        $pajakAsal = $bandaraAsal[$asal] ?? 0;
        $pajakTujuan = $bandaraTujuan[$tujuan] ?? 0;
        $totalPajak = $pajakAsal + $pajakTujuan;
        $totalHarga = $harga + $totalPajak;
        $nomor = rand(1000, 9999);
        $tanggal = date("d-m-Y");
    ?>

    <div class="container mt-4">
        <table class="table table-bordered">
            <tbody>
                <tr class="table-dark">
                    <th colspan="2" class="text-center"><strong>Struk Rute Penerbangan</strong></th>
                </tr>
                <tr>
                    <th scope="row">Nomor</th>
                    <td><?= $nomor ?></td>
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td><?= $tanggal ?></td>
                </tr>
                <tr>
                    <th scope="row">Nama Maskapai</th>
                    <td><?= htmlspecialchars($maskapai) ?></td>
                </tr>
                <tr>
                    <th scope="row">Asal Penerbangan</th>
                    <td><?= $asal ?> (Pajak: <?= formatRupiah($pajakAsal) ?>)</td>
                </tr>
                <tr>
                    <th scope="row">Tujuan Penerbangan</th>
                    <td><?= $tujuan ?> (Pajak: <?= formatRupiah($pajakTujuan) ?>)</td>
                </tr>
                <tr>
                    <th scope="row">Harga Tiket</th>
                    <td><?= formatRupiah($harga) ?></td>
                </tr>
                <tr>
                    <th scope="row">Total Pajak</th>
                    <td><?= formatRupiah($totalPajak) ?></td>
                </tr>
                <tr>
                    <th scope="row"><strong>Total Harga Tiket</strong></th>
                    <td><strong><?= formatRupiah($totalHarga) ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>


    </div>
<?php endif; ?>

</body>
</html>
