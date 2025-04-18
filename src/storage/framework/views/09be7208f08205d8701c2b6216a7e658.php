<?php $__env->startSection('content'); ?>
    <div class="main-content" data-simplebar>
        <h3 class="page-title"><?php echo e(__($setTitle)); ?> </h3>
        <div class="i-card-sm mt-2">
            <div class="row g-3">
                <h6 class="mb-2"><?php echo e(__('If you have any reward badges, the background color will change.')); ?></h6>
                <?php $__currentLoopData = $investmentUserRewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investmentUserReward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="i-card-sm card-style dark <?php echo e(Auth::user()->reward_identifier == $investmentUserReward->id ? 'active' : ''); ?> rounded-3">
                            <span class="card-active-style"></span>
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div class="text-start gap-4 mb-4">
                                    <h5 class="title text-white mb-2"><?php echo e(__($investmentUserReward->level)); ?></h5>
                                    <p class="text-white opacity-75"><?php echo e(__($investmentUserReward->name)); ?></p>
                                </div>
                                <div class="level-badge"><?php echo e(__('Reward')); ?> <?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($investmentUserReward->reward)); ?></div>
                            </div>

                            <div class="card-info text-center">
                                <ul class="user-card-list w-100 mb-5">
                                    <li class="d-flex align-items-center justify-content-between gap-3 mb-2"><span class="fw-bold text-white opacity-75"><?php echo e(__('Minimum Invest')); ?></span>
                                        <span class="fw-bold text-white"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($investmentUserReward->invest)); ?></span>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between gap-3 mb-2"><span class="fw-bold text-white opacity-75"><?php echo e(__('Minimum Team Invest')); ?></span>
                                        <span class="fw-bold text-white"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($investmentUserReward->team_invest)); ?></span>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between gap-3 mb-2"><span class="fw-bold text-white opacity-75"><?php echo e(__('Minimum Deposit')); ?></span>
                                        <span class="fw-bold text-white"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($investmentUserReward->deposit)); ?></span>
                                    </li>
                                </ul>
                                <p class="level-note text-white fs-15 text-start mb-0"><span class="text-white bg--primary py-0 px-2 rounded-2 me-2"><?php echo e(__('Minimum Investment Referral')); ?> <?php echo e(shortAmount($investmentUserReward->referral_count)); ?></span></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/user/investment_reward.blade.php ENDPATH**/ ?>