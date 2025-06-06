<?php $__env->startSection('panel'); ?>
    <section>
        <?php echo $__env->make('admin.partials.filter', [
            'is_filter' => false,
            'is_modal' => true,
            'urls' => [
                [
                    'type' => 'modal',
                    'id' => 'exampleModal',
                    'name' => __('admin.filter.add_parameter'),
                    'icon' => "<i class='fas fa-plus'></i>"
                ]
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.partials.table', [
            'columns' => [
                'created_at' => __('admin.table.created_at'),
                'parameter' => __('admin.table.parameter'),
                'status' => __('admin.table.status'),
                'action' => __('admin.table.action'),
            ],
            'rows' => $tradeParameters,
            'page_identifier' => \App\Enums\PageIdentifier::TRADE_PARAMETER->value,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('admin.trade_parameter.content.add_title')); ?></h5>
                </div>
                <form action="<?php echo e(route('admin.trade.parameter.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="time"><?php echo e(__('admin.input.time')); ?><sup class="text-danger">*</sup></label>
                                <input type="number" name="time" id="time" class="form-control" placeholder="<?php echo e(__('admin.placeholder.time')); ?>">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="unit"><?php echo e(__('admin.input.unit')); ?> <sup class="text-danger">*</sup></label>
                                <select class="form-select" id="unit" name="unit">
                                    <option value="" selected><?php echo e(__('admin.filter.placeholder.select')); ?></option>
                                    <?php $__currentLoopData = \App\Enums\Trade\TradeParameterUnit::toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status); ?>"><?php echo e(replaceInputTitle($key)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="status"><?php echo e(__('admin.input.status')); ?> <sup class="text-danger">*</sup></label>
                                <select class="form-select" id="status" name="status">
                                    <option value="" selected><?php echo e(__('admin.filter.placeholder.select')); ?></option>
                                    <?php $__currentLoopData = \App\Enums\Trade\TradeParameterStatus::toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status); ?>"><?php echo e(replaceInputTitle($key)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn--outline btn--sm" data-bs-dismiss="modal"><?php echo e(__('admin.button.close')); ?></button>
                        <button type="submit" class="btn btn--primary btn--sm"><?php echo e(__('admin.button.save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('admin.trade_parameter.content.update_title')); ?></h5>
                </div>
                <form action="<?php echo e(route('admin.trade.parameter.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="time"><?php echo e(__('admin.input.time')); ?> <sup class="text-danger">*</sup></label>
                                <input type="number" name="time" id="time" class="form-control">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="unit"><?php echo e(__('admin.input.unit')); ?> <sup class="text-danger">*</sup></label>
                                <select class="form-select" id="unit" name="unit">
                                    <option value="" selected><?php echo e(__('admin.filter.placeholder.select')); ?></option>
                                    <?php $__currentLoopData = \App\Enums\Trade\TradeParameterUnit::toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status); ?>"><?php echo e(replaceInputTitle($key)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="status"><?php echo e(__('admin.input.status')); ?> <sup class="text-danger">*</sup></label>
                                <select class="form-select" id="status" name="status">
                                    <option value="" selected><?php echo e(__('admin.filter.placeholder.select')); ?></option>
                                    <?php $__currentLoopData = \App\Enums\Trade\TradeParameterStatus::toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_key =>  $status_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status_value); ?>"><?php echo e(replaceInputTitle($status_key)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn--outline btn--sm" data-bs-dismiss="modal"><?php echo e(__('admin.button.close')); ?></button>
                        <button type="submit" class="btn btn--primary btn--sm"><?php echo e(__('admin.button.update')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            $('.updateBtn').on('click', function(event) {
                event.preventDefault();
                const id = $(this).data('id');
                const time = $(this).data('time');
                const unit = $(this).data('unit');
                const status = $(this).data('status');

                const modal = $('#updateModal');
                modal.find('input[name=id]').val(id);
                modal.find('input[name=time]').val(time);
                modal.find('select[name=unit]').val(unit);
                modal.find('select[name=status]').val(status);
                modal.modal('show');
            });
        });
    </script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/trade/parameter/index.blade.php ENDPATH**/ ?>