<?php $__env->startSection('panel'); ?>
    <section>
        <?php echo $__env->make('admin.partials.filter', [
            'is_filter' => false,
            'is_modal' => false,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('admin.mail.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3 mb-3">
                            <div class="col-lg-6">
                                <label for="from_email" class="form-label"><?php echo e(__('admin.input.from_email')); ?></label>
                                <input type="email" name="mail_configuration[from_email]" value="<?php echo e(getArrayValue((array)$setting->mail_configuration, 'from_email')); ?>" class="form-control" id="from_email" placeholder="<?php echo app('translator')->get('Enter Email Address'); ?>">
                            </div>

                            <div class="col-lg-6">
                                <label for="from_name" class="form-label"><?php echo e(__('admin.input.from_email_name')); ?></label>
                                <input type="text" name="mail_configuration[from_name]" value="<?php echo e(getArrayValue((array)$setting->mail_configuration, 'from_name')); ?>"  class="form-control" id="from_name" placeholder="<?php echo app('translator')->get('Enter Email Name'); ?>">
                            </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-lg-6">
                            <label for="host" class="form-label"><?php echo e(__('admin.input.host')); ?></label>
                            <input type="text" name="mail_configuration[host]" class="form-control" id="host" value="<?php echo e(getArrayValue((array)$setting->mail_configuration, 'host')); ?>" placeholder="<?php echo app('translator')->get('Email Address Or Host'); ?>">
                        </div>

                        <div class="col-lg-6">
                            <label for="port" class="form-label"><?php echo e(__('admin.input.port')); ?></label>
                            <input type="text" name="mail_configuration[port]" class="form-control" id="port" value="<?php echo e(getArrayValue((array)$setting->mail_configuration, 'port')); ?>" placeholder="<?php echo app('translator')->get('Enter Port'); ?>">
                        </div>

                        <div class="col-12">
                            <label for="encryption" class="form-label"><?php echo e(__('admin.input.encryption')); ?></label>
                            <select class="form-select" name="mail_configuration[encryption]" id="encryption" required>
                                <option value="ssl" <?php if(getArrayValue((array)$setting->mail_configuration, 'encryption') == "ssl"): ?> selected <?php endif; ?>><?php echo app('translator')->get('ssl'); ?></option>
                                <option value="tls" <?php if(getArrayValue((array)$setting->mail_configuration, 'encryption') == "tls"): ?> selected <?php endif; ?>><?php echo app('translator')->get('tls'); ?></option>
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="username" class="form-label"><?php echo e(__('admin.input.username')); ?></label>
                            <input type="text" name="mail_configuration[username]" class="form-control" id="username" value="<?php echo e(getArrayValue((array)$setting->mail_configuration, 'username')); ?>" placeholder="<?php echo app('translator')->get('Enter Username or Email'); ?>">
                        </div>

                        <div class="col-lg-6">
                            <label for="password" class="form-label"><?php echo e(__('admin.input.password')); ?></label>
                            <input type="text" name="mail_configuration[password]" class="form-control" value="<?php echo e(getArrayValue((array)$setting->mail_configuration, 'password')); ?>" id="password" placeholder="<?php echo app('translator')->get('Enter Password'); ?>">
                        </div>
                    </div>
                    <button class="i-btn btn--primary btn--lg"><?php echo e(__('admin.button.save')); ?></button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/email/index.blade.php ENDPATH**/ ?>