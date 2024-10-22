

<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        User
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">User</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <form role="form" action="<?php echo e(url('update-account/' . $user->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="col-sm-8">
                        <div class="form-group <?php echo e($errors->first('name') ? 'has-error' : ''); ?>">
                            <label for="name">Name <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required>
                            <?php if($errors->first('name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group <?php echo e($errors->first('email') ? 'has-error' : ''); ?>">
                            <label for="email">Email <span class="text-danger">(*)</span></label>
                            <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>
                            <?php if($errors->first('email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password (leave blank if not changing)</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter new password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                        </div>

                        <div class="form-group <?php echo e($errors->first('phone') ? 'has-error' : ''); ?>">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                            <?php if($errors->first('phone')): ?>
                                <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group <?php echo e($errors->first('role_id') ? 'has-error' : ''); ?>">
                            <label for="role_id">Role ID <span class="text-danger">(*)</span></label>
                            <input type="number" class="form-control" name="role_id" value="<?php echo e($user->role_id); ?>" required>
                            <?php if($errors->first('role_id')): ?>
                                <span class="text-danger"><?php echo e($errors->first('role_id')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo e(url('account-index')); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Back</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL\resources\views/Admin/account/edit.blade.php ENDPATH**/ ?>