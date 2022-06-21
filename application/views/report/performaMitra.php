
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan</title>
</head>
<style>
	body {
		font-size: smaller;
	}

	table {
		white-space: nowrap;
		border-spacing: 0;
		border-collapse: collapse;
	}

	td {
		padding: 5px;
		border: 1px solid rgb(0, 0, 0);
		vertical-align: middle;
		white-space: nowrap;
	}

	.noline {
		padding: 0px;
		border: 0px solid rgb(0, 0, 0);
		vertical-align: middle;
		white-space: nowrap;
	}

	.title-table td {
		text-align: center;
		font-weight: bold;
	}

</style>

<body>
	<table style="width: 100%;white-space: nowrap;" class="table text-center">
		<tr>
			<td class="noline" style="width: 100px;" rowspan="5">
				<img style="width: 100px;" src="<?=base_url();?>assets/images/logo.svg" alt="">
			</td>
			<td class="noline" colspan="2" style="text-align: center;font-weight: bold;font-size:20px">
				BADAN PUSAT STATISTIK
			</td>
		</tr>
		<tr>
			<td colspan="2" class="noline" style="text-align: center;font-weight: bold;font-size:20px">REPUBLIK INDONESIA</td>
		</tr>
		<!-- <tr>
			<td colspan="2" class="noline" style="text-align: center;font-weight: bold;font-size:20px"></td>
		</tr>
		<tr>
			<td colspan="2" class="noline" style="text-align: center;font-size: 10px;">Jl. Sudirman No.137 Lima Kaum
				Batusangkar Telp.
				(0752) 71150, 574221, 71890 Fax. (0752) 71879</td>
		</tr>
		<tr style="font-size: smaller;font-weight: 10px;" class="noline">
			<td style="text-align: center;font-size: 10px;" class="noline">Website : www.iainbatusangkar.ac.id</td>
			<td style="text-align: center;font-size: 10px;" class="noline">Email : info@iainbatusangkar.ac.id</td>
		</tr> -->
	</table>
	<hr>
	<br>
	<br>

	<table style="width: 100%;" class="noline">
		<tr>
			<td class="noline" style="text-align: center;font-weight: bold;text-transform: uppercase;"><?=$title?></td>
		</tr>
		<!-- <tr>
			<td class="noline" style="text-align: center;">Nomor: 819/ln</td>
		</tr> -->
		<tr>
			<td class="noline" style="height: 1cm;"></td>
		</tr>

	</table>
	<br>
	<table style="width: 100%;">
		<tr style="background-color: rgb(110, 103, 103);">
			<td>No.</td>
			<td>Nama Mitra</td>
			<td>Email</td>
			<td>No. Kontak</td>
			<td>Score</td>
		</tr>
		<?php foreach ($mitra as $key => $value): ?>
		<tr>
			<td><?=$key + 1;?></td>
			<td><?=$value->nama?></td>
			<td><?=$value->email?></td>
			<td><?=$value->nomor_kontak?></td>
			<td><?=round($value->score, 2)?></td>
		</tr>
		<?php endforeach;?>
	</table>
</body>


</html>
