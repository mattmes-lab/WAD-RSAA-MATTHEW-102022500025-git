<?php

$data_armada = [
    [
        "jenis" => "Forklift",
        "nomor" => "FL-2026-012",
        "kapasitas" => "7 Ton",
        "status" => "Tersedia",
        "perawatan" => "15 Okt 2026"
    ],
    [
        "jenis" => "Pick-up",
        "nomor" => "F-4789-JOM",
        "kapasitas" => "1.6 Ton",
        "status" => "Digunakan",
        "perawatan" => "23 Sep 2026"
    ],
    [
        "jenis" => "Troli",
        "nomor" => "TR-099",
        "kapasitas" => "500 Kg",
        "status" => "Dalam Perawatan",
        "perawatan" => "12 Sep 2026"
    ]
];

if (isset($_POST["simpan"])) {

    $data_armada[] = [
        "jenis" => $_POST["jenis"],
        "nomor" => $_POST["nomor"],
        "kapasitas" => $_POST["kapasitas"],
        "status" => $_POST["status"],
        "perawatan" => date("d M Y", strtotime($_POST["perawatan"]))
    ];

    $pesan = "Data armada berhasil ditambahkan!";
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MattMES - Manajemen Armada</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .header {
            background: #1f2937;
            color: white;
            padding: 25px 40px;
        }

        .header h1 {
            margin: 0;
        }

        .header p {
            margin: 8px 0 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
        }

        h2 {
            margin-bottom: 5px;
        }

        .description {
            color: #666;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #374151;
            color: white;
            padding: 14px;
        }

        td {
            padding: 13px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .status {
            padding: 6px 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 13px;
        }

        .tersedia {
            background: #dcfce7;
            color: #166534;
        }

        .digunakan {
            background: #fef3c7;
            color: #92400e;
        }

        .perawatan {
            background: #fee2e2;
            color: #991b1b;
        }

        .form-container {
            background: white;
            padding: 25px;
            margin-top: 30px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-container {
            margin-top: 20px;
        }

        button {
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .btn-save {
            background: #16a34a;
        }

        .btn-reset {
            background: #6b7280;
        }

        .pesan {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

    </style>

</head>

<body>


<div class="header">

    <h1>Sistem Inventaris</h1>

    <p>Modul D - MattMES</p>

</div>


<div class="container">

    <h2>Manajemen Armada Operasional</h2>

    <p class="description">
        Kelola data kendaraan dan alat berat operasional.
    </p>


    <?php if (isset($pesan)) { ?>

        <div class="pesan">
            <?php echo $pesan; ?>
        </div>

    <?php } ?>


    <h3>Daftar Kendaraan dan Alat Berat</h3>


    <table>

        <tr>

            <th>No</th>

            <th>Jenis Armada</th>

            <th>Nomor Seri/Plat</th>

            <th>Kapasitas</th>

            <th>Status</th>

            <th>Jadwal Perawatan</th>

            <th>Aksi</th>

        </tr>


        <?php

        $no = 1;

        foreach ($data_armada as $armada) {

        ?>

            <tr>

                <td>
                    <?php echo $no++; ?>
                </td>

                <td>
                    <?php echo $armada["jenis"]; ?>
                </td>

                <td>
                    <?php echo $armada["nomor"]; ?>
                </td>

                <td>
                    <?php echo $armada["kapasitas"]; ?>
                </td>

                <td>

                    <?php

                    if ($armada["status"] == "Tersedia") {

                        echo '<span class="status tersedia">Tersedia</span>';

                    } elseif ($armada["status"] == "Digunakan") {

                        echo '<span class="status digunakan">Digunakan</span>';

                    } else {

                        echo '<span class="status perawatan">Dalam Perawatan</span>';

                    }

                    ?>

                </td>

                <td>
                    <?php echo $armada["perawatan"]; ?>
                </td>

                <td>

                    <button
                        style="background:#2563eb;"
                        onclick="alert('Fitur Edit')">

                        Edit

                    </button>

                    <button
                        style="background:#dc2626;"
                        onclick="alert('Fitur Hapus')">

                        Hapus

                    </button>

                </td>

            </tr>

        <?php } ?>

    </table>


    <div class="form-container">

        <h3>Form Tambah Armada Baru</h3>


        <form method="POST">


            <div class="form-group">

                <label>Jenis Armada</label>

                <select name="jenis" required>

                    <option value="">
                        -- Pilih Jenis Armada --
                    </option>

                    <option value="Forklift">
                        Forklift
                    </option>

                    <option value="Troli">
                        Troli
                    </option>

                    <option value="Pick-up">
                        Pick-up
                    </option>

                    <option value="Truk">
                        Truk
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label>Nomor Seri / Plat</label>

                <input
                    type="text"
                    name="nomor"
                    placeholder="Contoh: FL-2026-012"
                    required>

            </div>


            <div class="form-group">

                <label>Kapasitas</label>

                <input
                    type="text"
                    name="kapasitas"
                    placeholder="Contoh: 7 Ton"
                    required>

            </div>


            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="">
                        -- Pilih Status --
                    </option>

                    <option value="Tersedia">
                        Tersedia
                    </option>

                    <option value="Digunakan">
                        Digunakan
                    </option>

                    <option value="Dalam Perawatan">
                        Dalam Perawatan
                    </option>

                </select>

            </div>


            <div class="form-group">

                <label>Jadwal Perawatan</label>

                <input
                    type="date"
                    name="perawatan"
                    required>

            </div>


            <div class="button-container">

                <button
                    type="submit"
                    name="simpan"
                    class="btn-save">

                    Simpan Data

                </button>


                <button
                    type="reset"
                    class="btn-reset">

                    Batal

                </button>

            </div>


        </form>

    </div>

</div>


</body>

</html>