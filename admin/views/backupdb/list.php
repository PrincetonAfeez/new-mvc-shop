<?php require('admin/views/shared/header.php'); ?>
<?php require('admin/views/shared/loader.php'); ?>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<?php require('admin/views/shared/formsearch.php'); ?>
<?php require('admin/views/shared/rightnavbar.php'); ?>
<?php require('admin/views/shared/leftnavbar.php'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=backupdb">BackUp</a></li>
                        <li class="breadcrumb-item active">Backup database</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Truy Xuất Dữ Liệu</strong> "Backup database" </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên file CSDL đã backup</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên file CSDL đã backup</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $stt = 0; //https://xuanthulab.net/lay-thong-tin-he-thong-file-thu-muc-trong-php-cung-directoryiterator.html
                                        foreach (new DirectoryIterator('admin/database') as $filename) :
                                            if ($filename->isDot()) continue;
                                            $stt++; ?>
                                            <tr>
                                                <td><?php echo $stt ?></td>
                                                <td><?= $filename ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="admin/themes/bundles/libscripts.bundle.js"></script>
<script src="admin/themes/bundles/vendorscripts.bundle.js"></script>
<script src="admin/themes/bundles/datatablescripts.bundle.js"></script>
<script src="admin/themes/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="admin/themes/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="admin/themes/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="admin/themes/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="admin/themes/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="admin/themes/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="admin/themes/bundles/mainscripts.bundle.js"></script>
<script src="admin/themes/js/pages/tables/jquery-datatable.js"></script>
</body>

</html>