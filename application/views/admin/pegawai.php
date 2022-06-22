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
     							<table id="example3" class="display min-w850">
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
     	$(document).ready(function () {

     		$(document).on("click", ".pagination li a", function (event) {
     			event.preventDefault();
     			var page = $(this).data("ci-pagination-page");
     			loadpag(page);
     		});

     	});
     	loadpag(1);

     	function loadpag(page) {

     		$.ajax({
     			url: "<?php echo base_url('admin/pagination_pegawai'); ?>/" + page,
     			type: 'get',
     			dataType: 'json',
     			success: function (json) {
					let table="";
     				$.each(json.pagination_results, function (key, value) {
     					table += `<tr>
											<td>${key+1}</td>
											<td>${value.nama_pegawai}</td>
											<td>${value.nip}</td>
											<td>${value.gol}</td>
											<td>${value.tmt_gol}</td>
											<td>${value.kgb_tmt}</td>
											<td>${value.nama_jabatan}</td>
											<td>${value.tmt_jabatan}</td>
											<td>${value.jenjang_pendidikan}</td>
											<td>${value.jenis_kelamin}</td>
											<td>${value.agama}</td>
											<td>${value.eselon_non_eselon}</td>
											<td>${value.perangkat_daerah}</td>
											<td>${value.unit_kerja}</td>
											<td>
											<button type="button" class="btn btn-primary btn-xs">
													<i class="fa fa-edit"></i>
												</button>
												<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
												<button type="button" class="btn btn-success btn-xs"><i class="fa fa-move">Pindah</button>
											</td>
										</tr>`;
     				});

     				$('.show-data').html(table);
     				$('#pagination_links').html(json.pagination_links);
     			},
     		});
     	}

     </script>
