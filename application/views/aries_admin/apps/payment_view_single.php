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
                                                <?php echo $client['passportnoclient'] ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_fileno_th') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['filenumber'] ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_created_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['Clientscreated'] ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('client_status_th') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['Clientstatus'] ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%" style="vertical-align: text-top;">
                                                <?php echo lang('client_comments_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $client['Clientscomments'] ?>
                                                </th>                                    
                                            </tr>
                                        </thead>
                                    </table>
                                    <br></br>
                                    <div class="span4">
                                        <span class="label" style="color: #FFF; align: left;"> <?php echo anchor("apps/client/edit/".$client['clientid'], lang('edit_client_link'))?></span>
                                    </div>
                                    <div class="span4">
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
                                <h5 align="center"><?php echo 'Payment of "' . lang("$payment->feesname") . '" Details';?></h5>
                            </div>
                        
                            <div class="data dark">
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
                                                <th width="20%" style="text-align: center;">
                                                <?php echo 'Pay Amount';?>
                                                </th>
                                                <th width="30%" style="text-align: center;">
                                                <?php echo 'Comments';?>
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo lang("$payment->feesname"); //echo anchor("apps/payment/view/payid/".$payment->paymentid, lang("$payment->feesname"));?></td>
                                                <td><?php echo htmlspecialchars(date("d-m-Y", strtotime($payment->paydate)));?></td>
                                                <td style="text-align: center;"><?php echo htmlspecialchars($payment->payamount);?></td>
                                                <td style="text-align: center;"><?php echo htmlspecialchars($payment->comments);?></td>
                                            </tr>
                                        <tbody>
                                    </table>
                                    <br></br>
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="25%">
                                            <?php echo 'Pay By';?>
                                            </th>
                                            <th width="25%">
                                            <?php echo 'Pay to';?>
                                            </th>
                                            <th width="25%">
                                            <?php echo 'Pay Type';?>
                                            </th>
                                            <th width="25%" align="center">
                                            <?php echo 'Action';?>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo anchor("apps/agent/view/".$client['agentid'], $client['agentname']); ?></td>
                                            <td><?php echo htmlspecialchars($payment->payto);?></td>
                                            <td><?php echo htmlspecialchars($payment->paytype);?></td>
                                            <td><?php echo anchor("apps/payment/update/".$payment->paymentid, 'Update') ;?></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <br>
                                    <div class="block">
                                        <div class="span3"><input type="button" value="Print Invoice" onclick="PrintElem('#mydiv')" /></div>
                                        <div class="span6"></div>
                                        <div class="span3"><span class="label" style="color: #FFF; align: right;"> <?php echo anchor("apps/client/view/".$client['clientid'], lang('client_profile_back_link'))?></span></div>
                                    </div>
                                    </br>
                                </div>
                            </div>         
                        </div>
                    </div>
					<div class="span1"></div>
				</div>  

                <div class="row-fluid" id="mydiv" style="display:none;">
                    <div class="span12">                

                        <div class="block">
                            <div class="data invoice">

                                <div class="row-fluid">
                                    <table class="table" width="95%" cellspacing="0">
                                       <tr>
                                            <th><h2 align="center">Fees Payment Invoice</h2>
                                                <h4 align="center"> All data stored in our Cloud Server </h4></th>
                                       </tr>
                                    </table>
                                    <table class="table" width="95%" cellspacing="0">
                                        <tr>
                                            <td>
                                                <h4>Invoice No #<?php echo htmlspecialchars($payment->paymentid);?></h4>
                                                <p><strong>Invoice Date:</strong> <?php echo date("d-m-Y"); ?></p>
                                                <p><strong>Payment Date:</strong> <?php echo date("d-m-Y", strtotime($payment->paydate));?></p>
                                                <p><strong>File Number:</strong> <?php echo $client['filenumber'] ?></p>
                                                
                                            </td>
                                       
                                            <td align="left">
                                                <h4>Client Details</h4>
                                                <p><strong>Client Name:</strong> <?php echo $client['Clientsfirstname'] . ' ' . $client['Clientslastname']; ?> </p>
                                                <p><strong>Agent Name:</strong> <?php echo $client['Agentsfirstname'] . ' ' . $client['Agentslastname']; ?> </p>
                                                <p><strong>Passport No:</strong> <?php echo $client['passportnoclient']; ?></p>
                                                <p><strong>Address:</strong> Banasree</br>
                                                    Rampura, Dhaka 1219<br>
                                                    <abbr title="Phone">Phone:</abbr> +880 1712203145
                                                </p>
                                            </td>
                                        
                                            <td align="left">
                                                <h4>Agency Details</h4>
                                                <p><strong>College Name:</strong> Ibne Batuta College </p>
                                                <p><strong>Company Reg:</strong> AB12345XZ </p>
                                                <p><strong>YApps Ltd.</strong> </p>
                                                <p><strong>Address:</strong> Banasree</br>
                                                    Rampura, Dhaka 1219<br>
                                                    <abbr title="Phone">Phone:</abbr> +880 1712203145
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>

                                <table class="table" width="95%" cellspacing="0">
                                   <tr>
                                        <th><h2 align="center">Payment Details</h2></th>
                                   </tr>
                                </table>
                                <table class="table" width="95%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Fees Name</th>
                                            <th width="20%">Payment Method</th>
                                            <th width="20%">PaidTo</th>
                                            <th width="40%">Comments</th>
                                            <th width="10%">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo lang("$payment->feesname"); ?></td>
                                            <td><?php echo htmlspecialchars($payment->paytype);?></td>
                                            <td><?php echo htmlspecialchars($payment->payto);?></td>
                                            <td><?php echo wordwrap($payment->comments, 50, "<br />\n"); ?></td>
                                            <td><?php echo htmlspecialchars($payment->payamount);?></td>
                                        </tr>     
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Subtotal: <?php echo htmlspecialchars($payment->payamount);?> <em>Tk</em></th>
                                            <th></th>
                                        </tr>                               
                                    </tbody>
                                </table>
                            </div>

                        </div>    

                    </div>
                </div>

                <div class="row-fluid">
                    
                    <br></br>
                </div>
            </div>
            