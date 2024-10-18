<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Account
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Account</a></li>
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
                        <h3 class="box-title"><a href="#" class="btn btn-primary">Thêm mới </a>
                        </h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right ajax-search-table"
                                       placeholder="Search" data-url="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover ">
                            <tbody>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Ngày thêm</th>
                                <th>Ngày cập nhật</th>
                                <th>Chỉnh sửa</th>
                            </tr>             
                            <?php
                                $count = 0;
                            ?>
                            <?php if(isset($status)): ?>
                                <tr>
                                    <td><?php echo e($status); ?></td>
                                </tr>
                            <?php endif; ?>



                            <?php if(isset($users)): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $count ++;
                                    ?>

                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td><?php echo e($users->id); ?></td>
                                        
                                        
                                        <td><?php echo e($users->name); ?></td>
                                        <td><?php echo e($users->email); ?></td>
                                        <td><?php echo e($users->role_id); ?></td>
                                        
                                        
                                        
                                        <td><?php echo e($users->created_at); ?></td>
                                        
                                        <td><?php echo e($users->updated_at); ?></td>
                                        
                                         
                                        
                                        <td>
                                            <a href="#"
                                               class="btn btn-xs btn-primary"
                                               onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <a href="#"
                                               class="btn btn-xs btn-danger js-delete-confirm"
                                               onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>                     
                        </table>
                        
                        
                        <!-- Phân trang  bắt đầu-->
                        <div id="pageNavPosition" class="text-right">
                            <ul class="pagination">
                                <!-- Hiển thị link đến trang trước (Previous Page) -->
                                

                                <!-- Hiển thị các số trang đã có -->
                                

                                <!-- Hiển thị link đến trang tiếp theo (Next Page) -->
                                
                                
                            </ul>
                            
                        </div>
                        
                    </div>
                    

                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\doannhoml\resources\views/Admin/account/index.blade.php ENDPATH**/ ?>