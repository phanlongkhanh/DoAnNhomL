<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>SL - còn</th>
                <th>Category</th>
                <th>Avatar</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Status</th>
                <th>Times</th>
                <th>Action</th>
            </tr>
            <?php
                $i = 0;
            ?>
            <?php if(isset($products)): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo e($i); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        
                        <td><?php echo e($item->amount); ?></td>
                        <td><?php echo e($item->category->name); ?></td>
                        
                        <td><img src="images/<?= $item->image ?>" alt="" width="200px" height="150px"></td>
                        <td><?php echo e($item->price); ?></td>
                        <td>
                            <?php if($item->discount): ?>
                                <span class="label label-default"
                                    style="text-decoration: line-through;"><?php echo e(number_format($item->price, 0, ',', '.')); ?>

                                    VND</span><br>
                                <?php
                                    $price = $item->price * (1 - $item->discount / 100);
                                ?>
                                <span class="label label-success"><?php echo e(number_format($price, 0, ',', '.')); ?> VND</span><br>
                                <span>Giảm <?php echo e($item->discount); ?>%</span>
                            <?php else: ?>
                                <span class="label label-success"><?php echo e(number_format($item->price, 0, ',', '.')); ?>

                                    VND</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($item->checkactive == 1): ?>
                                <a href="" class="label label-info status-active">Hot</a>
                            <?php else: ?>
                                <a href="" class="label label-default status-active">No</a>
                            <?php endif; ?>
                        </td>

                        <td><?php echo e($item->created_at); ?></td>
                        
                        <td>
                            <a href="#" class="btn btn-xs btn-primary"
                                onclick="return confirm('Bạn có Sửa không nè')"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="btn btn-xs btn-danger js-delete-confirm"
                                onclick="return confirm('Bạn có chắc xoá không nè')"><i class="fa fa-trash"></i>
                                Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>

    </table>
    <div id="pageNavPosition" class="text-right">
        


    </div>
</div>
<?php /**PATH D:\doan\DoAnNhomL\resources\views/admin/product/data.blade.php ENDPATH**/ ?>