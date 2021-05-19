<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.regions._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <p><a href="<?php echo e(route('admin.regions.create')); ?>" class="btn btn-success">Add Region</a></p>

    <?php echo $__env->make('admin.regions._list', ['regions' => $regions], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>