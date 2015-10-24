             <script>
			    $(function() {
			    $( "#datepicker" ).datepicker({
			      changeMonth: true,
			      changeYear: true
			    });
			  });
			 </script>
           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('add_agent_heading');?> <small><?php echo lang('add_agent_subheading');?></small></h1>
                </div>
                
				
				<div class="row-fluid">
				
					<div class="span2"></div>
				
                    <div class="span8">
						<div class="block">
                            <div class="head purple">
                                <h5><?php echo $message;?></h5>
							</div>
						
						<div class="data dark">
						<div class="data-fluid">
						
							<?php echo form_open("apps/agent/add");?>
							
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_firstname_label', 'firstname');?></div>
								<div class="span9"><?php echo form_input($firstname);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_lastname_label', 'lastname');?></div>
								<div class="span9"><?php echo form_input($lastname);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_username_label', 'username');?></div>
								<div class="span9"><?php echo form_input($username);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_email_label', 'email');?></div>
								<div class="span9"><?php echo form_input($email);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_passport_label', 'passportnoagent');?></div>
								<div class="span9"><?php echo form_input($passportnoagent);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_occupation_label', 'occupation');?></div>
								<div class="span9"><?php echo form_input($occupation);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_dateofbirth_label', 'dateofbirth');?></div>
								<div class="span9"><?php echo form_input($dateofbirth);?><span class="bottom">Example: 2012-12-21</span></div>
							</div>
							<!--<div class="row-form">
								<div class="span3"><?php echo lang('agent_levelid_label', 'levelid');?></div>
								<div class="span9"><?php echo form_dropdown('levelid', $levelid['options'], '1');?></div>
							</div>-->
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_status_label', 'status');?></div>
								<div class="span9"><?php echo form_input($status);?></div>
							</div>
							<!--<div class="row-form">
								<div class="span3"><?php echo lang('agent_refferenceid_label', 'refferenceid');?></div>
								<div class="span9"><?php echo form_input($refferenceid);?></div>
							</div>-->
							<div class="row-form">
								<div class="span3"><?php echo lang('agent_comments_label', 'comments');?></div>
								<div class="span9"><?php echo form_textarea($comments);?></div>
							</div>

							<br></div></br>

						  <p align="right"><?php echo form_reset('reset', lang('client_add_reset_btn')); echo '        |       '; echo form_submit('submit', lang('agent_add_submit_btn'));?></p>

					<?php echo form_close();?>

						
						</div>
                    </div>
					
                	<div class="span2"></div>
				
				</div>

				<div class="row-fluid">
                    <br></br>

                </div>
                
				
                 
				
            </div>
  