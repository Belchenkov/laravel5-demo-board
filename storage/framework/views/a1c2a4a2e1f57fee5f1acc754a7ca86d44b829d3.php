<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('cabinet.adverts._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Updated</th>
            <th>Title</th>
            <th>Region</th>
            <th>Category</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $adverts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($advert->id); ?></td>
                <td><?php echo e($advert->updated_at); ?></td>
                <td><a href="<?php echo e(route('adverts.show', $advert)); ?>" target="_blank"><?php echo e($advert->title); ?></a></td>
                <td>
                    <?php if($advert->region): ?>
                        <?php echo e($advert->region->name); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($advert->category->name); ?></td>
                <td>
                    <?php if($advert->isDraft()): ?>
                        <span class="badge badge-secondary">Draft</span>
                    <?php elseif($advert->isOnModeration()): ?>
                        <span class="badge badge-primary">Moderation</span>
                    <?php elseif($advert->isActive()): ?>
                        <span class="badge badge-primary">Active</span>
                    <?php elseif($advert->isClosed()): ?>
                        <span class="badge badge-secondary">Closed</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php echo e($adverts->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>