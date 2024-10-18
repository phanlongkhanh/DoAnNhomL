<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Product
            <small>Carete</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Product</a></li>
            <li class="active">Create</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
            <form action="#" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="col-md-7">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="pro_name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name ....">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="pro_price">Giá </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" name="price" class="form-control">
                                    <span class="input-group-addon"></span>
                                </div>
                                <small id="emailHelp" class="form-text text-muted "></small>

                            </div>

                            <div class="form-group">
                                <label for="pro_sale">% Giảm Giá</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" name="discount" class="form-control">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."><?php echo e(old('description', '')); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Danh Mục (*)</label>
                                <select name="category_id" class="form-control js-check-type" data-url="">
                                    <?php if(isset($category)): ?>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->checkactive == 1): ?>
                                                <option value="<?php echo e($item->id_category); ?>"><?php echo e($item->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type Product (*)</label>
                                <select name="typeproduct_id" class="form-control js-type-product">
                                    <?php if(isset($producttype)): ?>
                                        <?php $__currentLoopData = $producttype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->checkactive == 1): ?>
                                                <option value="<?php echo e($item->id_producttype); ?>"><?php echo e($item->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Supplier (*)</label>
                                <select name="supplier_id" class="form-control js-type-product">
                                    <?php if(isset($supplier)): ?>
                                        <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>

                            </div>

                            
                            <div class="form-group">
                                <label for="pro_name">Size</label>
                                <input type="text" name="sizes" class="form-control"
                                    placeholder="Enter sizes separated by commas">
                                <small class="form-text text-muted">Enter sizes separated by commas (e.g., Small, Medium,
                                    Large).</small>
                            </div>


                        </div>
                    </div>
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Attribute</h3>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <h5>Loại dây</h5>
                            </div>
                            <div class="col-sm-4">
                                <h5>Đường kính mặt</h5>

                            </div>
                            <div class="col-sm-4">
                                <h5>Năng lượng</h5>
                            </div>
                        </div>
                        <div class="box-body js-attribute">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Content</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Enter ..."></textarea>

                            </div>
                        </div>
                    </div>

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ảnh Đại Diện</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Ảnh Mới</label>
                                <div style="margin-bottom:10px">
                                    <img id="image_preview_container" src="<?php echo e(asset('admin/product.jpg')); ?>"
                                        class="img-thumbnail" style="width: 220px;height:200px" alt="">
                                </div>
                                <input type="file" name="image" id="image" class="js-upload">

                            </div>
                        </div>
                    </div>

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Album ảnh</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="file-loading">
                                    <input type="file" name="file[]" id="file" multiple class="file"
                                        data-overwrite-initial="false" data-min-file-count="0">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="box box-warning">
                        <div class="box-header">
                            <h3 class="box-title">Thuộc Tính</h3>
                        </div>
                        <div class="box-body">
                            

                            

                            

                            <div class="form-group col-sm-6">
                                <label>Số Lượng</label>
                                <input type="number" name="amount" class="form-control" placeholder="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box-footer" style="text-align: center;">
                        <a href="<?php echo e('product'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Trở
                            Lại</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function() {

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            //run js-select2-keyword
            if ($('.js-select2-keyword').length > 0) {
                $('.js-select2-keyword').select2({
                    placeholder: 'Chọn Keyword',
                    maximumSelectionLength: 3
                });

            }


            $('.js-check-type').change(function() {
                let $this = $(this);
                let idCategory = this.value;
                let URL = $this.attr('data-url') + '/' + idCategory;
                if (URL) {
                    $.ajax({
                        url: URL,
                        // data:{
                        //     idCategory:idCategory
                        // },
                        success: function(results) {
                            $('.js-type-product').html(results.type_product)
                            $('.js-attribute').html(results.attribute)
                        },
                        error: function(error) {
                            console.log(error.messages);
                        }
                    });
                }
            });

            // $(document).on('keyup','.pro_price_js',function(e){
            //     e.preventDefault();
            //     var res = $(this).val();
            //     res = new Intl.NumberFormat('en-IN').format(res);
            //     $('.convert-price-js').html(res + ' vnd');
            // });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\doannhoml\resources\views/Admin/product/create.blade.php ENDPATH**/ ?>