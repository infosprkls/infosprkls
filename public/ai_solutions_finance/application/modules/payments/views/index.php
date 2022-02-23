<div id="headerbar">
    <?php
    // if($view_type == "tracker")
    //      $page_heading = "Invoice Tracker";
    ?>
    <h1 class="headerbar-title"><?php if($view_type == "tracker"){ echo "Invoice Tracker"; } else { _trans('payments'); } ?></h1>

    <?php if($view_type == "payments"){ ?>
    <div class="headerbar-item pull-right">
        <a class="btn btn-sm btn-primary" href="<?php echo site_url('payments/form'); ?>">
            <i class="fa fa-plus"></i> <?php _trans('new'); ?>
        </a>
    </div>

    <div class="headerbar-item pull-right">
        <?php echo pager(site_url('payments/index'), 'mdl_payments'); ?>
    </div>
    <?php } else { ?>
    <div class="headerbar-item pull-right">
        <?php echo pager(site_url('payments/invoice_tracker'), 'mdl_payments'); ?>
    </div>
    <?php } ?>

    

</div>

<div id="content" class="table-content">

    <?php $this->layout->load_view('layout/alerts'); ?>

    <div id="filter_results">
        <?php $this->layout->load_view('payments/partial_payment_table'); ?>
    </div>

</div>
