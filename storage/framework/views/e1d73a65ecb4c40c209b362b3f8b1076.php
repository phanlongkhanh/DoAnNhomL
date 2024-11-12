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

<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Check</th>
          <th>Time</th>
          <th>Update</th>
          <th>Action</th>
        </tr>
        <?php if(isset($productTypes)): ?>
            <?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->name); ?></td>       
                    <td><?php echo e($item->description); ?></td>
                    <td>
                        <?php if($item->checkactive == 1): ?>
                            <a href="<?php echo e(route('active-product-type', $item->id)); ?>" class="label label-info status-active">Show</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('active-product-type', $item->id)); ?>" class="label label-default status-active">Hide</a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($item->created_at); ?></td>
                    <td><?php echo e($item->updated_at); ?></td>
                    <td>
                        <a href="<?php echo e(url('edit-producttype', ['id' => Crypt::encrypt($item->id)])); ?>" class="btn btn-xs btn-primary" onclick="return confirm('Bạn có chắc muốn sửa không ?')">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="<?php echo e(route('remove-product-type', $item->id)); ?>" method="POST"
                            style="display:inline;">
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
          
  
          <!-- Hiển thị các số trang đã có -->
          
          <!-- Hiển thị link đến trang tiếp theo (Next Page) -->
          
      </ul>
  </div>
  </div>
<?php /**PATH D:\doan\DoAnNhomL_test6\resources\views/Admin/producttype/data.blade.php ENDPATH**/ ?>