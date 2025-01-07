<!DOCTYPE html>
<head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        
        <!-- title of site -->
        <title>PakarMobi</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

        <!--flaticon.css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>

	
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
				        <div class="container">
				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html">Admin PakarMobi<span></span></a>
				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->
				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li><a href="login.html">Logout</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>
			</div><!-- /.top-area-->
			<!-- top-area End -->
			<div class="container">
				<div class="welcome-hero-txt">
					<h2> Halaman Admin  </h2>
						<h2> Pakarmobi </h2>	
				</div>
			</div>
			<script>


				function hitungCF() {
    					// Nilai CF Pakar
						const cfPakar = {
							jarakTempuh: 0.3,     
							mesin: 0.3,           
							transmisi: 0.2,      
							servis: 0.125,          
							ac: 0.2,              
							body: 0.125,           
							ban: 0.125,            
							suratKendaraan: 0.2   
						};

					const rekomendasiPerbaikan = [
						"Jarak tempuh perlu diperiksa dan diservis",
						"AC mobil perlu diperiksa atau diservis",
						"Kondisi mesin memerlukan perawatan lebih lanjut",
						"Kondisi body mobil memerlukan perbaikan",
						"Transmisi memerlukan pengecekan dan perawatan",
						"Ban mobil perlu diganti atau diperiksa",
						"Riwayat servis mobil perlu diperbaiki",
						"Surat kendaraan perlu diperhatikan kelengkapannya"
					];

					const gejala = [
						parseFloat(document.getElementById('g01').value),
						parseFloat(document.getElementById('g04').value),
						parseFloat(document.getElementById('g07').value),
						parseFloat(document.getElementById('g10').value),
						parseFloat(document.getElementById('g13').value),
						parseFloat(document.getElementById('g16').value),
						parseFloat(document.getElementById('g19').value),
						parseFloat(document.getElementById('g21').value)
					];

					if (gejala.some(isNaN)) {
						alert('Harap isi semua kondisi gejala terlebih dahulu!');
						return;
					}

					const cfRule = [];
					for (let i = 0; i < gejala.length; i++) {
						cfRule.push(cfPakar[Object.keys(cfPakar)[i]] * gejala[i]);
					}

					// Hitung CF Combine
					let cfCombine = cfRule[0]; // Nilai awal
					let langkahPerhitungan = `<p>Langkah-langkah perhitungan CF:</p>`;
					langkahPerhitungan += `<p>CF Rule (CF Pakar × CF User): ${cfRule.map(cf => cf.toFixed(2)).join(', ')}</p>`;

					for (let i = 1; i < cfRule.length; i++) {
						const prev = cfCombine;
						cfCombine = prev + cfRule[i] * (1 - prev);
						langkahPerhitungan += `<p>CF Combine ${i}: (${prev.toFixed(2)} + ${cfRule[i].toFixed(2)} × (1 - ${prev.toFixed(2)})) = ${cfCombine.toFixed(2)}</p>`;
					}

					// Tentukan hasil akhir
					let hasil = '';

					if (cfCombine >= 0.8) {
						hasil = 'Mobil Anda sangat layak digunakan. Kondisi sangat baik dan mendekati standar mobil baru.';
					} else if (cfCombine >= 0.6) {
						hasil = 'Mobil Anda cukup layak digunakan. Beberapa aspek perlu perhatian.';
					} else {
						hasil = 'Mobil Anda kurang layak digunakan. Banyak aspek perlu diperbaiki.';
					}

					    // Tentukan rekomendasi perbaikan
					const aspekPerbaikan = [];
					for (let i = 0; i < cfRule.length; i++) {
						if (cfRule[i] < (cfPakar[Object.keys(cfPakar)[i]] * 0.8)) {
							// Hanya tambahkan rekomendasi jika CF Rule jauh di bawah threshold 60%
							aspekPerbaikan.push(rekomendasiPerbaikan[i]);
						}
					}

					// Tampilkan hasil
					document.getElementById('hasil').innerHTML = `<p><strong>Hasil:</strong> ${hasil}</p><p>CF Total: ${cfCombine.toFixed(2)}</p>`;
					document.getElementById('hasil').style.display = 'block';

					// Tampilkan aspek perbaikan
					const aspekElement = document.getElementById('aspek-perbaikan');
					aspekElement.innerHTML = `<p><strong>Rekomendasi Perbaikan:</strong></p>`;
					aspekElement.innerHTML += aspekPerbaikan.length > 0
						? `<ul>${aspekPerbaikan.map(aspek => `<li>${aspek}</li>`).join('')}</ul>`
						: `<p>Tidak ada aspek yang perlu diperbaiki.</p>`;
					aspekElement.style.display = 'block';

					// Tampilkan langkah-langkah perhitungan
					const langkahElement = document.getElementById('langkah-cf');
					langkahElement.innerHTML = langkahPerhitungan;
					langkahElement.style.display = 'block';

					document.getElementById('hasil').style.display = 'block';
				}


			</script>
			
			<div section id="fitur" class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="model-search-content">
							<div class="row">
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>Usia dan Jarak Tempuh</h2>
										<div class="model-select-icon">
											<select id="g01" class="form-control">
												<option value="default">Pilih Kondisi</option>
											  	<option value="1"> >5 tahun, jarak tempuh rendah (>50.000 km). Mobil masih sangat baru</option><!-- /.option-->
											  	<option value="0.5">5-10 tahun, jarak tempuh sedang (50.000-100.000 km), tetapi masih layak digunakan</option><!-- /.option-->
												<option value="0.3">Usia lebih dari 10 tahun atau jarak tempuh tinggi (>100.000 km)</option><!-- /.option-->
											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>Kondisi AC</h2>
										<div class="model-select-icon">
											<select id="g04" class="form-control">
											  	<option value="default">Pilih Kondisi</option><!-- /.option-->
											  	<option value="1">AC dingin dan normal</option><!-- /.option-->
											  	<option value="0.5">AC hidup, tetapi kurang dingin</option><!-- /.option-->
											  	<option value="0.2">AC Mati</option><!-- /.option-->
											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>Kondisi Mesin</h2>
										<div class="model-select-icon">
											<select id="g07" class="form-control">
												<option value="default">Pilih Kondisi</option>
											  	<option value="1"> Mesin dalam kondisi sempurna, tidak ada kebocoran oli atau cairan lainnya</option><!-- /.option-->
											  	<option value="0.5">Akselerasi masih responsif dan efisien.</option><!-- /.option-->
											  	<option value="0.2">Mesin ada tanda - tanda keausan, seperti suara halus atau akselerasi yang sedikit berkurang</option><!-- /.option-->
											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>Kondisi Body</h2>
										<div class="model-select-icon">
											<select id="g10" class="form-control">
											  	<option value="default">Pilih Kondisi</option><!-- /.option-->
											  	<option value="1">Bodi dan cat dalam kondisi sangat baik, tanpa goresan atau penyok</option><!-- /.option-->
											  	<option value="0.6">Ada goresan kecil pada bodi, tetapi tidak mempengaruhi estetika keseluruhan</option><!-- /.option-->
											  	<option value="0.2">Terdapat banyak goresan atau penyok besar pada mobil</option><!-- /.option-->
											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>Kondisi Transmisi</h2>
										<div class="model-select-icon">
											<select id="g13" class="form-control">
											  	<option value="default">Pilih Kondisi</option><!-- /.option-->
											  	<option value="1">Transmisi halus, perpindahan gigi tidak terasa</option>
											  	<option value="0.6">Perpindahan gigi masih lancar, meskipun tidak sehalus mobil baru</option>
											  	<option value="0.3">Perpindahan gigi sedikit kasar atau lambat, tetapi masih berfungsi normal dan tidak memerlukan perbaikan segera. </option>
											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>Kondisi Ban</h2>
										<div class="model-select-icon">
											<select id="g16" class="form-control">
											  	<option value="default">Pilih Kondisi</option><!-- /.option-->
											  	<option value="1">Ban dalam kondisi sangat baik, tapak ban masih tebal</option><!-- /.option-->
											  	<option value="0.6">Ban masih layak pakai, tapak mulai menipis sedikit</option>
											  	<option value="0.3">Ban sudah tipis dan velg terdapat beberapa goresan</option>

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>Riwayat Servis</h2>
										<div class="model-select-icon">
											<select id="g19" class="form-control">
											  	<option value="default">Pilih Kondisi</option>
											  	<option value="1">Riwayat servis lengkap dan rutin, selalu diservis di bengkel resmi. </option>
											  	<option value="0.6">Riwayat servis ada, meski tidak selalu rutin. </option>
											  	<option value="0.4">Riwayat servis ada, meskipun tidak selalu lengkap, namun perawatan besar sudah dilakukan dan mobil masih layak digunakan. </option>
											</select>
										</div>
									</div>
									<div class="single-model-search">
										<h2>Surat Kendaraan</h2>
										<div class="model-select-icon">
											<select id="g21" class="form-control">
											  	<option value="default">Pilih Kondisi</option><!-- /.option-->
											  	<option value="1">Surat - Surat kendaraan lengkap baik dari STNK maupun BPKB, dan pajak hidup. </option>
											  	<option value="0.6">Surat - Surat kendaraan lengkap baik dari STNK maupun BPKB, dan pajak mati </option>
											  	<option value="0.1">Surat - Surat kendaraan tidak ada</option><!-- /.option-->
											</select>
										</div>
									</div>
								</div>
							</div>
							<div>

							
								<div class="single-model-search text-center">
										<button class="button" onclick="hitungCF()">  Cek Kelayakan </button>
									<div class="mt-4 text-center" id="hasil" style="display: none;"></div> <!-- Hasil ditampilkan di sini -->
									

								</div>
								
								</div>
								<div class="result-container">
										<div class="result-left">
											<h3>Aspek yang Perlu Diperbaiki</h3>
											<div id="aspek-perbaikan"></div>
										</div>
										<div class="result-right">
											<h3>Langkah-Langkah Perhitungan</h3>
											<div id="langkah-cf"></div>
										</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->


        <div id="scroll-Top">
            <div class="return-to-top">
                <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>
            
        </div><!--/.scroll-Top-->
        
    </footer><!--/.contact-->



		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>