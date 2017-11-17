var app = angular.module('myApp',[]);

app.controller('pembayaranController', function($scope, $http, $window) {
	$scope.page = [];
	$scope.option = [];
	$scope.tabelMahasiswa = [];
	$scope.mahasiswa = [];
	$scope.attribut = [];

	$scope.init = function(){
		// $scope.login();
		$scope.tabelMahasiswa();
		$scope.page.mahasiswa = true;
		$scope.page.mahasiswaDetail = false;
	};

	$scope.login = function(){
		var dataLogin = {
			email : 'a@a.com',
			password : 'aaaaaa',
		};
		console.log("dcsdaaaaaaaaaaa");
		$http({
			method : 'POST',
			url : 'http://localhost:8000/api/login',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			data : dataLogin,
		}).then(function mySuccess(response){
			$scope.attribut.data = response.data.token;
			console.log("dcsd");
			console.log($scope.attribut.data);
		}, function myError(response){
			$scope.tabelMahasiswa = response;
			console.log($scope.tabelMahasiswa);
		});
		console.log("ffffffffff");
	}

	$scope.tabelMahasiswa = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa'
		}).then(function mySuccess(response){
			$scope.tabelMahasiswa.data = response.data.data;
			$scope.tabelMahasiswa.current_page = response.data.current_page;
			$scope.tabelMahasiswa.last_page = response.data.last_page;
			$scope.tabelMahasiswa.next_page_url = response.data.next_page_url;
			$scope.tabelMahasiswa.prev_page_url = response.data.prev_page_url;
			$scope.tabelMahasiswa.from = response.data.from;
			$scope.tabelMahasiswa.to = response.data.to;
			$scope.tabelMahasiswa.total = response.data.total;
			if ($scope.tabelMahasiswa.current_page == $scope.tabelMahasiswa.last_page) {
				$scope.option.tabelMahasiswaNext = true;
			}else{
				$scope.option.tabelMahasiswaNext = false;
			}
			$scope.option.tabelMahasiswaPrev = false;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tabelMahasiswaNext = function(){
		$http({
			method : 'GET',
			url : $scope.tabelMahasiswa.next_page_url
		}).then(function mySuccess(response){
			$scope.tabelMahasiswa.data = response.data.data;
			$scope.tabelMahasiswa.current_page = response.data.current_page;
			$scope.tabelMahasiswa.last_page = response.data.last_page;
			$scope.tabelMahasiswa.next_page_url = response.data.next_page_url;
			$scope.tabelMahasiswa.prev_page_url = response.data.prev_page_url;
			$scope.tabelMahasiswa.from = response.data.from;
			$scope.tabelMahasiswa.to = response.data.to;
			$scope.tabelMahasiswa.total = response.data.total;
			if ($scope.tabelMahasiswa.current_page == $scope.tabelMahasiswa.last_page) {
				$scope.option.tabelMahasiswaNext = true;
			}else{
				$scope.option.tabelMahasiswaNext = false;
			}
			$scope.option.tabelMahasiswaPrev = false;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tabelMahasiswaPrev = function(){
		$http({
			method : 'GET',
			url : $scope.tabelMahasiswa.prev_page_url
		}).then(function mySuccess(response){
			$scope.tabelMahasiswa.data = response.data.data;
			$scope.tabelMahasiswa.current_page = response.data.current_page;
			$scope.tabelMahasiswa.last_page = response.data.last_page;
			$scope.tabelMahasiswa.next_page_url = response.data.next_page_url;
			$scope.tabelMahasiswa.prev_page_url = response.data.prev_page_url;
			$scope.tabelMahasiswa.from = response.data.from;
			$scope.tabelMahasiswa.to = response.data.to;
			$scope.tabelMahasiswa.total = response.data.total;
			if ($scope.tabelMahasiswa.current_page == 1) {
				$scope.option.tabelMahasiswaPrev = true;
			}else{
				$scope.option.tabelMahasiswaPrev = false;
			}
			$scope.option.tabelMahasiswaNext = false;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tabelMahasiswaSearch = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/'+$scope.option.cariMahasiswa
		}).then(function mySuccess(response){
			$scope.tabelMahasiswa.data = response.data.data;
			$scope.tabelMahasiswa.current_page = response.data.current_page;
			$scope.tabelMahasiswa.last_page = response.data.last_page;
			$scope.tabelMahasiswa.next_page_url = response.data.next_page_url;
			$scope.tabelMahasiswa.prev_page_url = response.data.prev_page_url;
			$scope.tabelMahasiswa.from = response.data.from;
			$scope.tabelMahasiswa.to = response.data.to;
			$scope.tabelMahasiswa.total = response.data.total;
			if ($scope.tabelMahasiswa.current_page == $scope.tabelMahasiswa.last_page) {
				$scope.option.tabelMahasiswaNext = true;
			}else{
				$scope.option.tabelMahasiswaNext = false;
			}
			$scope.option.tabelMahasiswaPrev = true;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tabelMahasiswaKategori = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswaKategori/'+$scope.option.kategoriMahasiswa
		}).then(function mySuccess(response){
			$scope.tabelMahasiswa.data = response.data.data;
			$scope.tabelMahasiswa.current_page = response.data.current_page;
			$scope.tabelMahasiswa.last_page = response.data.last_page;
			$scope.tabelMahasiswa.next_page_url = response.data.next_page_url;
			$scope.tabelMahasiswa.prev_page_url = response.data.prev_page_url;
			$scope.tabelMahasiswa.from = response.data.from;
			$scope.tabelMahasiswa.to = response.data.to;
			$scope.tabelMahasiswa.total = response.data.total;
			if ($scope.tabelMahasiswa.current_page == $scope.tabelMahasiswa.last_page) {
				$scope.option.tabelMahasiswaNext = true;
			}else{
				$scope.option.tabelMahasiswaNext = false;
			}
			$scope.option.tabelMahasiswaPrev = true;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.mahasiswaDetail = function(nim){
		$scope.page.mahasiswa = false;
		$scope.page.mahasiswaDetail = true;

		$scope.mahasiswaProfil(nim);
		$scope.mahasiswaBiayaSpp(nim);
		$scope.mahasiswaBiayaPembangunan(nim);
		$scope.mahasiswaBiayaDaftarUlang(nim);
		$scope.mahasiswaBiayaOspek(nim);
	}

	$scope.mahasiswaDetailKembali = function(nim){
		$scope.page.mahasiswa = true;
		$scope.page.mahasiswaDetail = false;
	}

	$scope.mahasiswaProfil = function(nim){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/profil/'+nim
		}).then(function mySuccess(response){
			$scope.mahasiswa.profil = response.data;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.mahasiswaBiayaDaftarUlang = function(nim){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/biayaDaftarUlang/'+nim
		}).then(function mySuccess(response){
			$scope.mahasiswa.biayaDaftarUlang = response.data;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.mahasiswaBiayaOspek = function(nim){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/biayaOspek/'+nim
		}).then(function mySuccess(response){
			$scope.mahasiswa.biayaOspek = response.data;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.mahasiswaBiayaPembangunan = function(nim){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/biayaPembangunan/'+nim
		}).then(function mySuccess(response){
			$scope.mahasiswa.biayaPembangunan = response.data;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.mahasiswaBiayaSpp = function(nim){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/biayaSpp/'+nim
		}).then(function mySuccess(response){
			$scope.mahasiswa.biayaSpp = response.data;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tambahMahasiswa = function(){
		var dataMahasiswa = {
			nama : $scope.Mahasiswa.nama,
			kategori : $scope.Mahasiswa.kategori,
			harga : $scope.Mahasiswa.harga,
			status : $scope.Mahasiswa.status,
			gambar : "coba"
		};
		$http({
			method : 'POST',
			url : 'http://localhost:8000/api/MahasiswaTambah',
			data : dataMahasiswa
		}).then(function mySuccess(response){
			$scope.response = response;
		}, function myError(response){
			$scope.response = response;
		});
	}

	$scope.hitungSisa = function(){
		$scope.mahasiswa.pembayaran.sisa = $scope.mahasiswa.pembayaran.aturan - $scope.mahasiswa.pembayaran.pembayaranTerakhir - $scope.mahasiswa.pembayaran.jumlahBayar;
		if($scope.mahasiswa.pembayaran.sisa <= 0){
			$scope.mahasiswa.pembayaran.status = 'lunas';
		}else{
			$scope.mahasiswa.pembayaran.status = 'belum lunas';
		}
	}

	$scope.pembayaranSppTerakhir = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/sppTerakhir/'+$scope.mahasiswa.profil.nim,
		}).then(function mySuccess(response){
			$scope.mahasiswa.pembayaran = response.data;
		}, function myError(response){
			$scope.response = response;
		});
	}

	$scope.pembayaranPembangunanTerakhir = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/pembangunanTerakhir/'+$scope.mahasiswa.profil.nim,
		}).then(function mySuccess(response){
			$scope.mahasiswa.pembayaran = response.data;
		}, function myError(response){
			$scope.response = response;
		});
	}

	$scope.pembayaranOspekTerakhir = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/ospekTerakhir/'+$scope.mahasiswa.profil.nim,
		}).then(function mySuccess(response){
			$scope.mahasiswa.pembayaran = response.data;
		}, function myError(response){
			$scope.response = response;
		});
	}

	$scope.pembayaranDaftarUlangTerakhir = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/daftarUlangTerakhir/'+$scope.mahasiswa.profil.nim,
		}).then(function mySuccess(response){
			$scope.mahasiswa.pembayaran = response.data;
		}, function myError(response){
			$scope.response = response;
		});
	}

	$scope.pembayaranSpp = function(){
		$http({
			method : 'POST',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/pembayaranSpp/'+$scope.mahasiswa.profil.nim,
			data : {
				'jumlahBayar' : $scope.mahasiswa.pembayaran.jumlahBayar,
				'sisa' : $scope.mahasiswa.pembayaran.sisa,
				'semester' : $scope.mahasiswa.pembayaran.semester,
				'status' : $scope.mahasiswa.pembayaran.status
			}
		}).then(function mySuccess(response){
			$scope.response = response.data;
			$scope.mahasiswaBiayaSpp($scope.mahasiswa.profil.nim);
			$window.alert($scope.response);
		}, function myError(response){
			$scope.response = response;
			$window.alert($scope.response);
		});
	}

	$scope.pembayaranPembangunan = function(){
		$http({
			method : 'POST',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/pembayaranPembangunan/'+$scope.mahasiswa.profil.nim,
			data : {
				'jumlahBayar' : $scope.mahasiswa.pembayaran.jumlahBayar,
				'sisa' : $scope.mahasiswa.pembayaran.sisa,
				'status' : $scope.mahasiswa.pembayaran.status
			}
		}).then(function mySuccess(response){
			$scope.response = response.data;
			$scope.mahasiswaBiayaPembangunan($scope.mahasiswa.profil.nim);
			$window.alert($scope.response);
		}, function myError(response){
			$scope.response = response;
			$window.alert($scope.response);
		});
	}

	$scope.pembayaranOspek = function(){
		$http({
			method : 'POST',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/pembayaranOspek/'+$scope.mahasiswa.profil.nim,
			data : {
				'jumlahBayar' : $scope.mahasiswa.pembayaran.jumlahBayar,
				'sisa' : $scope.mahasiswa.pembayaran.sisa,
				'status' : $scope.mahasiswa.pembayaran.status
			}
		}).then(function mySuccess(response){
			$scope.response = response.data;
			$scope.mahasiswaBiayaOspek($scope.mahasiswa.profil.nim);
			$window.alert($scope.response);
		}, function myError(response){
			$scope.response = response;
			$window.alert($scope.response);
		});
	}

	$scope.pembayaranDaftarUlang = function(){
		$http({
			method : 'POST',
			url : 'http://localhost:8000/api/keuangan/mahasiswa/pembayaranDaftarUlang/'+$scope.mahasiswa.profil.nim,
			data : {
				'jumlahBayar' : $scope.mahasiswa.pembayaran.jumlahBayar,
				'sisa' : $scope.mahasiswa.pembayaran.sisa,
				'status' : $scope.mahasiswa.pembayaran.status
			}
		}).then(function mySuccess(response){
			$scope.response = response.data;
			$scope.mahasiswaBiayaDaftarUlang($scope.mahasiswa.profil.nim);
			$window.alert($scope.response);
		}, function myError(response){
			$scope.response = response;
			$window.alert($scope.response);
		});
	}

	$scope.test = function(kategori, id){
		$window.location.href = 'http://localhost:8000/buktiPembayaranPdf/'+kategori+'/'+id;
	}

	$scope.init();
});