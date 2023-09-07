<?= $this->extend('layouts/template.php') ?>

<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.border-table{
			font-family: Arial, Helvetica, sans-serif;
			width: 100%;
			border-collapse: collapse;
			text-align: center;
			font-size: 12px;
		}

		.border-table th{
			border: 1 solid #000;
			font-weight: bold;

		}

		.border-table td{
			border: 1 solid #000;
		}
	</style>
</head>
<body>
	<table align="center" class="border-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>No Telp</th>
                        <th>ID Lever User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $p) : ?>
                        <tr>
                            <td><?= $p->NAMA ?></td>
                            <td><?= $p->NIP ?></td>
                            <td><?= $p->TELP ?></td>
                            <td><?= $p->USERLEVELID ?></td>
                        
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
</body>
</html>