<div>
	<div class="col-md-6 col-sm-6 col-xs-12">
	  <div class="x_panel">
	    <div class="x_title">
	      <h2>Aturan Biaya Pembayaran</h2>
	      <ul class="nav navbar-right panel_toolbox">
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	      <div class="page-title">
	      	<div class="form-group">
	            <div class="col-md-6 col-sm-6 col-xs-6">
	              <select class="select2_single form-control" tabindex="-1" ng-model="attribut.keterangan" ng-change="tabelAturanPembayaranKategori()">
	                <option value="semua">Semua</option>
	                <option value="spp">SPP</option>
	                <option value="pembangunan">Pembangunan</option>
	                <option value="ospek">Ospek</option>
	                <option value="daftarUlang">Daftar Ulang</option>
	              </select>
	            </div>
	          </div>
	        <a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#formAturanPembayaranBaru">Aturan Baru</a>
	      </div>
			<div>
				<table id="tableAturan" class="table table-striped table-bordered">
				<thead>
				  <tr>
				    <th>Tahun Aktif</th>
				    <th>Jumlah Pembayaran</th>
				    <th>Keterangan</th>
				  </tr>
				</thead>
				<tbody>
				  <tr ng-repeat="dt in tabelAturan.data">
				    <td>@{{dt.tahunMulai}}</td>
				    <td>@{{dt.jumlah | number}}</td>
				    <td>@{{dt.keterangan}}</td>
				  </tr>
				</tbody>
				<tfoot>
				</tfoot>
				</table>
			</div>
	    </div>
	  </div>
	</div>
	<!-- Modal -->
	<div id="formAturanPembayaranBaru" class="modal fade" role="dialog">
	<div class="modal-dialog">
	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Form Aturan Pembayaran Baru</h4>
	    </div>
	    <div class="modal-body">
	      <form class="form-horizontal form-label-left">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="form-group">
	          <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan </label>
	          <div class="col-md-9 col-sm-9 col-xs-12">
	            <select class="select2_single form-control" tabindex="-1" ng-model="aturan.keterangan">
	                <option value="spp">SPP</option>
	                <option value="pembangunan">Pembangunan</option>
	                <option value="ospek">Ospek</option>
	                <option value="daftarUlang">Daftar Ulang</option>
	            </select>
	          </div>
	        </div>
	        <div class="form-group">
	        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Bayar </label>
			<div class="col-md-9 col-sm-9 col-xs-12">
	            <input type="text" class="form-control" placeholder="Jumlah Bayar" ng-model="aturan.jumlah">      
	        </div>
	        </div>
	        <div class="form-group">
	          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Aktif </label>
	          <div class="col-md-9 col-sm-9 col-xs-12">
	            <input type="text" class="form-control" placeholder="Tahun Aktif" ng-model="aturan.tahunMulai">
	          </div>
	        </div>
	      </div>
	    </form>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	      <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="aturanSimpan()">Simpan</button>
	    </div>
	  </div>
	</div>
	</div>
	<!-- End Modal -->
</div>