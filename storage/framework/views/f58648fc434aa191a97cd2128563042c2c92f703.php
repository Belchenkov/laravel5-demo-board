<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('cabinet.profile._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <form method="POST" action="<?php echo e(route('cabinet.profile.phone.verify')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="token" class="col-form-label">SMS Code</label>
            <input id="token" class="form-control<?php echo e($errors->has('token') ? ' is-invalid' : ''); ?>" name="token" value="<?php echo e(old('token')); ?>" required>
            <?php if($errors->has('token')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('token')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Verify</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>