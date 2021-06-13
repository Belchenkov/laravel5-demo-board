<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.adverts.adverts._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="card mb-3">
        <div class="card-header">Filter</div>
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="<?php echo e(request('id')); ?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Title</label>
                            <input id="name" class="form-control" name="name" value="<?php echo e(request('name')); ?>">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="user" class="col-form-label">User</label>
                            <input id="user" class="form-control" name="user" value="<?php echo e(request('user')); ?>">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="region" class="col-form-label">Region</label>
                            <input id="region" class="form-control" name="region" value="<?php echo e(request('region')); ?>">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="category" class="col-form-label">Category</label>
                            <input id="category" class="form-control" name="category" value="<?php echo e(request('category')); ?>">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option value=""></option>
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>"<?php echo e($value === request('status') ? ' selected' : ''); ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="?" class="btn btn-outline-secondary">Clear</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Updated</th>
            <th>Title</th>
            <th>User</th>
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
                <td><?php echo e($advert->user->id); ?> - <?php echo e($advert->user->name); ?></td>
                <td>
                    <?php if($advert->region): ?>
                        <?php echo e($advert->region->id); ?> - <?php echo e($advert->region->name); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($advert->category->id); ?> - <?php echo e($advert->category->name); ?></td>
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