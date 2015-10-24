           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('add_payment_heading');?> <small><?php echo lang('add_payment_subheading');?></small></h1>
                </div>
                
				
				<div class="row-fluid">
				
					<div class="span2"></div>
				
                    <div class="span8">
						<div class="block">
                            <div class="head orange">
                                <h5><?php echo $message;?></h5>
							</div>
						
							<div class="data dark">
								<div class="data-fluid">
								
									<?php echo form_open("apps/payment/add");?>
									
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_agentname_label', 'agent_name');?></div>
										<div class="span9"><?php echo form_input($agent_name);?></div>
									</div>
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_clientname_label', 'client_name');?></div>
										<div class="span9"><?php echo form_input($client_name);?></div>
									</div>
									<div class="row-form">
										<div class="span3"><?php echo lang('college_name_label', 'college_name');?></div>
										<div class="span9"><?php echo form_input($college_name);?></div>
									</div>
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_client_passportno_label', 'passportnoclient');?></div>
										<div class="span9"><?php echo form_input($passportnoclient);?></div>
									</div>
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_feesname_label', 'feesname');?></div>
										<div class="span9"><?php echo form_dropdown($fees['name'], $feesname, $fees['selection']);?></div>
									</div>
									<!--<div class="row-form" style="margin-left: 15px;">
										<div class="span3"></div>
										<div class="span2"><?php echo lang('Fees 1', 'fees_one');?></div>
										<div class="span1"><?php echo form_input($fees_one);?></div>
										<div class="span2"><?php echo lang('Fees 2', 'fees_two');?></div>
										<div class="span1"><?php echo form_input($fees_two);?></div>
										<div class="span2"><?php echo lang('Fees 3', 'fees_three');?></div>
										<div class="span1"><?php echo form_input($fees_three);?></div>
										<div class="span0"></div>
									
									<div class="row-form" style="margin-left: 15px; margin-top: -100px;">
										<div class="span3"></div>
										<div class="span2"><?php echo lang('Fees 4', 'fees_four');?></div>
										<div class="span1"><?php echo form_input($fees_four);?></div>
										<div class="span2"><?php echo lang('Fees 5', 'fees_five');?></div>
										<div class="span1"><?php echo form_input($fees_five);?></div>
										<div class="span3"></div>
									</div></div> -->
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_pay_amount_label', 'pay_amount');?></div>
										<div class="span9"><?php echo form_input($pay_amount);?></div>
									</div>
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_pay_type_label', 'pay_type');?></div>
										<div class="span9"><?php echo form_input($pay_type);?></div>
									</div>
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_pay_to_label', 'pay_to');?></div>
										<div class="span9"><?php echo form_input($pay_to);?></div>
									</div>
									<div class="row-form">
										<div class="span3"><?php echo lang('payment_comments_label', 'comments');?></div>
										<div class="span9"><?php echo form_textarea($comments);?></div>
									</div>
									

									<?php echo form_hidden($id); ?>

									<br></div></br>

								  	<p align="right"><?php echo form_reset('reset', lang('client_add_reset_btn')); echo '        |       '; echo form_submit('submit', lang('payment_add_submit_btn'));?></p>

									<?php echo form_close();?>

								</div>
							</div>
						</div>
					</div>
                    					
                	<div class="span2"></div>
				
				</div>

				<div class="row-fluid">
                    <br></br>

                </div>
                
				
                 
				
            </div>
  