<?php $__env->startSection('content'); ?>
    <p><a href="<?php echo e(route('cabinet.adverts.create')); ?>" class="btn btn-success">Add Advert</a></p>

    <?php if($categories): ?>
        <div class="card card-default mb-3">
            <div class="card-header">
                <?php if($category): ?>
                    Categories of <?php echo e($category->name); ?>

                <?php else: ?>
                    Categories
                <?php endif; ?>
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    <?php $__currentLoopData = array_chunk($categories, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <ul class="list-unstyled">
                                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('adverts.index', [$region, $current])); ?>"><?php echo e($current->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if($regions): ?>
        <div class="card card-default mb-3">
            <div class="card-header">
                <?php if($region): ?>
                    Regions of <?php echo e($region->name); ?>

                <?php else: ?>
                    Regions
                <?php endif; ?>
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    <?php $__currentLoopData = array_chunk($regions, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <ul class="list-unstyled">
                                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('adverts.index', [$current, $category])); ?>"><?php echo e($current->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-9">

            <div class="adverts-list">
                <?php $__currentLoopData = $adverts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="advert">
                        <div class="row">
                            <div class="col-md-3">
                                <div style="height: 180px; background: #f6f6f6; border: 1px solid #ddd"></div>
                            </div>
                            <div class="col-md-9">
                                <span class="float-right"><?php echo e($advert->price); ?></span>
                                <div class="h4" style="margin-top: 0"><a href="<?php echo e(route('adverts.show', $advert)); ?>"><?php echo e($advert->title); ?></a></div>
                                <p>Region: <a href=""><?php echo e($advert->region ? $advert->region->name : 'All'); ?></a></p>
                                <p>Category: <a href=""><?php echo e($advert->category->name); ?></a></p>
                                <p>Date: <?php echo e($advert->created_at); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php echo e($adverts->links()); ?>

        </div>
        <div class="col-md-3">
            <div style="height: 400px; background: #f6f6f6; border: 1px solid #ddd; margin-bottom: 20px"></div>
            <div style="height: 200px; background: #f6f6f6; border: 1px solid #ddd; margin-bottom: 20px"></div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>