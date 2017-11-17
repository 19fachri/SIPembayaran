<div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="x_panel">
	    <div class="x_title">
	      <h2>Data Mahasiswa</h2>
	      <ul class="nav navbar-right panel_toolbox">
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
        <div class="page-title">
          <div class="form-group">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <select class="select2_single form-control" tabindex="-1" ng-model="option.kategoriMahasiswa" ng-change="tabelMahasiswaKategori()">
                <option value="semua">Semua</option>
                <option value="aktif">aktif</option>
                <option value="tidak aktif">tidak aktif</option>
              </select>
            </div>
          </div>
          <div class="pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for..." ng-model="option.cariMahasiswa">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" ng-click="tabelMahasiswaSearch()">Go!</button>
              </span>
            </div>
          </div>
        </div>
	      <table id="tableMahasiswa" class="table table-hover">
          <thead>
            <tr class="btn-info">
              <th><h4>NIM</h4></th>
              <th><h4>NAMA</h4></th>
              <th><h4>TAHUN MASUK</h4></th>
              <th><h4>STATUS</h4></th>
              <th><h4>PEMBAYARAN</h4></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="dt in tabelMahasiswa.data" class="active">
              <td><h4>@{{dt.nim}}</h4></td>
              <td><h4>@{{dt.nama}}</h4></td>
              <td><h4>@{{dt.tahunMasuk}}</h4></td>
              <td><h4>@{{dt.status}}</h4></td>
              <td><a href="" class="btn btn-info" ng-click="mahasiswaDetail(dt.nim)"><span class="fa fa-edit"></span> Detail </a></td>
            </tr>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
	    </div>
      <div class="x_footer">
        <row>
          <h5>data ke @{{tabelMahasiswa.from}} sampai data ke @{{tabelMahasiswa.to}} dari @{{tabelMahasiswa.total}} data</h5>
          <h5>tabel ke @{{tabelMahasiswa.current_page}} dari @{{tabelMahasiswa.last_page}} tabel</h5>
        </row>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item" ng-hide="option.tabelMahasiswaPrev"><a class="page-link" href="" ng-click="tabelMahasiswaPrev()"><h5><span class="fa fa-arrow-left"></span> Previous</h5></a></li>
            <li class="page-item" ng-hide="option.tabelMahasiswaNext"><a class="page-link" href="" ng-click="tabelMahasiswaNext()"><h5>Next <span class="fa fa-arrow-right"></span></h5></a></li>
          </ul>
        </nav>
      </div>
	  </div>
	</div>
</div>