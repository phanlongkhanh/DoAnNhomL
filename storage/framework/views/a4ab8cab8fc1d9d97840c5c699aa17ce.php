<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Category Post
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Category</a></li>
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
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày thêm</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Người thêm</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                                <?php
                                    $count = 0;
                                ?>


                                <?php if(isset($categories)): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo e($count); ?></td>
                                            <td><?php echo e($item->id); ?></td>

                                            <td><img src="images/<?= $item->image ?>" alt="" width="200px"
                                                    height="150px"></td>

                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->description); ?></td>
                                            <td>
                                                <?php if($item->checkactive): ?>
                                                    <a href="<?php echo e(route('activecategory', ['id' => $item->id])); ?>"
                                                        class="label label-info status-active">Show</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('activecategory', ['id' => $item->id])); ?>"
                                                        class="label label-default status-active">Hide</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->created_at); ?></td>
                                            <td><?php echo e($item->updated_at); ?></td>
                                            
                                            <td><?php echo e($item->admin ? $item->admin->name : 'N/A'); ?></td>



                                            <td>
                                                <a href="<?php echo e(route('editcategory', ['id' => $item->id])); ?>"
                                                    class="btn btn-xs btn-primary"
                                                    onclick="return confirm('Bạn chắc chắn là sửa chứ?')">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>

                                                <form action="<?php echo e(route('deletecategory', ['id' => $item->id])); ?>"
                                                    method="POST" style="display:inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-xs btn-danger js-delete-confirm"
                                                        onclick="return confirm('Bạn chắc chắn là xóa chứ?')"><i
                                                            class="fa fa-trash"></i> Delete</button>
                                                </form>


                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10" class="text-center">Không có danh mục nào.</td>
                                    </tr>
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


<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL_test6\resources\views/Admin/post_category/index.blade.php ENDPATH**/ ?>