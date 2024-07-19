<?php

if(isset($_GET['i']))
{
    if($_GET['i']>0){
        $arid=$_GET['i'];
        require_once("../include/koneksi.php");
        $sqlArt="SELECT * FROM artikel WHERE ID='".$arid."'";
        $rsArt=mysqli_query($conn,$sqlArt)->fetch_assoc();
    }
?>
<form class="form-horizontal" name="frmarticle" id="frmarticle" method="post" onsubmit="return SaveArt()">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title"><strong>Edit </strong> Artikel</h3>
                    <ul class="panel-controls">
                        <li title="Simpan"><a href="#" class="" onclick="SaveArt()"><span class="fa fa-save"></span></a></li>
                    <li title="Fullscreen" ><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li title="Minimize" ><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li title="Close" ><a href="#" onclick="window.location.href='.?p=artikel'"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>


<div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="hdnID" value="<?=isset($arid)?$arid:""?>"/>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kategori</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <select class="form-control select" name="slcCategory" id="#slcCategory">
                                        <?php
                                        require_once("../include/koneksi.php");
                                        $sqlkartikel = "SELECT * FROM kartikel";
                                        $rskartikel = mysqli_query($conn,$sqlkartikel);
                                        while($data = $rskartikel->fetch_assoc())
                                        {   ?>
                                            <option value="<?=$data["id"]?>" <?=isset($arid)?(($data["id"]==$rsArt["Category"])?" selected":""):""?> ><?=$data["tipe"]?></option>
                                <?php   }   ?>
                                        </select>

                                </div>                                            
                                <span class="help-block">Pilihlah jenis kategori untuk artikel ini</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Judul</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" name="txtJudul" value="<?=isset($arid)?$rsArt["Judul"]:""?>" />
                                </div>                                            
                                <span class="help-block">Judul Artikel akan ditampilkan di beberapa tempat</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">           
                    <textarea class="editor ck-editor__editable_inline" name="txtArtikel" id="txtArtikel"><?=isset($arid)?$rsArt["Isi"]:""?></textarea>
                </div>
            </div>
</div>
        <!-- </div> -->
        <div class="panel-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href='.?p=artikel'">Batal</button>
          <button type="submit" class="btn btn-primary pull-right">Simpan</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


</form>
<?php

}
else
{
?>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Data </strong> Artikel</h3>
                <ul class="panel-controls">
                    <li title="Tulis Artikel Baru" onclick="window.location.href='.?p=artikel&i='"><a href="#" ><span class="fa fa-plus"></span></a></li>
                    <li title="Fullscreen" ><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li title="Refresh" onclick="previewData()"><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li title="Minimize" ><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li title="Close" ><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body table-responsive">                                                                        

                <table id="TabelLaporan" class="table datatable table-striped table-hover dt-responsive display nowrap">
                    <thead>
                        <tr>
                            <th width="80px" align="center">ID</th>
                            <th align="left">Judul</th>
                            <th align="left">Kategori</th>
                            <th align="center" width="80px">Penulis</th>
                            <th align="center" width="150px">Updated</th>
                            <th align="center" width="150px">Aksi</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
<?php
}
?>