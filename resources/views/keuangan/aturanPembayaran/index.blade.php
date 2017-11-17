@extends('layouts/keuangan/index')
@section('title')
FK Unizar || Keuangan
@endsection

@section('header')
@endsection

@section('content')
<div class="row">
	<div ng-app='myApp' ng-controller='aturanPembayaranController'>
		<div ng-show="true">
			@include('keuangan/aturanPembayaran/aturan')
		</div>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{URL::asset('costum/keuangan/aturanPembayaran.js')}}"></script>
@endsection