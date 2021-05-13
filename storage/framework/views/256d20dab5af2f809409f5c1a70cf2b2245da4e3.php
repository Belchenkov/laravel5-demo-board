<?php $__env->startComponent('mail::message'); ?>
    # Email Confirmation

    Please refer to the following link:

    <?php $__env->startComponent('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])]); ?>
        Verify Email
    <?php echo $__env->renderComponent(); ?>

    Thanks,<br>
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
