<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.adverts.categories._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="d-flex flex-row mb-3">
        <a href="<?php echo e(route('admin.adverts.categories.edit', $category)); ?>" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="<?php echo e(route('admin.adverts.categories.destroy', $category)); ?>" class="mr-1">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td><?php echo e($category->id); ?></td>
        </tr>
        <tr>
            <th>Name</th><td><?php echo e($category->name); ?></td>
        </tr>
        <tr>
            <th>Slug</th><td><?php echo e($category->slug); ?></td>
        </tr>
        <tbody>
        </tbody>
    </table>

    <p><a href="<?php echo e(route('admin.adverts.categories.attributes.create', $category)); ?>" class="btn btn-success">Add Attribute</a></p>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Sort</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Required</th>
        </tr>
        </thead>
        <tbody>

        <tr><th colspan="4">Parent attributes</th></tr>

        <?php $__empty_1 = true; $__currentLoopData = $parentAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($attribute->sort); ?></td>
                <td><?php echo e($attribute->name); ?></td>
                <td><?php echo e($attribute->type); ?></td>
                <td><?php echo e($attribute->required ? 'Yes' : ''); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="4">None</td></tr>
        <?php endif; ?>

        <tr><th colspan="4">Own attributes</th></tr>

        <?php $__empty_1 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($attribute->sort); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.adverts.categories.attributes.show', [$category, $attribute])); ?>"><?php echo e($attribute->name); ?></a>
                </td>
                <td><?php echo e($attribute->type); ?></td>
                <td><?php echo e($attribute->required ? 'Yes' : ''); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="4">None</td></tr>
        <?php endif; ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>