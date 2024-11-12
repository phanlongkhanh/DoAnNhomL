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
        <!-- Thông báo -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="/add-account" class="btn btn-primary">Thêm mới </a>
                        </h3>
                        

                        <form action="<?php echo e(url('account-index')); ?>" method="GET" class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right ajax-search-table" placeholder="Search by ID or Name" data-url="" value="<?php echo e(request('search')); ?>">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
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
                                    <th>Active</th>
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
                                            $count++;
                                        ?>

                                        <tr>
                                            <td><?php echo e($count); ?></td>
                                            <td><?php echo e($users->id); ?></td>
                                            <td><?php echo e($users->name); ?></td>
                                            <td><?php echo e($users->email); ?></td>
                                            <td><?php echo e($users->role_name); ?></td>

                                            
                                            


                                            

                                            <td>
                                                <?php if(auth()->user()->role_name === 'admin'): ?> <!-- Kiểm tra nếu người dùng là admin -->
                                                    <form action="<?php echo e(url('toggle-account/' . Crypt::encrypt($users->id))); ?>" method="POST" style="display:inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PATCH'); ?> <!-- Sử dụng PATCH cho việc cập nhật trạng thái -->
                                                        <button type="submit" class="label <?php echo e($users->checkactive ? 'label-info' : 'label-default'); ?> status-active"
                                                                onclick="return confirm('Bạn chắc chắn muốn <?php echo e($users->checkactive ? 'khóa' : 'mở khóa'); ?> tài khoản này?')">
                                                            <?php echo e($users->checkactive ? 'Lock' : 'Unlock'); ?> <!-- Hiển thị trạng thái -->
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <button type="button" class="label label-default status-active"
                                                            onclick="alert('Chỉ có admin mới có quyền này'); return false;">
                                                        <?php echo e($users->checkactive ? 'Lock' : 'Unlock'); ?>

                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                            
                                            
                                            
                                            <td><?php echo e($users->created_at); ?></td>
                                            
                                            <td><?php echo e($users->updated_at); ?></td>
                                            
                                            
                                            
                                            <td>
                                                

                                                <a href="<?php echo e(url('edit-account/' . Crypt::encrypt($users->id))); ?>"
                                                    class="btn btn-xs btn-primary"
                                                    onclick="return confirm('Bạn chắc chắn là sửa chứ')">
                                                    <i class="fa fa-pencil"></i> Edit </a>

                                                <form action="<?php echo e(url('delete-account/' . $users->id)); ?>" method="POST" style="display:inline;">
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


<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL\resources\views/Admin/account/index.blade.php ENDPATH**/ ?>