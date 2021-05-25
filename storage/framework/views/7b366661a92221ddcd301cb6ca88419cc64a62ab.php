<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('cabinet.adverts._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <p>Choose category:</p>

    <?php echo $__env->make('cabinet.adverts.create._categories', ['categories' => $categories], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>