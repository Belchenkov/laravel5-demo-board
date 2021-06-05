<?php $__env->startSection('content'); ?>
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a href="<?php echo e(route('admin.home')); ?>" class="nav-link active">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.adverts.adverts.index')); ?>">Adverts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.regions.index')); ?>">Regions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.adverts.categories.index')); ?>">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.users.index')); ?>">Users</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>