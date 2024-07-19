
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Input </strong> Produk</h3>
                <ul class="panel-controls">
                    <li title="Fullscreen" ><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li title="Minimize" ><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li title="Close" ><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">                                                                        
            <form class="form-horizontal" name="frmproduk" id="frmproduk" method="post" onsubmit="return SaveProduk()">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-md-3 control-label">Kode Produk</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-key"></span></span>
                            <input type="text" class="form-control" name="txtkdbrg" id="txtkdbrg" maxlength="3" value="">
                        </div>
                        <span class="help-block">Kode Barang</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Nama Produk</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-tag"></span></span>
                            <input type="text" class="form-control" name="txtnama" id="txtnama" value="">
                        </div>                                            
                        <span class="help-block">Nama Produk</span>
                    </div>
                </div>


            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-md-3 control-label">Harga Jual</label>
                    <div class="col-md-9">                                                                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                            <input type="text" class="form-control" id="txtharga" name="txtharga" value="" onfocus="this.value=replaceAll(this.value,',','')" onblur="this.value=addCommas(this.value)"/>
                        </div>
                        <span class="help-block">Harga Jual produk</span>
                    </div>
                </div>

               <div class="form-group">
                    <label class="col-md-3 control-label">Harga Beli</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                            <input type="text" class="form-control" name="txthargabl" id="txthargabl" value="" onfocus="this.value=replaceAll(this.value,',','')" onblur="this.value=addCommas(this.value)"/>
                        </div>                                            
                        <span class="help-block">Harga Beli</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
 
               <div class="form-group">
                    <label class="col-md-3 control-label">Pendaftaran</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <input type="checkbox" name="chkdaftar" id="chkdaftar" value="1">
                        </div>                                            
                        <span class="help-block">Produk untuk pendaftaran </span>
                    </div>
                </div>
                
               <div class="form-group">
                    <label class="col-md-3 control-label">Khusus</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <input type="checkbox" name="chkkhusus" id="chkkhusus" value="1">
                        </div>                                            
                        <span class="help-block">Produk Khusus </span>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-3 control-label">Publik</label>
                    <div class="col-md-9">  
                        <div class="input-group">
                            <input type="checkbox" name="chkpublik" id="chkpublik" value="1">
                        </div>                                            
                        <span class="help-block">Produk Aktif </span>
                    </div>
                </div>
                
            </div>                       
        </div>
                <div class="panel-footer">
                    <button type="reset" class="btn btn-default" >Batal</button>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </div>
            </form>
    </div>
</div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>List </strong> Produk</h3>
                <ul class="panel-controls">
                    <li title="Fullscreen" ><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li title="Refresh" onclick="previewData()"><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li title="Minimize" ><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li title="Close" ><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body table-responsive">                                                                        
                <table id="TabelProduk" class="table datatable table-striped table-hover dt-responsive display nowrap">
                    <thead>
                        <tr>
                            <th width="120px" align="center">Kode</th>
                            <th align="center">Nama</th>
                            <th align="center">Keterangan</th>
                            <th width="120px" align="center">Harga Jual</th>
                            <th width="120px" align="center">Harga Beli</th>
                            <th align="center" width="120px">Stock PIN</th>
                            <th align="center" width="120px">PIN Terpakai</th>
                            <th align="center" width="120px">Aksi</th>
                        </tr>
                    </thead>

                </table>
            </div>
            <div class="panel-footer">
            </div>          

        </div>
    </div>
