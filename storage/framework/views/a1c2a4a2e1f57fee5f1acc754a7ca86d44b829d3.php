<?php $__env->startSection('content'); ?>
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('cabinet.home')); ?>">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('cabinet.adverts.index')); ?>">Adverts</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('cabinet.profile.home')); ?>">Profile</a></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>