<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.adverts.categories._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <form method="POST" action="<?php echo e(route('admin.adverts.categories.attributes.update', [$category, $attribute])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name', $attribute->name)); ?>" required>
            <?php if($errors->has('name')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('name')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="sort" class="col-form-label">Sort</label>
            <input id="sort" type="text" class="form-control<?php echo e($errors->has('sort') ? ' is-invalid' : ''); ?>" name="sort" value="<?php echo e(old('sort', $attribute->sort)); ?>" required>
            <?php if($errors->has('sort')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('sort')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="type" class="col-form-label">Type</label>
            <select id="type" class="form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>" name="type">
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type); ?>"<?php echo e($type == old('type', $attribute->type) ? ' selected' : ''); ?>><?php echo e($label); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
            </select>
            <?php if($errors->has('type')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('type')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="variants" class="col-form-label">Variants</label>
            <textarea id="variants" type="text" class="form-control<?php echo e($errors->has('sort') ? ' is-invalid' : ''); ?>" name="variants"><?php echo e(old('variants', implode("\n", $attribute->variants))); ?></textarea>
            <?php if($errors->has('variants')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('variants')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <input type="hidden" name="required" value="0">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="required" <?php echo e(old('required', $attribute->required) ? 'checked' : ''); ?>> Required
                </label>
            </div>
            <?php if($errors->has('required')): ?>
                <span class="invalid-feedback"><strong><?php echo e($errors->first('required')); ?></strong></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>