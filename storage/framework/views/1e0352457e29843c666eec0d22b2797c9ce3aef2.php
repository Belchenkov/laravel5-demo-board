<?php $__env->startSection('content'); ?>

    <?php if($advert->isDraft()): ?>
        <div class="alert alert-danger">
            It is a draft.
        </div>
        <?php if($advert->reject_reason): ?>
            <div class="alert alert-danger">
                <?php echo e($advert->reject_reason); ?>

            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-adverts')): ?>
        <div class="d-flex flex-row mb-3">
            <a href="<?php echo e(route('admin.adverts.adverts.edit', $advert)); ?>" class="btn btn-primary mr-1">Edit</a>
            <a href="<?php echo e(route('admin.adverts.adverts.photos', $advert)); ?>" class="btn btn-primary mr-1">Photos</a>

            <?php if($advert->isOnModeration()): ?>
                <form method="POST" action="<?php echo e(route('admin.adverts.adverts.moderate', $advert)); ?>" class="mr-1">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-success">Moderate</button>
                </form>
            <?php endif; ?>

            <?php if($advert->isOnModeration() || $advert->isActive()): ?>
                <a href="<?php echo e(route('admin.adverts.adverts.reject', $advert)); ?>" class="btn btn-danger mr-1">Reject</a>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.adverts.adverts.destroy', $advert)); ?>" class="mr-1">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-own-advert', $advert)): ?>
        <div class="d-flex flex-row mb-3">
            <a href="<?php echo e(route('cabinet.adverts.edit', $advert)); ?>" class="btn btn-primary mr-1">Edit</a>
            <a href="<?php echo e(route('cabinet.adverts.photos', $advert)); ?>" class="btn btn-primary mr-1">Photos</a>

            <?php if($advert->isDraft()): ?>
                <form method="POST" action="<?php echo e(route('cabinet.adverts.send', $advert)); ?>" class="mr-1">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-success">Publish</button>
                </form>
            <?php endif; ?>
            <?php if($advert->isActive()): ?>
                <form method="POST" action="<?php echo e(route('cabinet.adverts.close', $advert)); ?>" class="mr-1">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-success">Close</button>
                </form>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('cabinet.adverts.destroy', $advert)); ?>" class="mr-1">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-9">

            <p class="float-right" style="font-size: 36px;"><?php echo e($advert->price); ?></p>
            <h1 style="margin-bottom: 10px"><?php echo e($advert->title); ?></h1>
            <p>
                <?php if($advert->expires_at): ?>
                    Date: <?php echo e($advert->published_at); ?> &nbsp;
                <?php endif; ?>
                <?php if($advert->expires_at): ?>
                    Expires: <?php echo e($advert->expires_at); ?>

                <?php endif; ?>
            </p>

            <div style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-10">
                        <div style="height: 400px; background: #f6f6f6; border: 1px solid #ddd"></div>
                    </div>
                    <div class="col-2">
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                        <div style="height: 100px; background: #f6f6f6; border: 1px solid #ddd"></div>
                    </div>
                </div>
            </div>

            <p><?php echo nl2br(e($advert->content)); ?></p>

            <hr/>

            <table class="table table-bordered">
                <tbody>
                <?php $__currentLoopData = $advert->category->allAttributes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($attribute->name); ?></th>
                        <td><?php echo e($advert->getValue($attribute->id)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <p>Address: <?php echo e($advert->address); ?></p>

            <div style="margin: 20px 0; border: 1px solid #ddd">

                <div id="map" style="width: 100%; height: 250px"></div>

                <script src="//api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

                <script type='text/javascript'>
                    ymaps.ready(init);
                    function init(){
                        const geocoder = new ymaps.geocode(
                            '<?php echo e($advert->address); ?>',
                            { results: 1 }
                        );
                        geocoder.then(
                            function (res) {
                                const coord = res.geoObjects.get(0).geometry.getCoordinates();
                                const map = new ymaps.Map('map', {
                                    center: coord,
                                    zoom: 7,
                                    behaviors: ['default', 'scrollZoom'],
                                    controls: ['mapTools']
                                });
                                map.geoObjects.add(res.geoObjects.get(0));
                                map.zoomRange.get(coord).then(function(range){
                                    map.setCenter(coord, range[1] - 1)
                                });
                                map.controls.add('mapTools')
                                    .add('zoomControl')
                                    .add('typeSelector');
                            }
                        );
                    }
                </script>
            </div>

            <p style="margin-bottom: 20px">Seller: <?php echo e($advert->user->name); ?></p>

            <div class="d-flex flex-row mb-3">
                <span class="btn btn-success mr-1"><span class="fa fa-envelope"></span> Send Message</span>
                <span class="btn btn-primary phone-button mr-1" data-source="<?php echo e(route('adverts.phone', $advert)); ?>"><span class="fa fa-phone"></span> <span class="number">Show Phone Number</span></span>
                <?php if($user && $user->hasInFavorites($advert->id)): ?>
                    <form method="POST" action="<?php echo e(route('adverts.favorites', $advert)); ?>" class="mr-1">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-secondary"><span class="fa fa-star"></span> Remove from Favorites</button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="<?php echo e(route('adverts.favorites', $advert)); ?>" class="mr-1">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger"><span class="fa fa-star"></span> Add to Favorites</button>
                    </form>
                <?php endif; ?>
            </div>

            <hr/>

            <div class="h3">Similar adverts</div>

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt=""/>
                        <div class="card-body">
                            <div class="card-title h4 mt-0" style="margin: 10px 0"><a href="#">The First Thing</a></div>
                            <p class="card-text" style="color: #666">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt=""/>
                        <div class="card-body">
                            <div class="card-title h4 mt-0" style="margin: 10px 0"><a href="#">The First Thing</a></div>
                            <p class="card-text" style="color: #666">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://images.pexels.com/photos/297933/pexels-photo-297933.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb" alt=""/>
                        <div class="card-body">
                            <div class="card-title h4 mt-0" style="margin: 10px 0"><a href="#">The First Thing</a></div>
                            <p class="card-text" style="color: #666">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div style="height: 400px; background: #f6f6f6; border: 1px solid #ddd; margin-bottom: 20px"></div>
            <div style="height: 400px; background: #f6f6f6; border: 1px solid #ddd; margin-bottom: 20px"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>