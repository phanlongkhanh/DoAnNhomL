<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
      Product Type
      <small>index</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">TyPe</a></li>
      <li class="active">list</li>

    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
     <?php endif; ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="<?php echo e('product-type-create'); ?>" class="btn btn-primary">Thêm mới </a></h3>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div id="js-data">
                    <?php echo $__env->make('Admin.producttype.data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
              <!-- /.box-body -->

            </div>
            <!-- /.box -->
          </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL_test6\resources\views/Admin/producttype/index.blade.php ENDPATH**/ ?>