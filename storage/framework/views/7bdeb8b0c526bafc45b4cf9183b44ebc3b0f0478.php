<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Adverts</title>

    <!-- Styles -->
    <link href="<?php echo e(mix('css/app.css', 'build')); ?>" rel="stylesheet">
</head>
<body id="app">
<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                Adverts
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <li><a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li><a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('admin.home')); ?>">Admin</a>
                                <a class="dropdown-item" href="<?php echo e(route('cabinet.home')); ?>">Cabinet</a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="app-content py-3">
    <div class="container">
        <?php $__env->startSection('breadcrumbs', Breadcrumbs::render()); ?>
        <?php echo $__env->yieldContent('breadcrumbs'); ?>
        <?php echo $__env->make('layouts.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<footer>
    <div class="container">
        <div class="border-top pt-3">
            <p>&copy; <?php echo e(date('Y')); ?> - Adverts</p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="<?php echo e(mix('js/app.js', 'build')); ?>"></script>
</body>
</html>
