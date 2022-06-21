     <link rel="stylesheet"
     	href="<?=base_url();?>assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
     <!--**********************************
            Content body start
        ***********************************-->
     <div class="content-body">
     	<div class="container-fluid">
     		<div class="page-titles">
     			<ol class="breadcrumb">
     				<li class="breadcrumb-item"><a href="javascript:void(0)">Surat </a></li>
     				<li class="breadcrumb-item active"><a href="javascript:void(0)">Surat Tugas</a></li>
     			</ol>
     		</div>
     		<!-- row -->


     		<div class="row">

     			<div class="col-12">
     				<div class="card">
     					<div class="card-header">
     						<h4 class="card-title">Surat Tugas</h4>
     					</div>
                         <?php if ($this->session->flashdata('success')): ?>
     					<div class="alert alert-success" role="alert">
     						<strong>Success</strong>
                             <p><?=$this->session->userdata('success')?></p>
     					</div>
                         <?php endif;?>
     					<div class="card-body">

     						<div class="table-responsive">
     							<table id="example3" class="display min-w850">
     								<thead>

     									<th>No</th>
     									<th>Nama Settingan</th>
     									<th>Action</th>

     								</thead>
     								<tbody>
                                         <?php $no = 1;foreach ($setting as $key => $value): ?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$value->setting_name?></td>
												<td>
													<?php if ($value->setting_name == 'wa'): ?>
														<div class="custom-control custom-switch">
  <input type="checkbox" name="sms" value="<?=$value->setting_value?>" onclick="configSms(<?=$value->id?>)" class="custom-control-input" <?=$value->setting_value == 1 ? "checked" : "";?>  id="customSwitches">
  <label class="custom-control-label" for="customSwitches">Aktifkan Whatsapp</label>
</div>
														<?php else: ?>
															<input type="text" class="form-control" onkeyup="changeLimit(<?=$value->id?>)" name="limit" id="limit" value="<?=$value->setting_value?>">
															<?php endif;?>
												</td>
											</tr>
                                         <?php endforeach;?>
     								</tbody>
     							</table>
     						</div>
     					</div>
     				</div>
     			</div>

     		</div>
     	</div>
     </div>
     <!--**********************************
            Content body end
        ***********************************-->

     <!-- Modal -->
     <div class="modal fade" id="tambah-surat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
     	aria-hidden="true">
     	<div class="modal-dialog" role="document">
     		<div class="modal-content">
     			<form action="<?=base_url('admin/simpanSuratTugas')?>" enctype="multipart/form-data" method="post">
     				<div class="modal-header">
     					<h5 class="modal-title">Surat Tugas</h5>
     				</div>
     				<div class="modal-body">
     					<input type="text" name="id_user" hidden value="<?=$id_user?>">
     					<div class="form-group">
     						<label for="">Nomor Surat</label>
     						<input type="text" name="nomor_surat" required id="nomor_surat" class="form-control"
     							placeholder="" aria-describedby="helpId">
     						<small id="helpId" class="text-muted"></small>
     					</div>
     					<div class="form-group">
     						<label for="">Waktu Pelaksanaan</label>
     						<div class="row">

     							<input type="text" onclick="countDurasi()" name="mulai" id="mulai" required class="form-control col-md-6"
     								placeholder="mulai" aria-describedby="helpId">
     							<input type="text" onclick="countDurasi()" name="selesai" id="selesai" required class="form-control col-md-6"
     								placeholder="selesai">
     						</div>
     						<small id="helpId" class="text-muted"></small>
     					</div>
     					<div class="form-group">
     						<label for="">Lama Pelaksanaan</label>
     						<input type="text" name="durasi" id="durasi" readonly class="form-control" placeholder=""
     							aria-describedby="helpId">
     						<small id="helpId" class="text-muted"></small>
     					</div>
     					<div class="form-group">
     						<label for="">Keterangan</label>
     						<textarea onkeyup="countDurasi()" name="keterangan" required class="form-control" id="keterangan" cols="30"
     							rows="3"></textarea>
     						<small id="helpId" class="text-muted"></small>
     					</div>
     					<div class="form-group">
     						<label for="">Lampiran</label>
     						<input type="file" name="lampiran" required id="" class="form-control" placeholder=""
     							aria-describedby="helpId">
     						<small id="helpId" class="text-muted"></small>
     					</div>
     				</div>
     				<div class="modal-footer">
     					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
     					<button type="submit" class="btn btn-primary">Simpan</button>
     				</div>
     			</form>
     		</div>
     	</div>
     </div>
	 <!-- Modal -->
	 <div class="modal fade" id="modal-konfirmasi-kirim" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		 <div class="modal-dialog" role="document">
			 <div class="modal-content">
				 <form action="<?=base_url('admin/suratTugasKirim')?>" method="post">
				 <div class="modal-header">
					 <h5 class="modal-title">Konfirmasi</h5>
				 </div>
				 <div class="modal-body">
					 <input type="text" name="id_surat" hidden class="id_surat_kirim">
					 <input type="text" name="id_user" hidden value="<?=$id_user?>">
					 Yakin akan kirim surat tugas ?
				 </div>
				 <div class="modal-footer">
					 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					 <button type="submit" class="btn btn-primary">Ya</button>
				 </div></form>
			 </div>
		 </div>
	 </div>
     <script src="<?=base_url();?>assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
     <script src="<?=base_url();?>assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
     <script>
     	function addData() {
     		$("#tambah-surat").modal('show');
     	}
     	$("#mulai").datetimepicker({
     		format: 'YYYY-MM-DD'
     	});
     	$("#selesai").datetimepicker({
     		format: 'YYYY-MM-DD'
     	});
		 function sendSurat(params) {
			 $(".id_surat_kirim").val(params);
			 $("#modal-konfirmasi-kirim").modal('show');
		 }
     	function countDurasi() {
     		let mulai = $("#mulai").val();
     		let selesai = $("#selesai").val();
     		let durasi = moment.duration(moment(selesai).diff(moment(mulai)));
     		$("#durasi").val(durasi.asDays() + " hari");
     	}
		 function changeLimit(id) {
			 let limit = $("#limit").val();
			 $.ajax({
				 type: "POST",
				 url: "<?=base_url('ApiData/changeLimit')?>",
				 data: {
					 id: id,
					 limit: limit
				 },
				 dataType: "JSON",
				 success: function (response) {

				 }
			 });
		  }
		  function configSms(id) {
			  let sms= $("#customSwitches").val();
			  $.ajax({
				  type: "POST",
				  url: "<?=base_url('ApiData/configSms')?>",
				  data: {
					  id: id,
					  sms: sms
				  },
				  dataType: "JSON",
				  success: function (response) {

				  }
			  });
		   }
     </script>
