<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <section class="content-header">
            <h1>
                Suppliers
                <small>index</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="">Attribute</a></li>
                <li class="active">list</li>

            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><a href="<?php echo e('create-suppliers'); ?>" class="btn btn-primary">Thêm
                                    mới </a>
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

                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(Session::get('success')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(Session::has('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(Session::get('error')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($errors->has('description')): ?>
                            <div class="alert alert-danger"><?php echo e($errors->first('description')); ?></div>
                        <?php endif; ?>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th class="text-center">Description</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                        $count = 0;
                                    ?>
                                    <?php if(isset($suppliers)): ?>
                                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $count++;
                                            ?>
                                            <tr>
                                                <td class="h3 text-center" style="line-height: 150px"><?php echo e($count); ?></td>
                                                <td><img src="suppliers-image/<?= $item->image ?>" alt=""
                                                        width="150px" height="150px"></td>
                                                <td style="line-height: 150px" class="h4 text-danger"><?php echo e($item->name); ?></td>
                                                <td style="line-height: 150px"><?php echo e($item->description); ?></td>
                                                <td style="line-height: 150px"><?php echo e($item->email); ?></td>
                                                <td style="line-height: 150px"><?php echo e($item->phone); ?></td>
                                                <td style="line-height: 150px"><?php echo e($item->created_at); ?></td>
                                                <td style="line-height: 150px">
                                                    <a href="<?php echo e(url('edit-suppliers', ['id' => Crypt::encrypt($item->id)])); ?>"
                                                        class="btn btn-xs btn-primary"
                                                        onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i
                                                            class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <form action="<?php echo e(route('suppliers-remove', ['id' => $item->id])); ?>"
                                                        method="POST" style="display:inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-xs btn-danger"
                                                            onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                                class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div id="pageNavPosition" class="text-right">
                                <ul class="pagination">
                                    <!-- Hiển thị link đến trang trước (Previous Page) -->
                                    
                                </ul>
                            </div>
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

<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL_test6\resources\views/Admin/suppliers/index.blade.php ENDPATH**/ ?>