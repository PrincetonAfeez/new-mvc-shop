<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><? ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=product">Product</a></li>
                        <li class="breadcrumb-item active"><?php echo $product ? 'Cập nhật sản phẩm: ' . $product['product_name']  : 'Thêm sản phẩm mới'; ?></li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        <strong><?php echo $product ? 'Cảnh Báo: </strong> Bạn đang trong trang chỉnh sửa của sản phẩm "' . $product['product_name'] . '", Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>' : 'Cảnh Báo: </strong> Bạn đang trong trang tạo một sản phẩm mới, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>'; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=product&amp;action=edit" enctype="multipart/form-data" role="form">
                                <input name="product_id" type="hidden" value="<?php echo $product ? $product['id'] : '0'; ?>" />
                                <h2 class="card-inside-title" style="font-weight:bold;">Tên Sản Phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name" type="text" value="<?php echo $product ? $product['product_name'] : ''; ?>" class="form-control" id="name" placeholder="Nhập tên sản phẩm..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Slug (Đường dẫn link product):</h2>
                                <p>Đường dẫn link sẽ tự động được tạo giống với tên danh mục...</p>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input disabled name="slug" type="text" value="<?php echo $product ? $product['slug'] : ''; ?>" class="form-control" id="slug" placeholder="Nhập đường dẫn link sản phẩm..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Loại Sản Phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="type_id" class="form-control show-tick">
                                            <?php foreach ($types as $type) {
                                                $selected = '';
                                                if ($product && ($product['product_typeid'] == $type['id'])) $selected = 'selected=""';
                                                echo '<option value="' . $type['id'] . '" ' . $selected . '>' . $type['type_name'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Nhóm Danh Mục:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="category_id" class="form-control show-tick">
                                            <?php foreach ($categories as $category) {
                                                $selected = '';
                                                if ($product && ($product['category_id'] == $category['id'])) $selected = 'selected=""';
                                                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['category_name'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Danh Mục Con:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="subcategory_id" class="form-control show-tick">
                                            <?php foreach ($subcategories as $subcategory) {
                                                $selected = '';
                                                if ($product && ($product['sub_category_id'] == $subcategory['id'])) $selected = 'selected=""';
                                                echo '<option value="' . $subcategory['id'] . '" ' . $selected . '>' . $subcategory['subcategory_name'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Giá Sản Phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="price" type="text" value="<?php echo $product ? number_format($product['product_price'], 0, ',', '.') : 0; ?>" class="form-control" id="price" placeholder="0" pattern="[0-9\.]+" required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Màu cho sản phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="color" type="text" value="<?php echo $product ? $product['product_color'] : ''; ?>" class="form-control" id="color" placeholder="Color..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Kích cỡ cho sản phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="size" type="text" value="<?php echo $product ? $product['product_size'] : ''; ?>" class="form-control" id="size" placeholder="Size ..." />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Chất liệu của sản phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="material" type="text" value="<?php echo $product ? $product['product_material'] : ''; ?>" class="form-control" id="material" placeholder="Material ..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Lượt xem sản phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="totalview" type="text" value="<?php echo $product ? $product['totalView'] : ''; ?>" class="form-control" id="totalview" placeholder="Lượt view..." />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Lựa chọn giảm giá (Sale off):</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php if (isset($product)) : ?>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="status" id="male" class="with-gap" value="1" <?php if ($product['saleoff'] == "1") echo "checked"; ?>>
                                                    <label for="male">Bật giảm giá</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="Female" class="with-gap" <?php if ($product['saleoff'] == "0") echo "checked"; ?> value="0">
                                                    <label for="Female">Không giảm giá</label>
                                                </div>
                                            <?php else : ?>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="status" id="male" class="with-gap" value="1" ?>
                                                    <label for="male">Bật giảm giá</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="status" id="Female" class="with-gap" checked value="0">
                                                    <label for="Female">Không giảm giá</label>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Số % giảm giá sản phẩm (chỉ nhập nếu chọn "bật giảm giá"):</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="percent_off" type="text" value="<?php echo $product ? $product['percentoff'] : ''; ?>" class="form-control" id="percent_off" placeholder="Number Precent Off ..." />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Chọn ngày tạo mới sản phẩm:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <input name="createdate" id="createdate" type="date" value="<?php echo $product ? $product['createDate'] : date('d/m/Y'); ?>" class="form-control" placeholder="Please choose date & time...">
                                    </div>
                                </div>
                                <!-- <div class="card col-md-2">
                                    <div class="header">
                                        <h2 style="text-align: center;">Ảnh Đại Diện</h2>
                                    </div>
                                    <div class="body">
                                        <input name="img1" type="file" class="form-control dropify" accept="image/*">
                                    </div>
                                </div>
                                <div class="card col-md-2">
                                    <div class="header">
                                        <h2 style="text-align: center;">Ảnh 2</h2>
                                    </div>
                                    <div class="body">
                                        <input name="img2" type="file" class="form-control dropify">
                                    </div>
                                </div>
                                <div class="card col-md-2">
                                    <div class="header">
                                        <h2 style="text-align: center;">Ảnh 3</h2>
                                    </div>
                                    <div class="body">
                                        <input name="img3" type="file" class="form-control dropify">
                                    </div>
                                </div>
                                <div class="card col-md-2">
                                    <div class="header">
                                        <h2 style="text-align: center;">Ảnh 4</h2>
                                    </div>
                                    <div class="body">
                                        <input name="img4" type="file" class="form-control dropify">
                                    </div>
                                </div>-->
                                <br><br>
                                <div class="form-group" style="text-align: center;">
                                    <button class="btn btn-primary waves-effect" type="submit"><?php echo $product ? 'Cập nhật sản phẩm trên' : 'Thêm sản phẩm mới'; ?></button>
                                    <a class="btn btn-warning waves-effect" href="admin.php?controller=product">Trở về</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>