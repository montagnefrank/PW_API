<?php
////////////////////////////////////////////////////////////////////////////PROVEEDORES  VIEW
?>
<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="main.php">homecubic</a></li>
    <li>Website</li>
    <li class="active">Proveedores</li>
</ul>
<!-- BREADCRUMB --> 
<div class="page-content-wrap">   
    <?php
    if (isset($_SESSION['msg'])) {
        echo '
                <div class="row notificactionbox">
                    <div class="col-md-12">
                        <div class="widget widget-';
        echo $_SESSION['box'];
        echo ' widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-exclamation"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-title">Notificación</div>
                                <div class="widget-subtitle">
                                    <div role="alert">
                                        ' . $_SESSION['msg'] . '
                                    </div>
                                </div>
                            </div>
                            <div class="widget-controls">                                
                                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                            </div>                             
                        </div>
                    </div>
                </div>
        ';
        unset($_SESSION['msg']);
    }
    ?>

    <div class="col-md-6 clientsaddnew">   
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-cogs"></span> Nuevo Proveedor</h3>                                
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                                   
            </div>
            <div class="panel-body">
                <form id="member_form" action="<?php echo "assets/modules/" . $panel . "/control.php"; ?>" role="form" class="form-horizontal" method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6>Logo de proveedor <span data-toggle="tooltip" 
                              data-placement="top" 
                              title="200 x 200" 
                              class="pull-right fa fa-exclamation-circle"></span></h6>
                        </div>
                        <div class="panel-body">                                   
                            <div style="margin-top: 10px; margin-bottom: 10px;margin-left: 20px;">
                                <input name="provProfile_file" type="file" id="file-simple1"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-10">
                            <input name="name_prov" type="text" class="form-control" placeholder="Nombre del Proveedor" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Estado</label>
                        <div class="col-md-10">
                            <label class="switch">
                                <input type="checkbox" class="switch switchcheck" name="status_check"  value="1" checked="checked"/>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <button class="pull-right btn btn-success" 
                        name="newprov"  
                        type="submit"  
                        id="newprov" 
                        data-toggle="tooltip" 
                        data-placement="right" 
                        title="Nuevo Proveedor">
                    <span class="beforeLoad" ><span class="fa fa-save"></span> Guardar Cambios </span>
                    <img class="loading_img" src="assets/img/loadingbar.gif" width="80" style="display: none;" />
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4 class="text-title">Proveedores</h4>
                <form action="<?php echo "assets/modules/" . $panel . "/control.php"; ?>" role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <?php
                        $menu_select = "SELECT idProv,photoProv,nameProv,statusProv FROM hc_prov ";
                        $menu_result = $link->query($menu_select) or die($link->error);
                        $idlist = '';
                        while ($menu_row = $menu_result->fetch_array(MYSQLI_BOTH)) {
                            if ($menu_row['statusProv'] == 1) {
                                $checked = 'checked';
                            } else {
                                $checked = '';
                            }
                            echo '   
                            <div class="col-md-2 col-xs-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <a href="#" class="friend">
                                            <img src="../assets/img/prov/' . $menu_row['photoProv'] . '.png"/>
                                            <span>' . $menu_row['nameProv'] . '</span>
                                            <label class="switch">
                                                <input type="checkbox" class="switch" name="' . $menu_row['idProv'] . '_check"  value="1" ' . $checked . '/>
                                                <span></span>
                                            </label>
                                            <i class="fa fa-times-circle-o deletetimes" aria-hidden="true" onClick="notyConfirm(' . $menu_row['idProv'] . ');"></i>
                                        </a>                                            
                                    </div>
                                </div>
                            </div>
                         ';
                            $idlist .= $menu_row['idProv'] . ",";
                        }
                        $idlist = substr(trim($idlist), 0, -1);
                        echo '<input name="idList" type="hidden" class="form-control" value="' . $idlist . '" >'
                        ?>
                    </div>
            </div>
            <div class="panel-footer">
                <button class="pull-right btn btn-success" name="editprov"  type="submit"  id="editprov" data-toggle="tooltip" data-placement="right" title="Editar Proveedores">
                    <span class="beforeLoad" ><span class="fa fa-save"></span> Guardar Cambios </span>
                    <img class="loading_img" src="assets/img/loadingbar.gif" width="80" style="display: none;">
                </button>
            </div>
            </form>
        </div>
    </div>
</div>