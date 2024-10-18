<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            CateGory
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="">Category</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="box box-primary">
                <form role="form" action="#" method="get" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('category_name') ? 'has-error' : ''); ?>">
                                <label for="name">Name<span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="category_name" placeholder="Name ......"
                                       required>
                                <?php if($errors->first('category_name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('category_name')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php echo e($errors->first('category_description') ? 'has-error' : ''); ?>">
                                <label>Description<span class="text-danger">(*)</span></label>
                                <textarea class="form-control" name="category_description" rows="3"
                                          placeholder="Enter ..." required></textarea>
                                <?php if($errors->first('category_description')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('category_description')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php echo e($errors->first('category_image') ? 'has-error' : ''); ?>">
                                <label for="fileInput">Image<span class="text-danger">(*)</span></label>
                                <input type="file" class="form-control-file" id="fileInput" name="category_image"
                                       required>
                                <?php if($errors->first('category_image')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('category_image')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo e(route('indexcategory')); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function () {
            $('#image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\doannhoml\resources\views/Admin/category/create.blade.php ENDPATH**/ ?>