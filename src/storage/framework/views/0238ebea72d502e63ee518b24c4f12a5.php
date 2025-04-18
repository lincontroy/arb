<?php $__env->startSection('content'); ?>
    <div class="main-content" data-simplebar>
        <div class="row">
            <div class="col-lg-12">
                <div class="i-card-sm mb-4">
                    <div class="card-header">
                        <h4 class="title"><?php echo e(__($setTitle)); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center gy-4 mb-3">
                            <?php $__currentLoopData = $withdrawMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdrawMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="i-card-sm card--dark shadow-none">
                                        <div class="row justify-content-between align-items-center g-lg-2 g-1">
                                            <div class="col-12">
                                                <h5 class="title-sm border-bottom pb-3"><?php echo e(__($withdrawMethod->name)); ?></h5>
                                            </div>

                                            <div class="col-lg-7 col-md-7 col-sm-7 text-end">
                                                <button class="i-btn btn--primary btn--lg capsuled cash-out-process"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    data-id="<?php echo e($withdrawMethod->id); ?>"
                                                    data-name="<?php echo e($withdrawMethod->name); ?>"
                                                    data-min_limit="<?php echo e(shortAmount($withdrawMethod->min_limit)); ?>"
                                                    data-max_limit="<?php echo e(shortAmount($withdrawMethod->max_limit)); ?>"
                                                ><?php echo e(__('Withdraw Now')); ?><i class="bi bi-box-arrow-up-right ms-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="i-card-sm">
                    <div class="filter-area">
                        <form action="<?php echo e(route('user.withdraw.index')); ?>">
                            <div class="row row-cols-lg-4 row-cols-md-4 row-cols-sm-2 row-cols-1 g-3">
                                <div class="col">
                                    <input type="text" name="search" placeholder="Trx ID" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                                <div class="col">
                                    <select class="select2-js" name="status" >
                                        <?php $__currentLoopData = App\Enums\Payment\Withdraw\Status::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (! ($status->value == App\Enums\Payment\Withdraw\Status::INITIATED->value)): ?>
                                                <option value="<?php echo e($status->value); ?>" <?php if($status->value == request()->status): ?> selected <?php endif; ?>><?php echo e($status->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" id="date" class="form-control datepicker-here" name="date"
                                       value="<?php echo e(request()->get('date')); ?>" data-range="true" data-multiple-dates-separator=" - "
                                       data-language="en" data-position="bottom right" autocomplete="off"
                                       placeholder="<?php echo e(__('Date')); ?>">
                                </div>
                                <div class="col">
                                    <button type="submit" class="i-btn btn--lg btn--primary w-100"><i class="bi bi-search me-3"></i><?php echo e(__('Search')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center gy-4 mb-3">
                            <div class="table-container">
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__('Initiated At')); ?></th>
                                            <th scope="col"><?php echo e(__('Trx')); ?></th>
                                            <th scope="col"><?php echo e(__('Gateway')); ?></th>
                                            <th scope="col"><?php echo e(__('Amount')); ?></th>
                                            <th scope="col"><?php echo e(__('Charge')); ?></th>
                                            <th scope="col"><?php echo e(__('Final Amount')); ?></th>
                                            <th scope="col"><?php echo e(__('Conversion')); ?></th>
                                            <th scope="col"><?php echo e(__('Status')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $withdrawLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdrawLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td data-label="<?php echo e(__('Initiated At')); ?>">
                                                    <?php echo e(showDateTime($withdrawLog->created_at)); ?>

                                                </td>
                                                <td data-label="<?php echo e(__('Trx')); ?>">
                                                    <?php echo e($withdrawLog->trx); ?>

                                                </td>
                                                <td data-label="<?php echo e(__('Gateway')); ?>">
                                                    <?php echo e($withdrawLog?->withdrawMethod?->name ?? 'N/A'); ?>

                                                </td>
                                                <td data-label="<?php echo e(__('Amount')); ?>">
                                                    <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($withdrawLog->amount)); ?>

                                                </td>
                                                <td data-label="<?php echo e(__('Charge')); ?>">
                                                    <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($withdrawLog->charge)); ?>

                                                </td>
                                                <td data-label="<?php echo e(__('Final Amount')); ?>">
                                                    <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($withdrawLog->final_amount)); ?>

                                                </td>
                                                <td data-label="<?php echo e(__('Conversion')); ?>">
                                                    <?php echo e(getCurrencySymbol()); ?>1 = <?php echo e(shortAmount($withdrawLog->rate)); ?> <?php echo e($withdrawLog?->withdrawMethod?->currency_name ?? getCurrencyName()); ?>

                                                </td>
                                                <td data-label="<?php echo e(__('Status')); ?>">
                                                    <span class="i-badge <?php echo e(App\Enums\Payment\Withdraw\Status::getColor($withdrawLog->status)); ?>"><?php echo e(App\Enums\Payment\Withdraw\Status::getName($withdrawLog->status)); ?></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td class="text-muted text-white" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4"><?php echo e($withdrawLogs->links()); ?></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg--dark">
                    <h5 class="modal-title" id="methodTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php if(getArrayValue($setting->system_configuration, 'withdraw_request.value') == \App\Enums\Status::ACTIVE->value): ?>
                    <form method="POST" action="<?php echo e(route('user.withdraw.process')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="">
                        <div class="modal-body">
                            <div class="text-end">
                                <p class="mb-0" id="withdraw_limit"></p>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="col-form-label"><?php echo e(__('Amount')); ?></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="<?php echo e(__('Enter Amount')); ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2"><?php echo e(getCurrencyName()); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="i-btn btn--outline btn--sm" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="i-btn btn--primary btn--sm"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="modal-body">
                        <p><?php echo e(__('Withdraw Request Currently Unavailable')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
    <script>
        "use strict";
        $(document).ready(function() {
            $('.cash-out-process').click(function() {
                const name = $(this).data('name');
                const id = $(this).data('id');
                const currencySymbol = "<?php echo e(getCurrencySymbol()); ?>"
                const minLimit = $(this).data('min_limit');
                const maxLimit = $(this).data('max_limit');
                $('input[name="id"]').val(id);

                const withdrawLimit = "Withdraw Limit " + currencySymbol + minLimit + " - " + currencySymbol + maxLimit;
                const gatewayTitle = "Withdraw with " + name + " now";
                $('#methodTitle').text(gatewayTitle);
                $('#withdraw_limit').text(withdrawLimit);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/user/withdraw/index.blade.php ENDPATH**/ ?>