<?php $__env->startSection('panel'); ?>
    <section>
        <?php echo $__env->make('admin.partials.filter', [
             'is_filter' => false,
             'is_modal' => true,
             'urls' => [
                [
                     'type' => 'url',
                     'url' => route('admin.binary.create'),
                     'name' => __('admin.filter.add_scheme'),
                     'icon' => "<i class='las la-plus'></i>"
                ],
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.partials.table', [
             'columns' => [
                 'created_at' => __('admin.table.created_at'),
                 'name' => __('admin.table.name'),
                 'invest_limit' => __('admin.table.invest_limit'),
                 'investment_interest_rate' => __('Interest'),
                 'investment_time' => __('Time'),
                 'investment_return_type' => __('Return Type'),
                 'investment_recommend' => __('Recommend'),
                 'status' => __('admin.table.status'),
                 'action' => __('admin.table.action'),
             ],
             'rows' => $binaryInvests,
             'page_identifier' => \App\Enums\PageIdentifier::BINARY->value,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/binary/index.blade.php ENDPATH**/ ?>