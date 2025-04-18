<?php $__env->startSection('panel'); ?>
    <section>
        <?php echo $__env->make('admin.partials.filter', [
            'is_filter' => false,
            'is_modal' => false,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-body">
                <div class="row g-4">
                    <?php $__currentLoopData = [
                        [
                            'title' => __('General'),
                            'icon' => "las la-cog",
                            'route' => 'admin.general.index',
                            'description' => __('Explore and manage various basic settings in the General section.'),
                        ],
                        [
                            'title'       => __('Theme Change Setting'),
                            'icon'        => 'las la-history',
                            'route'       => 'admin.theme.index',
                            'description' => __('Modify the theme settings to customize the appearance of your system.'),
                        ],
                        [
                            'title' => __('System Configuration'),
                            'icon' => "las la-cogs",
                            'route' => 'admin.setting.system.configuration',
                            'description' => __('System configuration, such as updating all site system settings, needs to be done.'),
                        ],
                        [
                            'title' => __('Commission & Charges'),
                            'icon' => "las la-file-invoice-dollar",
                            'route' => 'admin.setting.commissions.charge',
                            'description' => __('Settings related to commissions and charges for transactions on the platform.'),
                        ],
                        [
                            'title' => __('KYC Configuration'),
                            'icon' => "las la-user-check",
                            'route' => 'admin.setting.kyc',
                            'description' => __('Configuration settings for managing Know Your Customer (KYC) processes.'),
                        ],
                        [
                            'title' => __('Plugin Configuration'),
                            'icon' => "las la-puzzle-piece",
                            'route' => 'admin.plugin.index',
                            'description' => __('Configuration settings for managing various plugins integrated into the platform.'),
                        ],
                        [
                             'title' => __('System Information'),
                             'icon' => "las la-cogs",
                             'route' => 'admin.setting.system',
                             'description' => __('Settings related to the PHP version and other environmental configurations for the platform.'),
                        ],
                        [
                            'title' => __('Automation'),
                            'icon' => "las la-magic",
                            'route' => 'admin.setting.automation',
                            'description' => __('Settings for automation processes, such as cron jobs and backup automation on the platform.'),
                        ],
                        [
                            'title' => __('Manage Language'),
                            'icon' => "las la-language",
                            'route' => 'admin.language.index',
                            'description' => __('Enhance the content settings of the translation site to include support for multiple languages and contributions..'),
                        ],
                        [
                            'title' => __('System Update'),
                            'icon' => "lab la-ubuntu",
                            'route' => 'admin.setting.update',
                            'description' => __('Check your system thoroughly to ensure that all necessary updates are applied.'),
                        ],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6">
                            <div class="card custom--border">
                                <div class="bg-icon">
                                    <i class="<?php echo e($item['icon']); ?>"></i>
                                </div>
                                <div class="card-body">
                                    <h6 class="title--sm"><?php echo e($item['title']); ?></h6>
                                    <p class="mb-4"><?php echo e($item['description']); ?></p>
                                    <a href="<?php echo e(route($item['route'])); ?>" class="btn btn--link">
                                        <?php echo app('translator')->get('Change Setting'); ?> <i class="<?php echo e($item['icon']); ?>"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>