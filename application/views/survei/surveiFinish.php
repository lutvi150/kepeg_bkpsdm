
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BPS <?=$title?></title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/logo.svg">
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <!-- <h1 class="error-text font-weight-bold">Maaf</h1> -->
                        <h4><i class="fa fa-thumbs-up text-danger"></i> Maaf</h4>
                        <p>Survei Hanya Bisa di Isi Satu Kali !</p>
						<div>
                            <a class="btn btn-primary" href="<?=base_url('/')?>">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="<?=base_url();?>assets/vendor/global/global.min.js"></script>
<script src="<?=base_url();?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.min.js"></script>
<script src="<?=base_url();?>assets/js/deznav-init.js"></script>

</html>