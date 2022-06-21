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
                            <div class="card-body">
                                <div class="col-md-12 row">
                            <!-- <a href="<?=base_url('admin/tambah_pegawai')?>"class="btn btn-success shadow btn-xs " ><i class="fa fa-plus" ></i> Tambah Data</a> -->
                                </div>
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor</th>
                                                <th>Waktu Pelaksanaan</th>
                                                <th>Keterangan</th>
                                                <th>Lampiran</th>
                                                <th>Action</th>
                                            </tr>
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
     										<td>
												 <?php if ($value->status_available == false): ?>
													<a href="#" onclick="alertTelatJadwal()" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i>Jadwal Habis</a>
													<?php else: ?>
                                                 <a href="<?=base_url('user/surveiStart/' . $value->id_surat)?>" class="btn btn-success btn-xs"><i class="fa fa book"></i> Survei</a>
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
<div class="modal fade" id="modal-telat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Maaf</h5>
			</div>
			<div class="modal-body">
				Maaf Jadwal survei anda sudah habis, dan aplikasi sudah tutup untuk melaksanakan suvei
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
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
<script>
	function alertTelatJadwal() {
		$("#modal-telat").modal('show');
	 }
	 function showDokumen(param) {
			 console.log(param);
			 $(".lampiran-dokument").html('<embed style="width: 100%;height: 500px;" src="<?=base_url()?>uploads/'+param+'" type="">');
				$("#show-dokumen").modal('show');
		  }
</script>
