var app = angular.module('myApp',[]);

app.controller('aturanPembayaranController', function($scope, $http, $window) {
	$scope.page = [];
	$scope.option = [];
	$scope.attribut = [];
	$scope.tabelAturan = [];

	$scope.init = function(){
		$scope.tabelAturanPembayaran();
	}

	$scope.tabelAturanPembayaran = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/aturan',
		}).then(function mySuccess(response){
			$scope.tabelAturan.data = response.data.data;
			$scope.tabelAturan.current_page = response.data.current_page;
			$scope.tabelAturan.last_page = response.data.last_page;
			$scope.tabelAturan.next_page_url = response.data.next_page_url;
			$scope.tabelAturan.prev_page_url = response.data.prev_page_url;
			$scope.tabelAturan.from = response.data.from;
			$scope.tabelAturan.to = response.data.to;
			$scope.tabelAturan.total = response.data.total;
			if ($scope.tabelAturan.current_page == $scope.tabelAturan.last_page) {
				$scope.option.tabelAturanNext = true;
			}else{
				$scope.option.tabelAturanNext = false;
			}
			$scope.option.tabelAturanPrev = false;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tabelAturanNext = function(){
		$http({
			method : 'GET',
			url : $scope.tabelAturan.next_page_url
		}).then(function mySuccess(response){
			$scope.tabelAturan.data = response.data.data;
			$scope.tabelAturan.current_page = response.data.current_page;
			$scope.tabelAturan.last_page = response.data.last_page;
			$scope.tabelAturan.next_page_url = response.data.next_page_url;
			$scope.tabelAturan.prev_page_url = response.data.prev_page_url;
			$scope.tabelAturan.from = response.data.from;
			$scope.tabelAturan.to = response.data.to;
			$scope.tabelAturan.total = response.data.total;
			if ($scope.tabelAturan.current_page == $scope.tabelAturan.last_page) {
				$scope.option.tabelAturanNext = true;
			}else{
				$scope.option.tabelAturanNext = false;
			}
			$scope.option.tabelAturanPrev = false;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tabelAturanPrev = function(){
		$http({
			method : 'GET',
			url : $scope.tabelAturan.prev_page_url
		}).then(function mySuccess(response){
			$scope.tabelAturan.data = response.data.data;
			$scope.tabelAturan.current_page = response.data.current_page;
			$scope.tabelAturan.last_page = response.data.last_page;
			$scope.tabelAturan.next_page_url = response.data.next_page_url;
			$scope.tabelAturan.prev_page_url = response.data.prev_page_url;
			$scope.tabelAturan.from = response.data.from;
			$scope.tabelAturan.to = response.data.to;
			$scope.tabelAturan.total = response.data.total;
			if ($scope.tabelAturan.current_page == 1) {
				$scope.option.tabelAturanPrev = true;
			}else{
				$scope.option.tabelAturanPrev = false;
			}
			$scope.option.tabelAturanNext = false;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.tabelAturanPembayaranKategori = function(){
		$http({
			method : 'GET',
			url : 'http://localhost:8000/api/keuangan/aturan/'+$scope.attribut.keterangan,
		}).then(function mySuccess(response){
			$scope.tabelAturan.data = response.data.data;
			$scope.tabelAturan.current_page = response.data.current_page;
			$scope.tabelAturan.last_page = response.data.last_page;
			$scope.tabelAturan.next_page_url = response.data.next_page_url;
			$scope.tabelAturan.prev_page_url = response.data.prev_page_url;
			$scope.tabelAturan.from = response.data.from;
			$scope.tabelAturan.to = response.data.to;
			$scope.tabelAturan.total = response.data.total;
			if ($scope.tabelAturan.current_page == $scope.tabelAturan.last_page) {
				$scope.option.tabelAturanNext = true;
			}else{
				$scope.option.tabelAturanNext = false;
			}
			$scope.option.tabelAturanPrev = false;
		}, function myError(response){
			$scope.error = response;
		});
	}

	$scope.aturanSimpan = function(){
		$http({
			method : 'POST',
			url : 'http://localhost:8000/api/keuangan/aturan/',
			data : {
				'keterangan' : $scope.aturan.keterangan,
				'jumlah' : $scope.aturan.jumlah,
				'tahunMulai' : $scope.aturan.tahunMulai
			}
		}).then(function mySuccess(response){
			$scope.attribut.response = response;
			$scope.tabelAturanPembayaran();
			$window.alert("data berhasil disimpan");
		}, function myError(response){
			$scope.attribut.response = response;
			$window.alert("data gagal disimpan");
		});
	}

	$scope.init();
});