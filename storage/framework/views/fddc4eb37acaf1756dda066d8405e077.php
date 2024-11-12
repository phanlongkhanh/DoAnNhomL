<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Article
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Article</a></li>
            <li class="active">list</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="<?php echo e('create-post'); ?>" class="btn btn-primary">Thêm mới </a>
                        </h3>
                        
                        <div class="box-tools">
                            <form action="#">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="key" value="<?php echo e(request()->input('key')); ?>"
                                           class="form-control pull-right" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>STT</th>
                                <th>Người viết</th>
                                <th>description</th>
                                <th>active</th>
                                <th>Times</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $count = 0;
                            ?>

                                  
                                        <?php
                                            $count ++;
                                        ?>
                                        <tr>
                                            <td>   </td>
                                            <td>  </td>
                                            <td>   </td>
                                            <td><img src="#" alt="" height="80px"></td>
                                            <td>  </td>
                                            <td>
                                                <a href="#"
                                                   class="btn btn-xs btn-primary"
                                                   onclick="return confirm('Bạn chắc sửa không nè')"><i
                                                        class="fa fa-pencil"></i> Edit</a>
                                                <a href="#"
                                                   class="btn btn-xs btn-danger js-delete-confirm"
                                                   onclick="return confirm('Bạn chắc xoá không nè')"><i
                                                        class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                    
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.box-body -->
                    
                    <div></div>
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

<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL\resources\views/Admin/post/index.blade.php ENDPATH**/ ?>