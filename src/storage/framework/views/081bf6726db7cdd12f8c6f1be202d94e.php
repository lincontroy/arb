<?php $__env->startSection('panel'); ?>
    <div class="container-fluid px-0">
        <button id="right-sidebar-btn" class="right-sidebar-btn badge badge--primary avatar--md fs-20">
            <i class="bi bi-activity"></i>
        </button>
        <button type="button" class="btn btn--primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo e(__('Setup Instructions')); ?></button>
        <div class="row g-4">
            <div class="col">
                <div class="row gy-4">
                    <div class="col-xxl-5 col-xl-5 col-lg-5">
                        <div class="card mb-4">
                            <div class="card-body position-relative">
                                <div class="row g-2 mb-3">
                                    <div class="col-sm-6">
                                        <div class="card card--hover linear-card bg--linear-orange text-center  h-100">
                                            <div class="icon--sm">
                                                <i class="las la-bell fs-17"></i>
                                            </div>
                                            <div class="card-body p-3">
                                                <h6 class="text-white opacity-75 fw-normal fs-13"><?php echo e(__('admin.dashboard.content.invest.payable_one')); ?></h6>
                                                <h4 class="fw-bold mt-1 mb-1 text-white fs-18"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($investment->payable)); ?></h4>
                                                <p class="text-white opacity-5 fs-12"><?php echo e(__('admin.dashboard.content.invest.payable_title', ['amount' => shortAmount($investment->payable)])); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card card--hover linear-card bg--linear-primary text-center h-100">
                                            <div class="card-body p-3">
                                                <h6 class="text-white opacity-75 fw-normal fs-13"><?php echo e(__('admin.dashboard.content.invest.total_one')); ?></h6>
                                                <h4 class="fw-bold mt-1 mb-3 text-white fs-18"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($investment->total)); ?></h4>
                                                <a href="<?php echo e(route('admin.binary.index')); ?>" class="badge badge--outline"><i class="las la-arrow-circle-right fs-17"></i> <?php echo e(__('admin.dashboard.content.invest.total_two')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush border-dashed mb-0">
                                    <?php
                                        $investments = [
                                            'running' => ['wallet text--primary', 'admin.dashboard.content.invest.running'],
                                            'profit' => ['chart-line text--success', 'admin.dashboard.content.invest.profit'],
                                            'closed' => ['comment-dollar text--warning', 'admin.dashboard.content.invest.closed'],
                                            're_invest' => ['sort-amount-up text--info', 'admin.dashboard.content.invest.re_invest'],
                                        ];
                                    ?>
                                    <?php $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item px-0">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 d-flex align-items-center gap-2">
                                                    <i class="las la-<?php echo e($details[0]); ?> fs-24"></i>
                                                    <h5 class="text--light fs-14"><?php echo e(__($details[1])); ?></h5>
                                                </div>
                                                <div class="flex-shrink-0 text-end">
                                                    <h5 class="text--dark fs-14 fw-bold"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($investment->$key)); ?></h5>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                        <div class="card card-height-100 mb-4">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1"><?php echo e(__('admin.dashboard.content.deposit.title')); ?></h4>
                            </div>

                            <div class="card-body">
                                <div class="text-center bg--success-light mb-3 p-4">
                                    <p class="text--success fs-14"><?php echo e(__('admin.dashboard.content.deposit.total')); ?></p>
                                    <h5 class="fw-bold mt-2 text--dark fs-17"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount(getArrayValue($deposit, 'total'))); ?></h5>
                                </div>
                                <div class="d-flex flex-row justify-content-between flex-wrap gap-2">
                                    <div class="d-flex flex-column align-items-center flex-grow-1 bg--info-light">
                                        <div class="text-center p-3 w-100">
                                            <p class="text--info fs-12"><?php echo e(__('admin.dashboard.content.deposit.primary')); ?></p>
                                            <h5 class="fw-bold mt-2 text--dark"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount(getArrayValue($deposit, 'primary.amount'))); ?></h5>
                                            <span class="text--success fw-bold"><?php echo e(shortAmount(getArrayValue($deposit, 'primary.percentage'))); ?><i class="las la-percent"></i></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center flex-grow-1 bg--primary-light">
                                        <div class="text-center p-3 w-100">
                                            <p class="text--primary fs-12"><?php echo e(__('admin.dashboard.content.deposit.investment')); ?></p>
                                            <h5 class="fw-bold mt-2 text--dark"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount(getArrayValue($deposit, 'investment.amount'))); ?></h5>
                                            <span class="text--success fw-bold"><?php echo e(shortAmount(getArrayValue($deposit, 'investment.percentage'))); ?><i class="las la-percent"></i></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center flex-grow-1 bg--warning-light w-100">
                                        <div class="text-center p-3 w-100">
                                            <p class="text--warning fs-12"><?php echo e(__('admin.dashboard.content.deposit.trade')); ?></p>
                                            <h5 class="fw-bold mt-2 text--dark"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount(getArrayValue($deposit, 'trade.amount'))); ?></h5>
                                            <span class="text--success fw-bold"><?php echo e(shortAmount(getArrayValue($deposit, 'trade.percentage'))); ?><i class="las la-percent"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1"><?php echo e(__('admin.dashboard.content.withdraw.title')); ?></h4>
                            </div>

                            <div class="card-body">
                                <div class="text-center bg--danger-light mb-3 p-4">
                                    <p class="text--danger fs-14"><?php echo e(__('admin.dashboard.content.withdraw.total')); ?></p>
                                    <h5 class="fw-bold mt-2 text--dark fs-17"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($withdraw->total)); ?></h5>
                                </div>
                                <div class="d-flex flex-row justify-content-between flex-wrap gap-2">
                                    <div class="d-flex flex-column align-items-center flex-grow-1 bg--light">
                                        <div class="text-center p-3 w-100">
                                            <p class="text--light fs-12"><?php echo e(__('admin.dashboard.content.withdraw.pending')); ?></p>
                                            <h5 class="fw-bold mt-2 text--dark"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($withdraw->pending)); ?></h5>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center flex-grow-1 bg--pink-light">
                                        <div class="text-center p-3 w-100">
                                            <p class="text--pink fs-12"><?php echo e(__('admin.dashboard.content.withdraw.rejected')); ?></p>
                                            <h5 class="fw-bold mt-2 text--dark"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($withdraw->rejected)); ?></h5>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center flex-grow-1 bg--orange-light w-100">
                                        <div class="text-center p-3 w-100">
                                            <p class="text--orange fs-12"><?php echo e(__('admin.dashboard.content.withdraw.charge')); ?></p>
                                            <h5 class="fw-bold mt-2 text--dark"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($withdraw->charge)); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-7 col-xl-7 col-lg-7">
                        <div class="row">
                            <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <a href="<?php echo e($card[4]); ?>" class="card card--hover mb-4">
                                        <div class="card-body">
                                            <div class="row align-items-center g-0">
                                                <div class="col-9">
                                                    <h6 class="mb-0 fs-13 fw-normal text--muted"><?php echo e($card[0]); ?></h6>
                                                    <h5 class="mb-1 mt-3"><?php echo e($card[1]); ?></h5>
                                                </div>
                                                <div class="col-3">
                                                    <div class="bg--<?php echo e($card[3]); ?>-light avatar--lg ms-auto me-0">
                                                        <i class="las la-<?php echo e($card[2]); ?> text--<?php echo e($card[3]); ?> fs-30"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4 class="card-title"><?php echo e(__('admin.dashboard.content.statistic.deposit')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="monthlyChart" class="charts-height"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4 class="card-title"><?php echo e(__('admin.report.statistics.investment.five')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="investProfitChart" class="charts-height"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-auto right-sidebar">
                <div class="right-sidebar-wrapper" data-simplebar>
                    <div class="card mb-4">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1"><?php echo e(__('admin.dashboard.content.statistic.transactions')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div data-simplebar="init">
                                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="d-flex align-items-center mb-2 gap-3">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1"><?php echo e($transaction->details); ?></h6>
                                            <p class="text--muted fs-12 mb-0"><?php echo e(showDateTime($transaction->created_at)); ?></p>
                                        </div>
                                        <div class="flex-shrink-0 text-end">
                                            <h6 class="mb-1 text--<?php echo e(\App\Enums\Transaction\Type::getTextColor($transaction->type)); ?>"><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($transaction->amount)); ?></h6>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p class="text-center text-muted"><?php echo e(__('No Data Found')); ?></p>
                                <?php endif; ?>

                                <?php if(count($transactions) != 0): ?>
                                    <div class="mt-3 text-center">
                                        <a href="<?php echo e(route('admin.report.transactions')); ?>" class="text--muted text-decoration-underline"><?php echo e(__('admin.button.view')); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo e(__('admin.dashboard.content.statistic.trade')); ?></h4>
                        </div>

                        <div class="card-body pt-1">
                            <ul class="list-group list-group-flush border-dashed mb-0">
                                <?php $__empty_1 = true; $__currentLoopData = $tradeActivity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li class="list-group-item px-0">
                                        <div class="d-flex gap-2">
                                            <div class="flex-shrink-0">
                                                <span class="avatar-title bg-light p-1 rounded-circle shadow">
                                                    <img src="<?php echo e($trade?->cryptoCurrency->file); ?>" alt="<?php echo e($trade->cryptoCurrency->name); ?>" class="avatar--sm">
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1"><?php echo e(__($trade->cryptoCurrency->name)); ?></h6>
                                                <p class="fs-12 mb-0 text--muted"><i class="mdi mdi-circle fs-10 align-middle text-primary me-1"></i><?php echo e(__(strtoupper($trade->cryptoCurrency->symbol))); ?> </p>
                                            </div>
                                            <div class="flex-shrink-0 text-end">
                                                <h6 class="mb-1"><span class="text--light me-2 fs-11 fw-normal">Price Was:</span><?php echo e(getCurrencySymbol()); ?><?php echo e(getArrayValue($trade?->cryptoCurrency->meta, 'current_price')); ?></h6>
                                                <p class="text--success fs-12 mb-0"><span class="text--light me-2 fs-11">Trade Amount:</span><?php echo e(getCurrencySymbol()); ?><?php echo e(shortAmount($trade->amount)); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="mt-2">
                                        <p class="text-center text-muted"><?php echo e(__('No Data Found')); ?></p>
                                    </div>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="swiper all-coins-slider">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $cryptoCurrencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crypto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <div class="row align-items-center g-3">
                                                <div class="col-8">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo e($crypto->file); ?>" class="avatar--xs" alt="<?php echo e(__($crypto->name)); ?>">
                                                        <h6 class="ms-2 mb-0 fs-13"><?php echo e(__($crypto->name)); ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <h6 class="ms-2 text--light mb-0 fs-12"><?php echo e(__(strtoupper($crypto->symbol))); ?></h6>
                                                </div>
                                                <div class="col-7 text-start">
                                                    <h5><?php echo e(getCurrencySymbol()); ?><?php echo e(getArrayValue($crypto->meta, 'current_price')); ?></h5>
                                                </div>
                                                <div class="col-5 text-end">
                                                    <p class="text--<?php echo e(Str::contains(shortAmount(getArrayValue($crypto->meta, 'price_change_24h')), '-')  ? 'danger' : 'success'); ?> fs-13 fw-medium mb-0"><?php echo e(shortAmount(getArrayValue($crypto->meta, 'price_change_24h'))); ?>%</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Setup Instructions')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4"><?php echo e(__('To ensure your application runs smoothly, make sure you have the necessary setting configured')); ?>:</h5>
                    <ol class="setup-list">
                        <li>
                            <strong class="my-2"><?php echo e(__('Application Settings')); ?></strong>
                            <ul>
                                <li><?php echo e(__('General')); ?></li>
                                <li><?php echo e(__('System Configuration')); ?></li>
                                <li><?php echo e(__('Commission & Charges')); ?></li>
                                <li><?php echo e(__('KYC Configuration')); ?></li>
                                <li><?php echo e(__('Plugin Configuration')); ?></li>
                                <li><?php echo e(__('Automation')); ?></li>
                                <li><?php echo e(__('System Update')); ?></li>
                            </ul>
                        </li>
                        <li>
                            <strong class="my-2"><?php echo e(__('Notifications Settings')); ?></strong>
                            <ul>
                                <li><?php echo e(__('Global Templates.')); ?></li>
                                <li><?php echo e(__('Notification Templates')); ?></li>
                                <li><?php echo e(__('Setup Mail Gateway')); ?></li>
                                <li><?php echo e(__('Sms Gateways')); ?></li>
                            </ul>
                        </li>
                    </ol>
                    <p><strong><?php echo e(__('Complete Application Settings')); ?>:</strong> <?php echo e(__('Ensure all other application settings are properly configured before running your site')); ?>.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
    <script>
        "use strict";

        $(document).ready(function () {

            const depositMonthAmount = <?php echo json_encode($depositMonthAmount, 15, 512) ?>;
            const withdrawMonthAmount = <?php echo json_encode($withdrawMonthAmount, 15, 512) ?>;
            const months = <?php echo json_encode($months, 15, 512) ?>;
            const currency = "<?php echo e(getCurrencySymbol()); ?>";

            const options = {
                series: [
                    {
                        name: 'Total Deposits Amount',
                        data: depositMonthAmount
                    },
                    {
                        name: 'Total Withdraw Amount',
                        data: withdrawMonthAmount
                    }
                ],
                chart: {
                    height: 350 ,
                    type: 'line',
                    toolbar: false,
                    zoom: {
                    enabled: false
                  }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'bottom',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opts) {
                        return '';
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                xaxis: {
                    categories: months,
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function (val) {
                            return currency + val;
                        }
                    }
                },
                title: {
                    floating: true,
                    offsetY: 340,
                    align: 'center',
                    style: {
                        color: '#222',
                        fontWeight: 600
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#monthlyChart"), options);
            chart.render();


            const invest = <?php echo json_encode($invest, 15, 512) ?>;
            const profit = <?php echo json_encode($profit, 15, 512) ?>;
            const investmentMonths = <?php echo json_encode($months, 15, 512) ?>;

            const investmentOptions = {
                series: [{
                    name: 'Profit',
                    data: profit
                }, {
                    name: 'Invest',
                    data: invest
                }],
                chart: {
                    height: 265,
                    type: 'line',
                    zoom: {
                    enabled: false
                  }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'date',
                    categories: months
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return currency + val
                        }
                    }
                }
            };

            const investmentProfit = new ApexCharts(document.querySelector("#investProfitChart"), investmentOptions);
            investmentProfit.render();

            // Right Sidebar
            var rightSidebarBtn = document.getElementById('right-sidebar-btn');
            var rightSidebar = document.querySelector(".right-sidebar");
            var minWidth = 1499;
            function handleSidebarButtonClick() {
                rightSidebar.classList.toggle("d-none");
                const windowWidth = window.innerWidth;
                const sidebarVisible = !rightSidebar.classList.contains("d-none");

                if (windowWidth <= minWidth && sidebarVisible) {
                    createOverlay();
                } else {
                    removeOverlay();
                }
            }

            function createOverlay() {
                const overlay = document.createElement('div');
                overlay.setAttribute("id", "overlay-wrapper");

                overlay.style.cssText = `
                    position: fixed;
                    inset: 0;
                    width: 100%;
                    height: 100vh;
                    background: rgb(0 0 0 / 10%);
                    z-index: 12;
                `;
                document.body.appendChild(overlay);

                overlay.addEventListener("click", () => {
                    rightSidebar.classList.add('d-none');
                    removeOverlay();
                });
            }

            function removeOverlay() {
                const overlayWrapper = document.querySelector("#overlay-wrapper")
                overlayWrapper && overlayWrapper.remove();
            }

            function handleResize() {
                const windowWidth = window.innerWidth;
                if (windowWidth <= 1499) {
                    rightSidebar.classList.remove("d-none")
                    createOverlay();
                } else {
                    rightSidebar.classList.remove("d-none")
                    removeOverlay();
                }
            }

            rightSidebarBtn.addEventListener("click", handleSidebarButtonClick);

            window.addEventListener('resize', handleResize);
            handleResize();

            var rightSidebarBtn = $('.right-sidebar-btn');
            if (rightSidebarBtn.length) {
                rightSidebarBtn.click();
            }

        });
    </script>
<?php $__env->stopPush(); ?>






<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampppp\htdocs\arb\src\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>