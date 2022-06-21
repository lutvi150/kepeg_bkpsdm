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
     						<div class="col-md-12 row">
                                 <a href="<?=base_url('admin/pegawai')?>" class="btn btn-info btn-xs"><i class="fa fa-reply"></i> Kembali </a>
     							<a href="#" class="btn btn-success shadow btn-xs " onclick="addData()"><i
     									class="fa fa-plus"></i> Tambah Surat</a>
     						</div>
     						<div class="table-responsive">
     							<table id="example3" class="display min-w850">
     								<thead>

     									<th>No</th>
     									<th>Nomor</th>
     									<th>Waktu Pelaksanaan</th>
     									<th>Keterangan</th>
     									<th>Lampiran</th>
										 <th>Score</th>
										 <th style="width: 10px;">Status</th>
     									<th>Action</th>

     								</thead>
     								<tbody>
                                         <?php $no = 1;foreach ($surat_tugas as $key => $value): ?>
     									<tr>
     										<td><?=$no++?></td>
     										<td><?=$value->nomor_surat?></td>
     										<td>Mulai <?=$value->mulai . " - " . $value->selesai?> </td>
     										<td><?=$value->keterangan?></td>
     										<td>
                                                 <a href="#" onclick="showDokumen('<?=$value->lampiran?>')" class="badge badge-success">Lampiran</a>
                                             </td>
											 <td>Total Survei : 800 <br>
											 Survei Minimal: 200
											 Rata Rata Score = Total Score/ Suvei Minimal <br>
											 Nilai Rata Rata : 8,9
											</td>
											 <td>
												 <?php if ($value->status == 'terkirim'): ?>
												 <span class="badge badge-success"><i class="fa fa-send"></i>Terkirim</span>
												 <?php elseif ($value->status == 'draft'): ?>
												 <span class="badge badge-danger"><i class="fa fa-ban"></i> Draf</span>
												 <?php endif;?>
											 </td>
     										<td>
                                             <?php if ($value->status == 'draft'): ?>
												<a href="#" onclick="sendSurat('<?=$value->id_surat;?>')" class="badge badge-success" ><i class="fa fa-send"></i>Send</a>
                                                        <a href="#" onclick="editData('<?=$value->id_surat?>')" class="badge badge-warning">Edit</a>
                                                        <a href="#" onclick="deleteData('<?=$value->id_surat?>')" class="badge badge-danger">Delete</a>
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
	 <!-- Modal -->
	 <div class="modal fade" id="show-dokumen" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		 <div class="modal-dialog modal-lg" role="document">
			 <div class="modal-content">
				 <div class="modal-header">
					 <h5 class="modal-title">Lampiran Surat Tugas</h5>
				 </div>
				 <div class="modal-body">
					 <div class="lampiran-dokument">
						 <embed style="width: 100%;height: 500px;" src="<?=base_url()?>uploads/828636107cb6be2758b733de47f18abe.pdf" type="">
					 </div>
				 </div>
				 <div class="modal-footer">
					 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				 </div>
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
		 function showDokumen(param) {
			 console.log(param);
			 $(".lampiran-dokument").html('<embed style="width: 100%;height: 500px;" src="<?=base_url()?>uploads/'+param+'" type="">');
				$("#show-dokumen").modal('show');
		  }
     </script>
