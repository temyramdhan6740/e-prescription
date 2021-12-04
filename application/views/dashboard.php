<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="page-title"><?= $title ?></h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
					<li class="breadcrumb-item active"><?= $title ?></li>
				</ol>
			</div>

		</div>
	</div>
</div>
<div class="row">

	<div class="col-md-6">
		<div class="card-box">
			<h4 class="header-title">Transaksi Resep Obat (Racikan)</h4>

			<div class="row">
				<div class="col-12">
					<div class="p-2">
						<form class="form-horizontal" role="form" method="post" action="<?= base_url() ?>user/transaksi/save">
							<input type="hidden" name="transaksi_kode" value="TRA<?= date('YmdHis') ?>">
							<input type="hidden" name="transaksi_jenis_racikan" value="RACIKAN">
							<div class="form-group row">
								<label class="col-md-3 col-form-label" for="transaksi_nama">Nama</label>
								<div class="col-md-9">
									<input type="text" oninput="uppercase(this)" id="transaksi_nama" name="transaksi_nama" class="form-control" placeholder="Nama Transaksi..." required>
								</div>
							</div>
							<!-- Racikan -->
							<div class="form-group row racikan">
								<label class="col-md-3 col-form-label" for="transaksi_racikan_kode">Nama Racikan</label>
								<div class="col-md-9">
									<select id="transaksi_racikan_kode" name="transaksi_racikan_kode" class="form-control select2">
										<?php foreach ($list_racikan as $racikan) { ?>
											<option value="<?= $racikan->racikan_label_kode ?>"><?= $racikan->label_racikan_nama ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card-box">
			<h4 class="header-title">Transaksi Resep Obat (Non Racikan)</h4>

			<div class="row">
				<div class="col-12">
					<div class="p-2">
						<form class="form-horizontal" role="form" method="post" action="<?= base_url() ?>user/transaksi/save">
							<input type="hidden" name="transaksi_kode" value="TRA<?= date('YmdHis') ?>">
							<input type="hidden" name="transaksi_jenis_racikan" value="NON RACIKAN">
							<div class="form-group row">
								<label class="col-md-3 col-form-label" for="transaksi_nama">Nama</label>
								<div class="col-md-9">
									<input type="text" oninput="uppercase(this)" id="transaksi_nama" name="transaksi_nama" class="form-control" placeholder="Nama Transaksi..." required>
								</div>
							</div>
							<!-- Non Racikan -->
							<div class="form-group row non-racikan">
								<label class="col-md-3 col-form-label" for="transaksi_obatalkes_kode">Nama Obat</label>
								<div class="col-md-9">
									<select id="transaksi_obatalkes_kode" name="transaksi_obatalkes_kode" class="form-control select2" onchange="getStok()">
										<?php foreach ($list_obat as $obat) { ?>
											<option value="<?= $obat->obatalkes_kode ?>"><?= $obat->obatalkes_nama ?></option>
										<?php } ?>
									</select>
									<small id="stokStat" class="form-text text-muted"></small>
								</div>
							</div>
							<div class="form-group row non-racikan">
								<label class="col-md-3 col-form-label" for="transaksi_signa_kode">Ketentuan Pemberian</label>
								<div class="col-md-9">
									<select id="transaksi_signa_kode" name="transaksi_signa_kode" class="form-control select2">
										<?php foreach ($list_signa as $signa) { ?>
											<option value="<?= $signa->signa_kode ?>"><?= $signa->signa_nama ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group row non-racikan">
								<label class="col-md-3 col-form-label" for="transaksi_qty">Qty</label>
								<div class="col-md-9">
									<input type="number" min="1" max="10" id="transaksi_qty" name="transaksi_qty" class="form-control" placeholder="Qty" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="card-box">
			<h4 class="header-title">List Transaksi Resep Obat</h4>

			<div class="row">
				<div class="col-12">
					<div class="p-2 table-responsive">
						<table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Jenis Racikan</th>
									<th>Tanggal</th>
								</tr>
							</thead>

							<tbody>
								<?php foreach ($list_transaksi as $transaksi) { ?>
									<tr>
										<td><?= $transaksi->transaksi_nama ?></td>
										<td><?= $transaksi->transaksi_jenis_racikan ?></td>
										<td><?= $transaksi->created_date ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
	function GetDynamicTextBox(value) {
		return '<label class="col-form-label" for="nama_obat">Nama Obat</label>' +
			'<select id="nama_obat" name="nama_obat[]" class="form-control select2">' +
			<?php foreach ($list_obat as $obat) { ?> '<option value="<?= $obat->obatalkes_kode ?>"><?= $obat->obatalkes_nama ?></option>' +
			<?php } ?> '</select>' +
			'<input type="button" value="Remove" onclick = "RemoveTextBox(this)" class="btn btn-secondary btn-block btn-xs rounded-0" />'
	}

	function AddTextBox() {
		var div = document.createElement('DIV');
		div.setAttribute('class', "col-md-6");
		div.innerHTML = GetDynamicTextBox("");
		document.getElementById("itemRacikan").appendChild(div);
	}

	function RemoveTextBox(div) {
		document.getElementById("itemRacikan").removeChild(div.parentNode);
	}

	function RecreateDynamicTextboxes() {
		var values = eval('<%=Values%>');
		if (values != null) {
			var html = "";
			for (var i = 0; i < values.length; i++) {
				html += "<div>" + GetDynamicTextBox(values[i]) + "</div>";
			}
			document.getElementById("itemRacikan").innerHTML = html;
		}
	}
	window.onload = OnloadJenisRacikan;
</script>
