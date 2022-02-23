<div class="table-responsive">
    <table class="table table-hover table-striped">

        <thead>
        <tr>
            <?php 
            if(!isset($view_type))
                $view_type = "payments";

            if($view_type == "tracker"){ ?>
            <th>Payment Due Date</th>
            <?php } else { ?>
            <th><?php _trans('payment_date'); ?></th>
            <?php } ?>
            <th><?php _trans('invoice_date'); ?></th>
            <th><?php _trans('invoice'); ?></th>
            <th><?php _trans('client'); ?></th>
            <th><?php _trans('amount'); ?></th>

            <?php if($view_type == "payments"){ ?>
            <!-- <th><?php _trans('payment_method'); ?></th> -->
            <th><?php _trans('note'); ?></th>
            <th><?php _trans('options'); ?></th>
            <?php }else { ?>
            <th>Paid</th>
            <?php } ?>
        </tr>
        </thead>

        <tbody>
        <?php 
        $js_payment_data = [];
        foreach ($payments as $payment) 
            { 
                $js_payment_data[$payment->payment_id] = $payment;
            ?>
            <tr class="payment_row_<?=$payment->payment_id?>">
                <?php if($view_type == "tracker"){ ?>
                <td><?php echo date_from_mysql($payment->payment_due_date); ?></td>
                <?php } else { ?>
                <td><?php echo date_from_mysql($payment->payment_date); ?></td>
                <?php } ?>

                <td><?php echo date_from_mysql($payment->invoice_date_created); ?></td>
                <td><?php echo anchor('invoices/view/' . $payment->invoice_id, $payment->invoice_number); ?></td>
                <td>
                    <a href="<?php echo site_url('clients/view/' . $payment->client_id); ?>"
                       title="<?php _trans('view_client'); ?>">
                        <?php _htmlsc(format_client($payment)); ?>
                    </a>
                </td>

                <?php if($view_type == "payments"){ ?>
                <td class="amount1"><?php echo format_currency($payment->payment_amount); ?></td>
                <!-- <td><?php _htmlsc($payment->payment_method_name); ?></td> -->
                <td><?php _htmlsc($payment->payment_note); ?></td>
                <?php } else { ?>
                <td class="amount1"><?php echo format_currency($payment->required_amount); ?></td>
                <?php } ?>



                <td>
                    <div class="options btn-group">
                        <?php if($view_type == "payments"){ ?>
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> <?php _trans('options'); ?>
                        </a>
                        
                        <ul class="dropdown-menu">
                           <?php if($view_type == "payments"){ ?>
                            <li>
                                <a href="<?php echo site_url('payments/form/' . $payment->payment_id); ?>">
                                    <i class="fa fa-edit fa-margin"></i>
                                    <?php _trans('edit'); ?>
                                </a>
                            </li>
                            <li>
                                <form action="<?php echo site_url('payments/delete/' . $payment->payment_id); ?>"
                                      method="POST">
                                    <?php _csrf_field(); ?>
                                    <button type="submit" class="dropdown-button"
                                            onclick="return confirm('<?php _trans('delete_record_warning'); ?>');">
                                        <i class="fa fa-trash-o fa-margin"></i> <?php _trans('delete'); ?>
                                    </button>
                                </form>
                            </li>
                            <?php } else { ?>
                            <li>
                                <a href="<?php echo site_url('payments/form/' . $payment->payment_id.'/1'); ?>">
                                    <i class="fa fa-edit fa-margin"></i>
                                    Create Payment
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } else { ?>
                            <input type="checkbox" class="paid_payment_checkbox" payment_id="<?=$payment->payment_id?>">
                        <?php } ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>
 <input type="hidden" class="csrf_token" name="<?php echo $this->config->item('csrf_token_name'); ?>"
           value="<?php echo $this->security->get_csrf_hash() ?>">
<style type="text/css">
.paid_payment_checkbox
{
    width: 20px;
    height: 20px;
    cursor: pointer;
}
.disable_effect
{
    background-color: #e9e9e9 !important;
    pointer-events: none !important;
}
</style>

<script type="text/javascript">
var payments = JSON.parse('<?=json_encode($js_payment_data)?>');
$(document).on("click",".paid_payment_checkbox",function(){
    if ($(this).is(':checked')) 
    {
        var payment_id = $(this).attr("payment_id");
        $(this).addClass("disable_effect");
        // $(this).attr("disabled","disabled");
        // alert("paynow")

        var payment = payments[payment_id];

        $.post('<?php echo site_url('payments/form/'); ?>'+payment_id,
        {
            // _ip_csrf: $(".csrf_token").val(),
            payment_id: payment_id,
            btn_submit: 1,
            invoice_id: payment.invoice_id,
            payment_date: '<?=date('d/m/Y')?>',
            payment_amount: payment.required_amount,
            payment_method_id: 1,
            payment_note: payment.payment_note,
        }, function (data) 
        {
            // $(".payment_row_"+payment_id).remove();
            $("#filter_results .alert-success").remove();
            $('#filter_results').prepend('<div class="alert alert-success">Payment Paid Successfully!</div>');
        });
    }
})
</script>