<ul>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('cabinet.adverts.create.region', $category)); ?>"><?php echo e($category->name); ?></a>
            <?php echo $__env->make('cabinet.adverts.create._categories', ['categories' => $category->children], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
