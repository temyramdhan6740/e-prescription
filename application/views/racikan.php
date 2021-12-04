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
			<h4 class="header-title">Buat Label Racikan Obat</h4>
			<p class="sub-header">
				Tambah label racikan obat untuk persiapan meracik obat <code>Kecuali jika label racikan tersedia silahkan langsung ke <b>Buat Racikan Obat</b></code>.
			</p>

			<div class="row">
				<div class="col-12">
					<div class="p-2">
						<form class="form-horizontal" role="form" method="post" action="<?= base_url() ?>user/racikan/label/save">
							<input type="hidden" name="label_racikan_kode" value="LABEL<?= date('YmdHis') ?>">
							<div class="form-group row">
								<label class="col-md-4 col-form-label" for="label_racikan_nama">Nama Label Racikan</label>
								<div class="col-md-8">
									<input oninput="uppercase(this)" type="text" id="label_racikan_nama" name="label_racikan_nama" class="form-control" placeholder="Nama Label Racikan..." required>
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
			<h4 class="header-title">Buat Racikan Obat</h4>

			<div class="row">
				<div class="col-12">
					<div class="p-2">
						<form class="form-horizontal" role="form" method="post" action="<?= base_url() ?>user/racikan/save">
							<input type="hidden" name="racikan_kode" value="RAC<?= date('YmdHis') ?>">
							<div class="form-group row">
								<label class="col-md-3 col-form-label" for="label_racikan_kode">Label Racikan</label>
								<div class="col-md-9">
									<select id="label_racikan_kode" name="racikan_label_kode" class="form-control select2">
										<?php foreach ($list_lbl_racikan as $label) { ?>
											<option value="<?= $label->label_racikan_kode ?>"><?= $label->label_racikan_nama ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label" for="racikan_obatalkes_kode">Nama Obat</label>
								<div class="col-md-9">
									<select id="racikan_obatalkes_kode" name="racikan_obatalkes_kode" class="form-control select2" onchange="getStok()">
										<?php foreach ($list_obat as $obat) { ?>
											<option value="<?= $obat->obatalkes_kode ?>"><?= $obat->obatalkes_nama ?></option>
										<?php } ?>
									</select>
									<small id="stokStat" class="form-text text-muted"></small>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label" for="racikan_signa_kode">Ketentuan Pemberian</label>
								<div class="col-md-9">
									<select id="racikan_signa_kode" name="racikan_signa_kode" class="form-control select2">
										<?php foreach ($list_signa as $signa) { ?>
											<option value="<?= $signa->signa_kode ?>"><?= $signa->signa_nama ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label" for="racikan_qty">Qty</label>
								<div class="col-md-9">
									<input type="number" min="1" max="10" id="racikan_qty" name="racikan_qty" class="form-control" placeholder="Qty" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function getStok() {
		stok_kode = $('#racikan_obatalkes_kode').val();
		$.ajax({
			url: '<?= base_url(); ?>user/api/racikan/stok/' + stok_kode,
			success: function (data){
				$('#stokStat').html(data);
			}
		});
	}
</script>
