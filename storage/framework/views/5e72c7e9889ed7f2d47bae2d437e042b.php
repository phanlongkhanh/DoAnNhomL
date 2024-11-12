<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Quản lý đơn hàng
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">transaction</a></li>
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
                        <div class="box-title">
                            <form action="" method="GET" class="form-inline">
                                <input type="text" value="<?php echo e(Request::get('id')); ?>" class="form-control" name="id"
                                    placeholder="ID">
                                <input type="text" value="<?php echo e(Request::get('email')); ?>" class="form-control"
                                    name="email" placeholder="Email ...">
                                
                                <select name="status" class="form-control">
                                    <option value="0">__Trạng Thái__</option>
                                    <option value="1" <?php echo e(Request::get('status') == 1 ? "selected='selected'" : ''); ?>>
                                        Tiếp Nhận</option>
                                    <option value="2" <?php echo e(Request::get('status') == 2 ? "selected='selected'" : ''); ?>>
                                        Đang Vận Chuyển</option>
                                    <option value="3" <?php echo e(Request::get('status') == 3 ? "selected='selected'" : ''); ?>>Đã
                                        Bàn Giao</option>
                                    <option value="-1" <?php echo e(Request::get('status') == -1 ? "selected='selected'" : ''); ?>>
                                        Hủy Bỏ</option>
                                </select>
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"> </i> Search</button>
                            </form>
                        </div>
                    </div>

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
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Thông tin khách hàng</th>
                                    <th>Thông tin Sản Phẩm</th>

                                    <th>Phương thức</th>


                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                <?php if(isset($pays)): ?>
                                    <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td>
                                                <ul>
                                                    <li>Họ Tên: <?php echo e($item->user->name); ?> </li>
                                                    <li>Địa Chỉ: <?php echo e($item->address); ?> </li>
                                                    <li>SĐT: <?php echo e($item->phone); ?></li>
                                                </ul>
                                            </td>

                                            <td>
                                                <ul>
                                                    <li>Tên Sản Phẩm: <?php echo e($item->name); ?> </li>
                                                    <li>Số Lượng: <?php echo e($item->amount); ?> </li>
                                                    <li>Giá Tiền: <?php echo e(number_format($item->price, 0, ',', '.')); ?> VNĐ</li>
                                                    <li>Tổng Tiền:<?php echo e(number_format($item->total_price, 0, ',', '.')); ?> VNĐ
                                                    </li>
                                                </ul>
                                            </td>

                                            <td>
                                                <ul>
                                                    <li>Phương Thức Thanh Toán: <?php echo e($item->payment->name); ?> </li>
                                                    <li>Phương Thức Vận Chuyển: <?php echo e($item->transport->name); ?> </li>
                                                </ul>
                                            </td>

                                            <td><?php echo e($item->created_at); ?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-xs">Action</button>
                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="" class="js-delete-confirm">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="<?php echo e(route('pays.updateStatus', ['id' => $item->id, 'status' => 'Đang vận chuyển'])); ?>"
                                                                class="text-warning">
                                                                <i class="fa fa-hourglass-start"></i> Đang Vận Chuyển
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo e(route('pays.updateStatus', ['id' => $item->id, 'status' => 'Đã bàn giao'])); ?>"
                                                                class="text-success">
                                                                <i class="fa fa-check"></i> Đã Bàn Giao
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo e(route('pays.updateStatus', ['id' => $item->id, 'status' => 'Hủy'])); ?>"
                                                                class="text-danger">
                                                                <i class="fa fa-ban"></i> Hủy
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a href="" class="btn btn-xs btn-info js-preview-transaction"><i
                                                        class="fa fa-eye"></i>View</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p>không có sản phẩm</p>
                                <?php endif; ?>
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


<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL_test6\resources\views/Admin/oders/index.blade.php ENDPATH**/ ?>