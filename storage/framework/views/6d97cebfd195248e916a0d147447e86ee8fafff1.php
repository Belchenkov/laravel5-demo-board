<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.adverts.categories._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <p><a href="<?php echo e(route('admin.adverts.categories.create')); ?>" class="btn btn-success">Add Category</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php for($i = 0; $i < $category->depth; $i++): ?> &mdash; <?php endfor; ?>
                    <a href="<?php echo e(route('admin.adverts.categories.show', $category)); ?>"><?php echo e($category->name); ?></a>
                </td>
                <td><?php echo e($category->slug); ?></td>
                <td>
                    <div class="d-flex flex-row">
                        <form method="POST" action="<?php echo e(route('admin.adverts.categories.first', $category)); ?>" class="mr-1">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-outline-primary">
                                <span class="fa fa-angle-double-up"></span>
                            </button>
                        </form>
                        <form method="POST" action="<?php echo e(route('admin.adverts.categories.up', $category)); ?>" class="mr-1">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                        </form>
                        <form method="POST" action="<?php echo e(route('admin.adverts.categories.down', $category)); ?>" class="mr-1">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                        </form>
                        <form method="POST" action="<?php echo e(route('admin.adverts.categories.last', $category)); ?>" class="mr-1">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-outline-primary">
                                <span class="fa fa-angle-double-down"></span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>