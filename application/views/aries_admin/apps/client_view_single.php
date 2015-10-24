<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('client_view_heading');?> <small><?php echo lang('client_view_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span4">
                        <div class="block">
                            <div class="head blue">
                                <h5 align="center"><?php echo 'Client Details';?></h5>
                                <h5><?php echo $message;?></h5>
                            </div>
                        
                            <div class="data dark" style="heighta: 240px;">
                                <div class="">
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_name_th') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo anchor("apps/client/view/".$client['clientid'], $client['Clientsfirstname'] . ' ' . $client['Clientslastname']); ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_agentname_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo anchor("apps/agent/view/".$client['agentid'], $client['agentname']); ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('college_name_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo anchor("apps/college/client_view/".$client['collegeid'], $client['collegename']);?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_email_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo mailto($client['Clientsemail'], $client['Clientsemail']); ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_passportno_th') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['passportnoclient']; ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_fileno_th') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['filenumber']; ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_created_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['Clientscreated'];?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_status_th') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['Clientstatus']; ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%" style="vertical-align: text-top;">
                                                <?php echo lang('client_comments_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['Clientscomments']; ?>
                                                </th>                                    
                                            </tr>
                                        </thead>
                                    </table>
                                    <br></br>
                                    <div class="span4">
                                        <span class="label" style="color: #FFF; align: left;"> <?php echo anchor("apps/client/edit/".$client['clientid'], lang('edit_client_link'))?></span>
                                    </div>
                                    <div class="span4">
                                        <span class="label" style="color: #FFF; align: center;"> <?php echo anchor("apps/client/index", lang('client_view_link'))?></span>
                                    </div>
                                    <div class="span3">
                                        <span class="label" style="color: #FFF; align: right;"> <?php echo anchor("apps/payment/add/".$client['clientid'], lang('add_payment_link'))?></span>
                                    </div>
                                    
                                </div>
                            </div>         
                        </div>
                    </div>

                    <div class="span6">
                        <div class="block">
                            <div class="head green">
                                <h5 align="center"><?php echo 'Payment Details';?></h5>
                            </div>
                        
                            <div class="data dark" style="height: auto;">
                                <div class="data-fluid">
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th width="20%">
                                                <?php echo 'Fees Name';?>
                                                </th>
                                                <th width="30%">
                                                <?php echo 'Pay Date';?>
                                                </th>
                                                <th width="20%" align="center">
                                                <?php echo 'Pay Amount';?>
                                                </th>
                                                <th width="20%">
                                                <?php echo 'Comments';?>
                                                </th>
                                                <th width="10%">
                                                <?php echo 'Action';?>
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($payments as $payment):?>
                                            <tr>
                                                <td><?php echo anchor("apps/payment/view/payid/".$payment->paymentid, lang("$payment->feesname"));?></td>
                                                <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($payment->paydate)));?></td>
                                                <td><?php echo htmlspecialchars($payment->payamount);?></td>
                                                <td><?php echo htmlspecialchars($payment->comments);?></td>
                                                <td><?php echo anchor("apps/payment/update/".$payment->paymentid, 'Update') ;?></td>
                                            </tr>
                                            <?php endforeach;?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </br>
                            <div class="head green">
                                <h5 align="center"><?php echo 'Overall View';?></h5>
                            </div>
                        
                            <div class="data dark" style="height: auto;">
                                <div class="data-fluid">
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th width="20%">
                                                <?php echo 'Total Fees';?>
                                                </th>
                                                <th width="20%">
                                                <?php echo 'Total Paid';?>
                                                </th>
                                                <th width="25%" align="center">
                                                <?php echo 'Remaining Fees';?>
                                                </th>
                                                <th width="25%">
                                                <?php echo 'Rem. Fees Name';?>
                                                </th>
                                                <th width="10%">
                                                <?php echo 'Action';?>
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $payment_summary['paymenttotal'];?></td>
                                                <td><?php echo $payment_summary['totalpaid'];?></td>
                                                <td><?php echo $payment_summary['payremaining'];?></td>
                                                <td><?php foreach ($payment_summary['remfeesname'] as $value){ echo anchor("apps/payment/add/".$client['clientid'].'/'.$value, lang("$value")) . '</br>';}?></td>
                                                <td><?php echo anchor("apps/payment/update/", 'Update') ;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>        
                        </div>
                    </div>
					<div class="span1"></div>
				</div>  

                
            </div>
            