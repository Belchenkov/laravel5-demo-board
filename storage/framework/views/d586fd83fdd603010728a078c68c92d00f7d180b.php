<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Slug</th>
    </tr>
    </thead>
    <tbody>

    <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a href="<?php echo e(route('admin.regions.show', $region)); ?>"><?php echo e($region->name); ?></a></td>
            <td><?php echo e($region->slug); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
