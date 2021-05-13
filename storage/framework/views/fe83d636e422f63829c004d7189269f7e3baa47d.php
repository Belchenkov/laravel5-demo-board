<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.adverts.categories._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="d-flex flex-row mb-3">
        <a href="<?php echo e(route('admin.adverts.categories.attributes.edit', [$category, $attribute])); ?>" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="<?php echo e(route('admin.adverts.categories.attributes.destroy', [$category, $attribute])); ?>" class="mr-1">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>