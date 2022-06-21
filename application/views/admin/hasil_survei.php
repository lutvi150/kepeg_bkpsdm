
     <!--**********************************
            Content body start
        ***********************************-->
     <div class="content-body">
     	<div class="container-fluid">
     		<div class="page-titles">
     			<ol class="breadcrumb">
     				<li class="breadcrumb-item"><a href="javascript:void(0)">Survei </a></li>
     				<li class="breadcrumb-item active"><a href="javascript:void(0)">Hasil Survei</a></li>
     			</ol>
     		</div>
     		<!-- row -->


     		<div class="row">

     			<div class="col-12">
     				<div class="card">
     					<div class="card-header">
     						<h4 class="card-title">Data hasil Survei</h4>
     					</div>
                         <?php if ($this->session->flashdata('success')): ?>
     					<div class="alert alert-success" role="alert">
     						<strong>Success</strong>
                             <p><?=$this->session->userdata('success')?></p>
     					</div>
                         <?php endif;?>
     					<div class="card-body">
							 <div class="alert alert-warning" role="alert">
								 <strong>Pemberitahuan</strong>
								 <ol>
									 <li>1. Untuk Lihat Detail Score Klik score</li>
								 </ol>
							 </div>
     						<div class="col-md-12 row">
                                 <button type="button" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i> Bersihkan Data</button>
     						</div>
     						<div class="table-responsive">
     							<table id="example3" class="display min-w850">
     								<thead>

     									<th>No</th>
     									<th>Nama</th>
     									<th>Nomor Kontak</th>
     									<th>Penilaian</th>
     									<th>Score</th>
										 <th style="width: 10px;">Status</th>

     								</thead>
     								<tbody>
										 <?php foreach ($survei as $key => $value): ?>
										 <tr>
											 <td><?=$key + 1?></td>
											 <td><?=$value->nama?></td>
											 <td><?=$value->nomor_kontak?></td>
											 <td>
												 <?php if ($value->score == null): ?>
													<span class="badge light badge-danger">Belum</span>
													<?php else: ?>
												 <span class="badge light badge-success">Sudah</span>
												 <?php endif;?>
											 </td>
											 <td>
												 <?php if ($value->score == null): ?>
													<span class="badge light badge-danger">Belum</span>
													<?php else: ?>
														<a href="#" class="badge light badge-success" onclick="showScore(<?=$value->id_target?>)">
												 <?=$value->score?></a>
												 <?php endif;?>
											 </td>
											 <td></td>
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

	 </div>
	 <!-- Modal -->
	 <div class="modal fade" id="detail-score" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		 <div class="modal-dialog" role="document">
			 <div class="modal-content">
				 <div class="modal-header">
					 <h5 class="modal-title">Detail Socre</h5>
						 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						 </button>
				 </div>
				 <div class="modal-body">
					 <table class="table">
						 <thead>
							 <th>Kriteria</th>
							 <th>Bintang</th>
							 <th>Score</th>
						 </thead>
						 <tbody class="detail-score">
							 <tr>
								 <td></td>
								 <td></td>
								 <td></td>
							 </tr>
						 </tbody>
					 </table>
				 </div>
				 <div class="modal-footer">
					 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				 </div>
			 </div>
		 </div>
	 </div>
     <script>
		 function showScore (id_target) {
			 $.ajax({
				 type: "POST",
				 url: "<?=base_url('score/detailScore')?>",
				 data: {id_target: id_target},
				 dataType: "JSON",
				 success: function (response) {
					 let html="";
					 response.forEach(element => {
						 html+=`<tr>
								 <td>${element.kriteria}</td>
								 <td></td>
								 <td>${element.score}</td>
							 </tr>`;
					 });
					 $('.detail-score').html(html);
					 $('#detail-score').modal('show');
				 }
			 });
		  }
     </script>
