<html>
<head>
	<title>SIMPLE ADDITIVE WEIGHTING</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Hasil Perankingan SIMPLE ADDITIVE WEIGHTING.xls");
	?>
 
	<center>
		<h1>Hasil Perankingan <br/> SISWA IPA YANG LAYAK MENGIKUTI SNMPTN</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>NO</th>
            <th>Nama</th>
            <th>Hasil</th>
            <th>Rangking</th>
        </tr>
    <?php
    $no=1;
include '../src/koneksi.php';
              $rank = 1;
              $queryT = mysqli_query($koneksi, "SELECT * FROM hasil ORDER BY hasil DESC");
              while($dataT = mysqli_fetch_array($queryT)){
            ?>
            <tbody>
              <tr>
                 <td><?= $no++ ?></td>
                <td><?= $dataT['nama_siswa'] ?></td>
                <td><?= $dataT['hasil'] ?></td>
                <td><?= $rank++ ?></td>
              </tr>
              <?php }

              $maxHasil = mysqli_query($koneksi, "SELECT max(hasil) as hasil FROM hasil");
              $hasilMax = mysqli_fetch_array($maxHasil);
              ?> 
	</table>
</body>
</html>