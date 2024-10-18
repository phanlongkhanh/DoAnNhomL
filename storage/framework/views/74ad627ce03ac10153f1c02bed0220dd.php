<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            CateGory
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
                        <h3 class="box-title"><a href="<?php echo e('add-category'); ?>" class="btn btn-primary">Thêm mới </a>
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
                            <?php if(isset($status)): ?>
                                <tr>
                                    <td><?php echo e($status); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if(isset($category)): ?>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $count ++;
                                    ?>
                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td><?php echo e($item->id_category); ?></td>
                                        
                                        <td><img src="<?php echo e(parse_url($item->image)['path']); ?>" alt="" width="150px"
                                                 height="100px"></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->discription); ?></td>
                                        
                                        <td>
                                            <?php if($item->checkactive==1): ?>
                                                <a href="<?php echo e(route('activecategory',['id'=>$item->id_category])); ?>"
                                                   class="label label-info status-active">Show</a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('activecategory',['id'=>$item->id_category])); ?>"
                                                   class="label label-default status-active">Hide</a>
                                            <?php endif; ?>
                                        </td>
                                        
                                        <td><?php echo e($item->created_at); ?></td>
                                        
                                        <td><?php echo e($item->updated_at); ?></td>
                                        
                                         <td><?php echo e($item->admin->name); ?></td>
                                        
                                        <td>
                                            <a href="<?php echo e(route('editcategory',['id'=>$item->id_category])); ?>"
                                               class="btn btn-xs btn-primary"
                                               onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?php echo e(route('deletecategory',['id'=>$item->id_category])); ?>"
                                               class="btn btn-xs btn-danger js-delete-confirm"
                                               onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                            <tr>
                                <th>1</th>
                                <th>1</th>
                                <th>Hình ảnh 1</th>
                                <th>Sản Phẩm 1</th>
                                <th>Sản Phẩm 1</th>
                                <th>active</th>   
                                <th>02/10/2024</th>
                                <th>03/10/2024</th>
                                <th>PhanLongKhanh</th>
                                <th>                                  
                                    <a href="<?php echo e("edit-category"); ?>"
                                       class="btn btn-xs btn-primary"
                                       onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i
                                         class="fa fa-pencil"></i> Edit</a>
                                    <a href="#"
                                       class="btn btn-xs btn-danger js-delete-confirm"
                                       onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                         class="fa fa-trash"></i> Delete</a>  
                                </th>
                            </tr>   
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


<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CNTT\ChuyenDePhatTrienWeb\DoAn\DoAnNhomL\resources\views/Admin/category/index.blade.php ENDPATH**/ ?>