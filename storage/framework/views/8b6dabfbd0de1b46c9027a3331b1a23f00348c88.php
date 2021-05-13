<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.adverts.categories._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <form method="POST" action="<?php echo e(route('admin.adverts.categories.update', $category)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name', $category->name)); ?>" required>
            <?php if($errors->has('name')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('name')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="slug" class="col-form-label">Slug</label>
            <input id="slug" type="text" class="form-control<?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" name="slug" value="<?php echo e(old('slug', $category->slug)); ?>" required>
            <?php if($errors->has('slug')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('slug')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="parent" class="col-form-label">Parent</label>
            <select id="parent" class="form-control<?php echo e($errors->has('parent') ? ' is-invalid' : ''); ?>" name="parent">
                <option value=""></option>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($parent->id); ?>"<?php echo e($parent->id == old('parent', $category->parent_id) ? ' selected' : ''); ?>>
                        <?php for($i = 0; $i < $parent->depth; $i++): ?> &mdash; <?php endfor; ?>
                        <?php echo e($parent->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
            </select>
            <?php if($errors->has('parent')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('parent')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>