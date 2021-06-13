<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('cabinet.adverts._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <form method="POST" action="<?php echo e(route('cabinet.adverts.create.advert.store', [$category, $region])); ?>">
        <?php echo csrf_field(); ?>

        <div class="card mb-3">
            <div class="card-header">
                Common
            </div>
            <div class="card-body pb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title</label>
                            <input id="title" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" name="title" value="<?php echo e(old('title')); ?>" required>
                            <?php if($errors->has('title')): ?>
                                <span class="invalid-feedback"><strong><?php echo e($errors->first('title')); ?></strong></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price</label>
                            <input id="price" type="number" class="form-control<?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>" name="price" value="<?php echo e(old('price')); ?>" required>
                            <?php if($errors->has('price')): ?>
                                <span class="invalid-feedback"><strong><?php echo e($errors->first('price')); ?></strong></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-form-label">Address</label>
                    <input id="address" type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e(old('address', $region->getAddress())); ?>" required>
                    <?php if($errors->has('address')): ?>
                        <span class="invalid-feedback"><strong><?php echo e($errors->first('address')); ?></strong></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="content" class="col-form-label">Content</label>
                    <textarea id="content" class="form-control<?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>" name="content" rows="10" required><?php echo e(old('content')); ?></textarea>
                    <?php if($errors->has('content')): ?>
                        <span class="invalid-feedback"><strong><?php echo e($errors->first('content')); ?></strong></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                Characteristics
            </div>
            <div class="card-body pb-2">
                <?php $__currentLoopData = $category->allAttributes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="form-group">
                        <label for=attribute_<?php echo e($attribute->id); ?>" class="col-form-label"><?php echo e($attribute->name); ?></label>

                        <?php if($attribute->isSelect()): ?>

                            <select id="attribute_<?php echo e($attribute->id); ?>" class="form-control<?php echo e($errors->has('attributes.' . $attribute->id) ? ' is-invalid' : ''); ?>" name="attributes[<?php echo e($attribute->id); ?>]">
                                <option value=""></option>
                                <?php $__currentLoopData = $attribute->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($variant); ?>"<?php echo e($variant == old('attributes.' . $attribute->id) ? ' selected' : ''); ?>>
                                        <?php echo e($variant); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        <?php elseif($attribute->isNumber()): ?>

                            <input id="attribute_<?php echo e($attribute->id); ?>" type="number" class="form-control<?php echo e($errors->has('attributes.' . $attribute->id) ? ' is-invalid' : ''); ?>" name="attributes[<?php echo e($attribute->id); ?>]" value="<?php echo e(old('attributes.' . $attribute->id)); ?>">

                        <?php else: ?>

                            <input id="attribute_<?php echo e($attribute->id); ?>" type="text" class="form-control<?php echo e($errors->has('attributes.' . $attribute->id) ? ' is-invalid' : ''); ?>" name="attributes[<?php echo e($attribute->id); ?>]" value="<?php echo e(old('attributes.' . $attribute->id)); ?>">

                        <?php endif; ?>

                        <?php if($errors->has('parent')): ?>
                            <span class="invalid-feedback"><strong><?php echo e($errors->first('attributes.' . $attribute->id)); ?></strong></span>
                        <?php endif; ?>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>