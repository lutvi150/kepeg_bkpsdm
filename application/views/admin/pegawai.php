     <!--**********************************
            Content body start
        ***********************************-->
     <div class="content-body">
     	<div class="container-fluid">
     		<div class="page-titles">
     			<ol class="breadcrumb">
     				<li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
     				<li class="breadcrumb-item active"><a href="javascript:void(0)">Pegawai</a></li>
     			</ol>
     		</div>
     		<!-- row -->


     		<div class="row">

     			<div class="col-12">
     				<div class="card">
     					<div class="card-header">
     						<h4 class="card-title">Profil Data Pegawai PNS /PPPK</h4>
     					</div>
     					<div class="card-body">
     						<div class="alert alert-warning" role="alert">
     							<strong>Info</strong>
     							<p>Format Upload Harus Sesuai dengan Format Aplikasi Terlampir</p>
     						</div>
     						<div class="col-md-12 row">
     							<a href="<?=base_url('admin/tambah_pegawai')?>"
     								class="btn btn-success shadow btn-xs "><i class="fa fa-plus"></i> Tambah Data</a>
     							<a href="#" class="btn btn-info shadow btn-xs"><i class="fa fa-upload"></i> Import Data
     								Pegawai</a>
     							<a href="#" class="btn btn-info btn-xs " target="_blank"> <i class="fa fa-excel">
     								</i>Format Import</a>
     						</div>
     						<div class="table-responsive">
     							<table id="data-pegawai" class="display min-w850">
     								<thead>
     									<tr>
     										<th>No</th>
     										<th>NAMA</th>
     										<th>NIP</th>
     										<th>GOL</th>
     										<th>TMT GOL</th>
     										<th>KGB TMT</th>
     										<th>JABATAN TERAKHIR</th>
     										<th>TMT JABATAN</th>
     										<th>JENJANG PENDIDIKAN</th>
     										<th>JENIS KELAMIN</th>
     										<th>AGAMA</th>
     										<th>ESELON & NON ESELON</th>
     										<th>ORGANISASI PERANGKAT DAERAH</th>
     										<th>UNIT KERJA</th>
											<th>TANGGAL PENSIUN</th>
											<th>ACOUNT</th>
     										<th>Action</th>
     									</tr>
     								</thead>
     								<tbody class="show-data">
										<tr>
											<td>
												<button type="button" class="btn btn-primary btn-xs">
													<i class="fa fa-edit"></i>
												</button>
												<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												<button type="button" class="btn btn-success btn-xs"><i class="fa fa-move">Pindah</button>
											</td>
										</tr>
     								</tbody>
     							</table>
     							<div class="" id="pagination_link"></div>
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
                "url": "<?php echo site_url('admin/get_pegawai') ?>",
                "type": "POST"
            },


            "columnDefs": [
            {
                "targets": [ 0 ],
                "orderable": false,
            },
			{
				"targets": [14],
				"mRender": function (data, type, row) {
					return "-";
				}
			},
			{
                "targets": [ 15 ],
                "mRender": function (data, type, row) {
					let color="";let text="";
					if (row[14]==false) {
						color='danger';text='Belum Aktif';
					} else{
						color='success';text='Aktif'
					}
                    return `<span class="badge light badge-${color}">${text}</span>`;
                }
            },{
                "targets": [ 16 ],
                "mRender": function (data, type, row) {
					let aktifkanUser="";
					if (row[14]==false) {
						aktifkanUser=`<button type="button" onclick="makeAccount(${row})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>`
					}
                    return `
												<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												<button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>`;
                }
            }
            ],

		});

     </script>

