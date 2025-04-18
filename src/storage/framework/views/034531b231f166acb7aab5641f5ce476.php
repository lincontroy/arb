<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>" class="sr" data-sidebar="open">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <title>FinFunder Web Installation System</title>
    <?php $__currentLoopData = getThemeFiles(\App\Enums\Theme\ThemeType::GLOBAL, \App\Enums\Theme\FileType::CSS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $themeFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e(getAssetPath(\App\Enums\Theme\ThemeAsset::GLOBAL, \App\Enums\Theme\FileType::CSS, $themeFile)); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <style>
      .main{
            min-height: 100vh;
            padding: 30px 0;
            background: var(--color-white);
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            z-index: 1;
        }
        .main::before{
          content: '';
          position: absolute;
          left: 10px;
          top: 10px;
          width: 300px;
          height: 300px;
          border-radius: 50%;
          background: rgba(255, 87, 34,0.5);
          filter: blur(170px);
          z-index: -1;
        }
        .main::after{
          content: '';
          position: absolute;
          right: 10px;
          bottom: 10px;
          width: 300px;
          height: 300px;
          border-radius: 50%;
          background: var(--color-primary-light-2);
          filter: blur(170px);
          z-index: -1;
        }
    </style>

    <?php $__currentLoopData = getThemeFiles(\App\Enums\Theme\ThemeType::INSTALLER, \App\Enums\Theme\FileType::CSS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $themeFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e(getAssetPath(\App\Enums\Theme\ThemeAsset::INSTALLER, \App\Enums\Theme\FileType::CSS, $themeFile)); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->yieldPushContent('style-file'); ?>
    <?php echo $__env->yieldPushContent('style-push'); ?>
</head>
<body>

<main class="main d-flex flex-column justify-content-center align-items-center" id="main">
  <div class="text-center mb-5">
      <h4 class="text-dark"> <?php echo e($setTitle); ?></h4>
  </div>
   <?php echo $__env->yieldContent('content'); ?>
</main>

<?php $__currentLoopData = getThemeFiles(\App\Enums\Theme\ThemeType::GLOBAL, \App\Enums\Theme\FileType::JS); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $themeFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(getAssetPath(\App\Enums\Theme\ThemeAsset::GLOBAL, \App\Enums\Theme\FileType::JS, $themeFile)); ?>"></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('script-file'); ?>
<?php echo $__env->yieldPushContent('script-push'); ?>
<script>
    'use strict'
    $('.ai--btn').click(function(){
        const $html = '<span></span><span></span><span></span>';
        $(this).html($html);
    });

    const activeItem = document.querySelector('li.active');
    if (activeItem) {
        const listItems = document.querySelectorAll('ul li');
        listItems.forEach(function(item, index) {
        if (item === activeItem) {
            for (let i = 0; i < index; i++) {
                listItems[i].classList.add('active');
            }
        }});
    }
</script>
</body>
<?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/installer/layouts/master.blade.php ENDPATH**/ ?>