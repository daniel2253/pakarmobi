<!doctype html>

<html class="no-js" lang="en">
			<?php
		session_start();
		if (!isset($_SESSION['logged_in'])) {
			header('Location: login.html');
			exit;
		}
		?>
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
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
	
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
				                <a class="navbar-brand" href="index.html">PakarMobi<span></span></a>
				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->
				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">Home</a></li>
				                    <li class="scroll"><a href="#fitur">Fitur</a></li>
				                    <li class="scroll"><a href="#petunjuk">Petunjuk Penggunaan</a></li>
				                    <li class="scroll"><a href="#pengembang">Tim Pengembang</a></li>
				                    <li><a href="login.html">Login</a></li>
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
					<h2> Temukan Standar Kelayakan </h2>
						<h2> Mobil Bekas Anda. </h2>	
				</div>
			</div>
			<script>
				// Function untuk menghitung CF dengan perbaikan

						function hitungCF() {
							// Ambil nilai dari setiap input gejala
							const gejala = [
								parseFloat(document.getElementById('g01').value),
								parseFloat(document.getElementById('g04').value),
								parseFloat(document.getElementById('g07').value),
								parseFloat(document.getElementById('g10').value),
								parseFloat(document.getElementById('g13').value),
								parseFloat(document.getElementById('g16').value),
								parseFloat(document.getElementById('g19').value)
							];

							// Pastikan semua gejala memiliki nilai valid
							if (gejala.some(isNaN)) {
								alert('Harap pilih semua opsi sebelum menghitung kelayakan.');
								return;
							}

							// Daftar rekomendasi aspek perbaikan
							const rekomendasi = [
								"Usia dan jarak tempuh perlu diperhatikan",
								"Kondisi AC perlu diperbaiki",
								"Mesin perlu diperbaiki",
								"Body mobil perlu perbaikan estetika",
								"Transmisi perlu diservis",
								"Ban perlu diganti",
								"Riwayat servis perlu diperbaiki"
							];

							// Lakukan perhitungan CF dengan pendekatan konservatif
							let cfCombine = gejala[0]; // Mulai dari nilai awal (gejala pertama)
							for (let i = 1; i < gejala.length; i++) {
								cfCombine = (cfCombine + gejala[i]) / 2; // Kombinasi CF lebih konservatif
							}

							// Menentukan kategori berdasarkan hasil CF
							let hasil = '';
							let aspekPerbaikan = [];

							if (cfCombine >= 0.8) {
								hasil = 'Mobil Anda sangat layak digunakan. Kondisi sangat baik dan mendekati standar mobil baru.';
							} else if (cfCombine >= 0.6) {
								hasil = 'Mobil Anda cukup layak digunakan. Beberapa aspek perlu perhatian untuk perawatan tambahan.';
								aspekPerbaikan = gejala.map((g, i) => g < 0.8 ? rekomendasi[i] : null).filter(Boolean);
							} else {
								hasil = 'Mobil Anda kurang layak digunakan. Perlu perbaikan pada banyak aspek sebelum layak digunakan.';
								aspekPerbaikan = gejala.map((g, i) => g < 0.8 ? rekomendasi[i] : null).filter(Boolean);
							}

							// Tampilkan hasil ke pengguna
							const aspekPerbaikanElement = document.getElementById('aspek-perbaikan');
							aspekPerbaikanElement.innerHTML = '';
							aspekPerbaikan.forEach(aspek => {
								aspekPerbaikanElement.innerHTML += `<ul>${aspek}</ul>`;
							});
							
							const hasilElement = document.getElementById('hasil');
							hasilElement.innerHTML = `Hasil: <strong>${hasil}</strong><br>(CF Total: ${cfCombine.toFixed(2)})`;
							// Tampilkan langkah-langkah perhitungan
							const langkahElement = document.getElementById('langkah-cf');
							langkahElement.innerHTML = `<p>1. Ambil nilai dari setiap gejala: ${gejala.join(', ')}</p>`;
							langkahElement.innerHTML += `<p>2. Lakukan kombinasi konservatif secara berurutan:</p>`;
							let langkah = `CF awal: ${gejala[0]}<br>`;
							for (let i = 1; i < gejala.length; i++) {
								langkah += `(${cfCombine} + ${gejala[i]}) / 2 = `;
								cfCombine = (cfCombine + gejala[i]) / 2;
								langkah += `${cfCombine.toFixed(2)}<br>`;
							}
							langkahElement.innerHTML += langkah;
							langkahElement.innerHTML += `<p>3. Tentukan hasil akhir berdasarkan nilai CF total: ${cfCombine.toFixed(2)}</p>`;
							
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
											<select class="form-control">
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
										<button class="welcome-btn model-search-btn" onclick="hitungCF()">Cek Kelayakan</button>
									<div class="mt-4 text-center" id="hasil"></div> <!-- Hasil ditampilkan di sini -->
									

								</div>
								
								</div>
								<div class="result-container">
										<div class="result-left">
											<h3>Aspek yang Perlu Diperbaiki</h3>
											<ul id="aspek-perbaikan"></ul>
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


		<!--service start -->
		<!--featured-cars start -->
		<section id="petunjuk" class="featured-cars">
			<div class="container">
				<div class="section-header">
					<h2>Petunjuk Penggunaan</h2>

					<div class="col-md-12 col-sm-12">
						<div class="container">
							<div class="section-header">
							</div>
							<p style="text-align: justify;">
								<strong>1. Isi Kriteria Kelayakan</strong><br>
								Pada halaman utama, Anda akan menemukan kolom pilihan kriteria yang 
								dapat disesuaikan dengan kondisi mobil bekas yang ingin dinilai. 
								Setiap kriteria memiliki opsi yang berbeda, antara lain:
								<br> - <strong>Usia dan Jarak Tempuh</strong>: Pilih berdasarkan usia mobil dan jarak tempuh yang sudah ditempuh.
								<br> - <strong>Kondisi Mesin</strong>: Pilih berdasarkan performa mesin mobil saat ini.
								<br> - <strong>Kondisi AC</strong>: Pilih berdasarkan kondisi AC saat ini.
								<br> - <strong>Kondisi Body</strong>: Pilih berdasarkan kondisi eksterior mobil, seperti cat dan tingkat kerusakan.
								<br> - <strong>Kondisi Transmisi</strong>: Pilih kondisi perpindahan gigi sesuai kenyamanan dan kelancaran transmisi mobil.</li>
								<br> - <strong>Kondisi Ban</strong>: Pilih berdasarkan kondisi tapak dan ketebalan ban mobil.
								<br> - <strong>Riwayat Servis</strong>: Pilih berdasarkan riwayat perawatan atau servis mobil yang tersedia.
								<br> - <strong>Surat Kendaraan</strong>: Pastikan kelengkapan dokumen kendaraan seperti STNK dan BPKB.
								<div class="section">
							<p style="text-align: justify;">
								<strong>2. Klik Tombol "Ukur Kelayakan"</strong><br>
										Setelah memilih semua kriteria, tekan tombol <strong>Ukur Kelayakan</strong> untuk mendapatkan hasil analisis.</p>
							<p style="text-align: left;">
							<strong>3. Lihat Hasil Analisis.</strong><br>
							Sistem akan menampilkan hasil analisis yang menunjukkan tingkat kelayakan mobil berdasarkan kriteria yang Anda masukkan. Hasil ini dapat membantu Anda dalam mengambil keputusan pembelian dengan lebih percaya diri	
						
							</div>
						</div>
					</div>
									
				</div><!--/.section-header-->

			</div><!--/.container-->

		</section><!--/.featured-cars-->
		<!--featured-cars end -->

		<!-- clients-say strat -->
		<section id="pengembang"  class="clients-say">
			<div class="container">
				<div class="section-header">
					<h2>Tim Pengembang</h2>
				</div><!--/.section-header-->
				<div class="row">
					<div class="owl-carousel testimonial-carousel">
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/images/clients/YumarlinMz.png" alt="image of clients person" /> <br>
										</div><!--/.testimonial-img-->
										<div class="testimonial-person">
											<h2><a href="#">Yumarlin Mz</a></h2>
											<h4>Dosen Pembimbing</h4>
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											Dosen pembimbing mata kuliah Sistem Pakar.
										</p>
									</div><!--/.testimonial-comment-->
									
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/images/clients/asni.png" alt="image of clients person" /> <br>
										</div><!--/.testimonial-img-->
										<div class="testimonial-person">
											<h2><a href="#">Asni Eriana</a></h2>
											<h4>21330030</h4>
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											Pengumpulan data teknis kendaraaan
										</p>
									</div><!--/.testimonial-comment-->
									
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/images/clients/daniel.png" alt="image of clients person" /> <br>
										</div><!--/.testimonial-img-->
									</div><!--/.testimonial-info-->
									<div class="testimonial-person">
										<h2><a href="#">Daniel Mayndeta</a></h2>
										<h4>21330028</h4>
									<div class="testimonial-comment">
										<p>
											Pembuatan desain web keseluruhan
										</p>
									</div><!--/.testimonial-comment-->
									
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/images/clients/denny.png" alt="image of clients person" /> <br>
										</div><!--/.testimonial-img-->
										<div class="testimonial-person">
											<h2><a href="#">Laurensius Denny</a></h2>
											<h4>21330051</h4>
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											Implementasi algoritma perhitungan pada web
										</p>
									</div><!--/.testimonial-comment-->
									
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
					</div><!--/.testimonial-carousel-->
				</div><!--/.row-->
			</div><!--/.container-->

		</section><!--/.clients-say-->	
		<!-- clients-say end -->

	

		<!--blog start -->
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->

		<!--contact start-->
		<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">PakarMobi</a>
								</div>
								<p>
									Dapatkan keputusan pembelian yang lebih percaya diri dengan PAKARMOBI.
								</p>
								<div class="footer-contact">
									<p>pakarmobi@gmail.com</p>
									<p>+62 81998632861</p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="single-footer-widget">
								<h2>about pakarmobi</h2>
								<ul>
									<li><a href="#">about us</a></li>
									<li><a href="#">career</a></li>
									<li><a href="#">terms <span> of service</span></a></li>
									<li><a href="#">privacy policy</a></li>
								</ul>
							</div>
						</div>
						
						<div class="col-md-offset-4 col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<h2>news</h2>
								<div class="footer-newsletter">
									<p>
										Subscribe to get latest news  update and informations about PakarMobi
									</p>
								</div>
								<div class="hm-foot-email">
									<div class="foot-email-box">
										<input type="text" class="form-control" placeholder="Email">
									</div><!--/.foot-email-box-->
									<div class="foot-email-subscribe">
										<span><i class="fa fa-arrow-right"></i></span>
									</div><!--/.foot-email-icon-->
								</div><!--/.hm-foot-email-->
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="row">
						<div class="col-sm-6">
							<p>
								&copy; copyright pakarmobi
							</p><!--/p-->
						</div>
						<div class="col-sm-6">
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-pinterest-p"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>	
							</div>
						</div>
					</div>
				</div><!--/.footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.contact-->
		<!--contact end-->


		
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