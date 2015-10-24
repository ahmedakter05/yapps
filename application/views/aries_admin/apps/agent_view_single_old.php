<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('agent_view_heading');?> <small><?php echo lang('agent_view_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span4">
                        <div class="block">
                            <div class="head blue">
                                <h5 align="center"><?php echo 'Agent Details';?></h5>
                                <h5><?php echo $message;?></h5>
                            </div>
                        
                            <div class="data dark" style="heighta: 240px;">
                                <div class="">
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_fullname_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo anchor("apps/agent/view/".$agent['agentid'], $agent['firstname'] . ' ' . $agent['lastname']); ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_username_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo anchor("apps/agent/view/".$agent['agentid'], $agent['username']); ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_email_label') . ' : email';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo mailto($agent['email'], $agent['email']); ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_passport_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $agent['passportnoagent']; ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%" style="vertical-align: text-top;">
                                                <?php echo lang('agent_occupation_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $agent['occupation']; ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_dateofbirth_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $agent['dateofbirth'];?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_accountcreated_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $agent['created'];?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_currentlevelname_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo lang('agent_levelid_' . $agent['levelid'] . '_label');?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_nextlevelname_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo htmlspecialchars($clientstat['target']['levelname']);?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                <?php echo lang('agent_status_label') . ' : ';?>
                                                </th>
                                                <th width="60%" style="vertical-align: text-top;">
                                                <?php echo $agent['status']; ?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%" style="vertical-align: text-top;">
                                                <?php echo lang('agent_comments_label') . ' : ';?>
                                                </th>
                                                <th width="60%">
                                                <?php echo $agent['comments']; ?>
                                                </th>                                    
                                            </tr>
                                        </thead>
                                    </table>
                                    <br></br>
                                    <div class="span4">
                                        <span class="label" style="color: #FFF; align: left;"> <?php echo anchor("apps/agent/edit/".$agent['agentid'], lang('edit_agent_link'))?></span>
                                    </div>
                                    <div class="span4">
                                        <span class="label" style="color: #FFF; align: center;"> <?php echo anchor("apps/agent/index", lang('agent_view_link'))?></span>
                                    </div>
                                    <div class="span3">
                                        <span class="label" style="color: #FFF; align: right;"> <?php echo anchor("apps/client/add/".$agent['agentid'], lang('index_create_client_link'))?></span>
                                    </div>
                                    
                                </div>
                            </div>         
                        </div>
                    </div>

                    <div class="span6">
                        <div class="block">
                            <div class="head green">
                                <h5 align="center"><?php echo 'Level & Payment Details';?></h5>
                            </div>
                        
                            <div class="data dark" style="">
                                <div class="data-fluid">
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('Fees 1');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('Fees 2');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('Fees 3');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('Fees 4');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('Fees 5');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('discounts');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo 'Action';?>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($levelstat['fees1'] . ' Tk');?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($levelstat['fees2'] . ' Tk');?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($levelstat['fees3'] . ' Tk');?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($levelstat['fees4'] . ' Tk');?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($levelstat['fees5'] . ' Tk');?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($levelstat['discounts'] . '%');?></td>
                                            <td style="text-align: center;"><?php //echo anchor("apps/payment/update/".$payment->paymentid, 'Update') ;?></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>         
                        </div>

                        <div class="block">
                            <div class="head orange">
                                <h5 align="center"><?php echo 'Clients Submission Details';?></h5>
                            </div>
                        
                            <div class="data dark" style="">
                                <div class="data-fluid">
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('agent_clientthismonth_label');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('agent_clientlastmonth_label');?>
                                            </th>
                                            <th width="20%" style="vertical-align: text-top;">
                                            <?php echo lang('agent_clientb4lastmonth_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('agent_clienttotal_label');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('agent_nextleveldiscount_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('agent_targetclients_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('agent_timeremaining_label');?>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($clientstat['current']);?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($clientstat['last']);?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($clientstat['b4last']);?></td>
                                            <td style="text-align: center;"><?php echo anchor("apps/agent/agent_view_client/".$agent['agentid'], $clientstat['total']) ;?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($clientstat['target']['discounts'] . '%');?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($clientstat['target']['clientsremaining']);?></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($clientstat['target']['daysremaining'] . ' days');?></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>         
                        </div>

                    </div>
					<div class="span1"></div>
				</div>  

                <div class="row-fluid">
                    <br></br>
                </div>
            </div>
            