           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('add_client_heading');?> <small><?php echo lang('add_client_subheading');?></small></h1>
                </div>
                
				
				<div class="row-fluid">
				
					<div class="span2"></div>
				
                    <div class="span8">
						<div class="block">
                            <div class="head green">
                                <h5><?php echo $message;?></h5>
							</div>
						
							<div class="data dark">
							<div class="data-fluid">
							
								<?php echo form_open("apps/client/edit/". $id['clientid']);?>
								
								<div class="row-form">
									<div class="span3"><?php echo lang('client_agentname_label', 'agentname');?></div>
									<div class="span9"><?php echo form_input($agentname);?></div>
								</div>
								<div class="row-form">
	                                <div class="span3"><?php echo lang('college_name_label', 'college_name');?></div>
	                                <div class="span9">
	                                    <select name="<?php echo $college_name['name']; ?>">
	                                    <?php foreach ($college_name['options'] as $college):?>
	                                        <option value="<?php echo $college->collegeid; ?>" <?php echo ($college_name['value']==$college->collegeid ? 'selected' : NULL);?> ><?php echo $college->collegename; ?></option>
	                                    <?php endforeach; ?>                                                 
	                                    </select>
	                                </div>
                            	</div>   
								<div class="row-form">
									<div class="span3"><?php echo lang('client_firstname_label', 'firstname');?></div>
									<div class="span9"><?php echo form_input($firstname);?></div>
								</div>
								<div class="row-form">
									<div class="span3"><?php echo lang('client_lastname_label', 'lastname');?></div>
									<div class="span9"><?php echo form_input($lastname);?></div>
								</div>
								<div class="row-form">
									<div class="span3"><?php echo lang('client_email_label', 'email');?></div>
									<div class="span9"><?php echo form_input($email);?></div>
								</div>
								<div class="row-form">
									<div class="span3"><?php echo lang('client_passport_label', 'passportnoclient');?></div>
									<div class="span9"><?php echo form_input($passportnoclient);?></div>
								</div>
								<div class="row-form">
									<div class="span3"><?php echo lang('client_filenumber_label', '$filenumber');?></div>
									<div class="span9"><?php echo form_input($filenumber);?></div>
								</div>
								<div class="row-form">
									<div class="span3"><?php echo lang('client_status_label', 'status');?></div>
									<div class="span9"><?php echo form_input($status);?></div>
								</div>
								<div class="row-form">
									<div class="span3"><?php echo lang('client_comments_label', 'comments');?></div>
									<div class="span9"><?php echo form_textarea($comments);?></div>
								</div>

								<?php echo form_hidden($id); ?>

								<br></div></br>

							    <p align="right"><?php echo form_reset('reset', lang('client_add_reset_btn')); echo '        |       '; echo form_submit('submit', lang('client_update_submit_btn'));?></p>

								<?php echo form_close();?>

							</div>
						</div>

                    </div>
					
                	<div class="span2"></div>
				
				</div>

				<div class="row-fluid">
                    <br></br>

                </div>
                
				
                 
				
            </div>
  