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
     							<a href="#"
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
										<tr hidden>
											<td>
												<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												<button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
											</td>
										</tr>
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

     </script>
