<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Pembayaran SPP</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="page-title">
        <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#formSpp" ng-click="pembayaranSppTerakhir()">Bayar SPP</a>
      </div>
      <div class="row">
        <table id="tableMahasiswa" class="table table-hover table-bordered">
          <thead>
            <tr class="btn-info">
              <th class="text-center"><h4 class="font-weight-bold">Semester</h4></th>
              <th class="text-center"><h4 class="font-weight-bold">Tanggal</h4></th>
              <th class="text-center"><h4 class="font-weight-bold">Jumlah Bayar</h4></th>
              <th class="text-center"><h4 class="font-weight-bold">Sisa</h4></th>
              <th class="text-center"><h4 class="font-weight-bold">Status</h4></th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="dt in mahasiswa.biayaSpp" class="active">
              <td><h4>@{{dt.semester}}</h4></td>
              <td><h4>@{{dt.tanggalBayar}}</h4></td>
              <td><h4>@{{dt.jumlahBayar | number}}</h4></td>
              <td><h4>@{{dt.sisa | number}}</h4></td>
              <td><h4>@{{dt.status}}</h4></td>
              <td class="text-center"><a href="" class="btn btn-info" ng-click="test('spp', dt.id)"><span class="fa fa-print"></span></a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- Modal -->
      <div id="formSpp" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header btn-success">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Form Pembayaran SPP</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal form-label-left">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nim </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input" ng-model="mahasiswa.profil.nim">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input" ng-model="mahasiswa.profil.nama">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" ng-model="mahasiswa.pembayaran.semester">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Bayar </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="0" ng-model="mahasiswa.pembayaran.jumlahBayar" ng-change="hitungSisa()">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sisa </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input" ng-model="mahasiswa.pembayaran.sisa">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input" ng-model="mahasiswa.pembayaran.status">
                  </div>
                </div>
              </div>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="pembayaranSpp()">Simpan</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->

    </div>
  </div>
</div>