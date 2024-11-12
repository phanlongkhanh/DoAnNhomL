<?php $__env->startSection('content'); ?>
    <section class="content-header">
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
        
        <h1>
            User
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="">User</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-primary">
                <form role="form" action="<?php echo e(url('add-account')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('name') ? 'has-error' : ''); ?>">
                                <label for="name">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name ......"
                                    required>
                                <?php if($errors->first('name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group <?php echo e($errors->first('email') ? 'has-error' : ''); ?>">
                                <label for="email">Email <span class="text-danger">(*)</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Email ......"
                                    required>
                                <?php if($errors->first('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group <?php echo e($errors->first('password') ? 'has-error' : ''); ?>">
                                <label for="password">Password <span class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Password ......"
                                    required>
                                <?php if($errors->first('password')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group <?php echo e($errors->first('password_confirmation') ? 'has-error' : ''); ?>">
                                <label for="password_confirmation">Confirm Password <span
                                        class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm Password ......" required>
                                <?php if($errors->first('password_confirmation')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group <?php echo e($errors->first('phone') ? 'has-error' : ''); ?>">
                                <label for="phone">Phone <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone ......"
                                    required>
                                <?php if($errors->first('phone')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                                <?php endif; ?>
                            </div>

                            

                            <div class="form-group <?php echo e($errors->first('role_id') ? 'has-error' : ''); ?>">
                                <label for="role_id">Vai trò <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="role_id" required>
                                    <option value="">Chọn vai trò</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->first('role_id')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('role_id')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="#" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            $('#fileInput').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ControllerAdmin.dashboard_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\DoAnNhomL\resources\views/Admin/account/create.blade.php ENDPATH**/ ?>