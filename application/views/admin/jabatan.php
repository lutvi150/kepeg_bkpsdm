     <!--**********************************
            Content body start
        ***********************************-->
     <div class="content-body">
     	<div class="container-fluid">
     		<div class="page-titles">
     			<ol class="breadcrumb">
     				<li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
     				<li class="breadcrumb-item active"><a href="javascript:void(0)">Jabatan</a></li>
     			</ol>
     		</div>
     		<!-- row -->


     		<div class="row">

     			<div class="col-12">
     				<div class="card">
     					<div class="card-header">
     						<h4 class="card-title">Daftar Jabatan Tersedia</h4>
     					</div>
     					<div class="card-body">
     						<div class="alert alert-warning" role="alert">
     							<strong>Info</strong>
     							<p>Dasar Entri Kuata Jabatan Adalah ANJAB dan ABK</p>
     						</div>
     						<div class="col-md-12 row">
     							<a href="#" onclick="showModal();"
     								class="btn btn-success shadow btn-xs "><i class="fa fa-plus"></i> Tambah Jabatan</a>

     						</div>
     						<div class="table-responsive">
     							<table id="data-pegawai" class="display min-w850">
     								<thead>
     									<tr>
     										<th>No</th>
     										<th>NAMA JABATAN</th>
     										<th>KUATA</th>
     										<th>TERISI</th>
     										<th>SISA</th>
     										<th>Action</th>
     									</tr>
     								</thead>
									<tbody>

									</tbody>
     							</table>
     						</div>
     					</div>
     				</div>
     			</div>

     		</div>
     	</div>
	 <!-- Modal -->

	<div class="modal fade" id="modal-crud" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Jabatan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
					  <label for="">Nama Jabatan</label>
					  <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" placeholder="" aria-describedby="helpId">
					  <small id="helpId" class="text-error enama_jabatan"></small>
					</div>
					<div class="form-group">
					  <label for="">Kuata</label>
					  <input type="text" name="kuata" id="kuata" class="form-control" placeholder="" aria-describedby="helpId">
					  <small id="helpId" class="text-error ekuata"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="button" onclick="storeData();" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	 </div>
     <!--**********************************
            Content body end
        ***********************************-->

     <script>
		$("#data-pegawai").DataTable({
			"processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('admin/get_jabatan') ?>",
                "type": "POST"
            },


            "columnDefs": [
            {
                "targets": [ 0 ],
                "orderable": false,
            },
			{
                "targets": [ 5 ],
                "mRender": function (data, type, row) {
                    return `
												<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												<button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>`;
                }
            }
            ],

		});
		function showModal() {
			localStorage.setItem('url','<?=base_url('Admin/storeJabatan')?>');
			// $(".modal-title").text("Tambah Jabatan");
			$("#modal-crud").modal("show");
		 }
		 function storeData() {

			$.ajax({
				type: "POST",
				url: localStorage.getItem('url'),
				data: {nama_jabatan:$("#nama_jabatan").val(),kuata:$("#kuata").val()},
				dataType: "JSON",
				success: function (response) {
					if (response.status=='validation') {

					}
				},error:function(){
					swal('Gagal','Something went wrong','error');
				}
			});
		  }
     </script>
