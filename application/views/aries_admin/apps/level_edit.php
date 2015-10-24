           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('add_client_heading');?> <small><?php echo lang('add_client_subheading');?></small></h1>
                </div>
                
				<div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span4">
                        <div class="block">
                            <div class="head blue">
                                <h5 align="center"><?php echo 'Level Details';?></h5>
                                <h5><?php echo $message;?></h5>
                            </div>
                        
                            <div class="data dark">
                                <div class=""><?php echo form_open("apps/level/edit/". $id['levelid']);?>
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th width="40%">
                                                	<?php echo lang('level_levelname_label', 'levelname');?>
                                                </th>
                                                <th width="60%">
                                                	<?php echo form_input($levelname);?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                	<?php echo lang('discounts', 'discounts');?>
                                                </th>
                                                <th width="60%">
                                                	<?php echo form_input($discounts);?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                	<?php echo lang('level_clientsrequired_label', 'clientsrequired');?>
                                                </th>
                                                <th width="60%">
                                                	<?php echo form_input($clientsrequired);?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="40%">
                                                	<?php echo lang('level_comments_label', 'comments');?>
                                                </th>
                                                <th width="60%">
                                                	<?php echo form_textarea($comments);?>
                                                </th>                                    
                                            </tr>
                                        </thead>
                                    </table>
                                    <br></br>
                                </div>
                            </div>         
                        </div>
                    </div>

                    <div class="span6">
                        <div class="block">
                            <div class="head green">
                                <h5 align="center"><?php echo 'Payment Rates';?></h5>
                            </div>
                        
                            <div class="data dark">
                                <div class="data-fluid">
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
	                                    <thead>
	                                        <tr>
	                                            <th width="20%">
	                                            	<?php echo lang('Fees 1', 'fees1');?>
	                                            </th>
	                                            <th width="20%">
	                                            	<?php echo lang('Fees 2', 'fees2');?>
	                                            </th>
	                                            <th width="20%">
	                                            	<?php echo lang('Fees 3', 'fees3');?>
	                                            </th>
	                                            <th width="20%">
	                                            	<?php echo lang('Fees 4', 'fees4');?>
	                                            </th>
	                                            <th width="20%">
	                                            	<?php echo lang('Fees 5', 'fees5');?>
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                            <td><?php echo form_input($fees1);?></td>
	                                            <td><?php echo form_input($fees2);?></td>
	                                            <td><?php echo form_input($fees3);?></td>
	                                            <td><?php echo form_input($fees4);?></td>
	                                            <td><?php echo form_input($fees5);?></td>
	                                        </tr>
	                                    </tbody>
                                	</table>
                                		
                                		<?php echo form_hidden($id); ?>
                                		<br></br>
                                	<div class="data-fluid">
										<div class="span6" align="left">
											<?php echo form_reset('reset', lang('client_add_reset_btn')); ?>
										</div>
										<div class="span6" align="right">
											<?php echo form_submit('submit', lang('client_update_submit_btn'));?>
										</div>
									</div>
                                </div>
                                <?php echo form_close();?>
                            </div>         
                        </div>
                    </div>
					<div class="span1"></div>
				</div>  
				
