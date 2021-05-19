<?php $__env->startSection('breadcrumbs', ''); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">Hello</div>

        <div class="card-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            Your site
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>