<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('cabinet.profile._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="mb-3">
        <a href="<?php echo e(route('cabinet.profile.edit')); ?>" class="btn btn-primary">Edit</a>
    </div>

    <table class="table table-bordered">
        <tbody>
        <tr>
            <th>First Name</th><td><?php echo e($user->name); ?></td>
        </tr>
        <tr>
            <th>Last Name</th><td><?php echo e($user->last_name); ?></td>
        </tr>
        <tr>
            <th>Email</th><td><?php echo e($user->email); ?></td>
        </tr>
        <tr>
            <th>Phone</th><td>
                <?php if($user->phone): ?>
                    <?php echo e($user->phone); ?>

                    <?php if(!$user->isPhoneVerified()): ?>
                        <i>(is not verified)</i><br />
                        <form method="POST" action="<?php echo e(route('cabinet.profile.phone')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-success">Verify</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
        </tr>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>