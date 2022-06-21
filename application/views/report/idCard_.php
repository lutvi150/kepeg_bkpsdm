<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<style>
		@import url(https://fonts.googleapis.com/css?family=Mrs+Sheppards);

* {
  margin:0; border:0;
  /*
  border:1px solid red;
  */
}
#holder {
  width: 250px;
  margin: 90px auto;
  display: block;
  text-align: center;
}
#holder .box {
  width: 250px;
  height: 440px;
  border-radius: 25px 25px 8px 8px;
  background: -webkit-linear-gradient(top,#eee,#fff, #ddd);

}
#holder .box img{
  width: 120px;
  margin: 18px 0 0 0;
  border:1px solid #eee;
  border-radius: 2px;
  background-color:rgba(255, 255, 255, 0.5);
  padding: 4px;
}
#holder .box h1{
  font-family: 'trebuchet ms', 'sans serif';
  font-weight: normal;
  font-size: 22px;
  margin: 15px 0 3px 0;
}
#holder .box .tie {
  background-image: -webkit-linear-gradient(top,rgb(192, 187, 187),rgb(16, 30, 230));
  height: 50px;
  border-radius: 25px 25px 0 0;
}
#holder .box h1.rname {
  font-family: 'century gothic', 'sans serif';
  font-size: 15px;
  margin:5px 0 0 0; padding:0;
}
#holder .box h1.sig {
  font-family: 'Mrs Sheppards', cursive;
}
#holder .box h1.postitle {
  font-size: 12px;
  font-weight: bold;
  margin:0; padding:0;
  text-transform: uppercase;
}
/*
.tie:after {
  content: '';
  position: absolute;
  top: 110px;
  background: #fff;
  width: 50px;
  height: 10px;
  border:1px solid #dedede;
  border-radius: 25px;
  box-shadow:inset 0 2px 5px #888;
}
*/
#holder:hover{
  cursor: none;
}
	</style>
<div id="holder">
  <div class="box">
    <div class="tie">
		<img src="/" alt="">
	</div>
    <h1>BADAN PUSAT STATISTIK</h1>
    <img src="<?=base_url('uploads/' . $user->foto)?>" alt="" />
    <h1 class="rname"><?=$user->nama?></h1>
    <h1 class="postitle">Mitra</h1>
    <h1 class="sig">No.Kontak : <?=$user->nomor_kontak?></h1>

    <h1 class="postitle"></h1>
  </div>
</div>
</body>
</html>
