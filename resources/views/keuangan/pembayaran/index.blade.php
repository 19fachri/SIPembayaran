@extends('layouts/keuangan/index')
@section('title')
FK Unizar || Keuangan
@endsection

@section('header')
@endsection

@section('content')
<div class="row">
	<div ng-app='myApp' ng-controller='pembayaranController'>
		<div ng-show="page.mahasiswa">
			@include('keuangan/pembayaran/mahasiswa')
		</div>
		<div ng-show="page.mahasiswaDetail">
			@include('keuangan/pembayaran/mahasiswaDetail')
		</div>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{URL::asset('costum/keuangan/pembayaran.js')}}"></script>
@endsection