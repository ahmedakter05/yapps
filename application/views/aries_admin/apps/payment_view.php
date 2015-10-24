<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('payment_view_heading') . 'Payment Panel';?> <small><?php echo lang('payment_view_subheading') . 'Payment View All';?></small></h1>
                </div>

                <div class="row-fluid">
                
                    <div class="span1"></div>
                
                    <div class="span10">
                        <div class="block">
                            <div class="head blue">
                                <h5><?php echo $message;?></h5>                         
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%">
                                            <?php echo lang('payment_name_th') . "Payment ID";?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('payment_agentname_th') . "Client Name";?>
                                            </th>
                                            <th width="15%" align="center">
                                            <?php echo lang('payment_passportno_th') . "Agent Name";?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('payment_fileno_th') . "Fees Name";?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('payment_status_th') . "Pay Amount";?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('payment_action_th') . "Pay Date";?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($all_payment as $payment):?>
                                        <tr>
                                            <td>
                                                <?php echo anchor("apps/payment/view/payid/".$payment->paymentid, $payment->paymentid);?>
                                            </td>
                                            <td>
                                                <?php echo anchor("apps/client/view/".$payment->clientid, $payment->firstname . ' ' . $payment->lastname);?>
                                            </td>
                                            <td>
                                                <?php echo anchor("apps/agent/view/".$payment->agentid, $payment->agentname);?>
                                            </td>
                                            <td>
                                                <?php echo lang("$payment->feesname");?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($payment->payamount,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($payment->paydate,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?> 
                                    </tbody>
                                </table>
                                <br></br>
                                <div class="block">
                                    <div class="span5">
                                        
                                    </div>
                                    <div class="span2">
                                        <span class="label label-important"><?php echo (isset($links) ? $links : ''); ?> </span>
                                    </div>
                                    <div class="span5">
                                        
                                    </div>
                                </div>
                                <!--<div class="block">
                                    <div class="span11">
                                        <span class="label label-info"><?php echo anchor('users/admin/create_user', lang('index_create_user_link'))?> </span> <span class="label label-success" style="color: #FFF; align: right;"> <?php echo anchor('users/admin/create_group', lang('index_create_group_link'))?></span>
                                    </div>
                                    <div class="span1">
                                        <span class="label label-important"><?php echo anchor('users/admin/logout', lang('logout_heading'))?> </span>
                                    </div>
                                </div> -->
                            </div>                
                        </div>


                    </div>
                
                    <div class="span1"></div>
                </div>  

                <div class="row-fluid">
                    <br></br>
                </div>
            </div>
            