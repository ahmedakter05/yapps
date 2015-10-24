           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('edit_user_heading');?> <small><?php echo lang('edit_user_subheading');?></small></h1>
                </div>
                
				
				<div class="row-fluid">
				
					<div class="span2"></div>
				
                    <div class="span8">
						<div class="block">
                            <div class="head blue">
                                <h5><?php echo $message;?></h5>
							</div>
						</div>
						
						<div class="data-fluid">
						
							<?php echo form_open(uri_string());?>
							
							<div class="row-form">
								<div class="span3"><?php echo lang('edit_user_fname_label', 'first_name');?></div>
								<div class="span9"><?php echo form_input($first_name);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('edit_user_lname_label', 'last_name');?></div>
								<div class="span9"><?php echo form_input($last_name);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('edit_user_company_label', 'company');?></div>
								<div class="span9"><?php echo form_input($company);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('edit_user_phone_label', 'phone');?></div>
								<div class="span9"><?php echo form_input($phone);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('edit_user_password_label', 'password');?></div>
								<div class="span9"><?php echo form_input($password);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></div>
								<div class="span9"><?php echo form_input($password_confirm);?></div>
							</div>

						  
							<div class="head green" style="padding-left: 200px;"><br>
						  <?php if ($this->ion_auth->is_admin()): ?>

							  <h3><?php echo lang('edit_user_groups_heading');?></h3>
							  <?php foreach ($groups as $group):?>
								  <label class="checkbox">
								  <?php
									  $gID=$group['id'];
									  $checked = null;
									  $item = null;
									  foreach($currentGroups as $grp) {
										  if ($gID == $grp->id) {
											  $checked= ' checked="checked"';
										  break;
										  }
									  }
								  ?>
								  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
								  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
								  </label>
							  <?php endforeach?>

						  <?php endif ?>

						  <?php echo form_hidden('id', $user->id);?>
						  <?php echo form_hidden($csrf); ?> 
							<br></div></br>
						  <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

					<?php echo form_close();?>

						
						</div>
                    </div>
					
                	<div class="span2"></div>
				
				</div>

				<div class="row-fluid">
                    <br></br><br></br><br></br><br></br><br></br>

                </div>
                
				
                 
				
            </div>
  