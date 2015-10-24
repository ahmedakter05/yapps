           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('create_user_heading');?> <small><?php echo lang('create_user_subheading');?></small></h1>
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
                                    
                                          <?php echo form_open("users/admin/create_user");?>
                                          
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_uname_label', 'user_name');?></div>
                                                <div class="span9"><?php echo form_input($user_name);?></div>
                                          </div>
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_fname_label', 'first_name');?></div>
                                                <div class="span9"><?php echo form_input($first_name);?></div>
                                          </div>
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_lname_label', 'last_name');?></div>
                                                <div class="span9"><?php echo form_input($last_name);?></div>
                                          </div>
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_company_label', 'company');?></div>
                                                <div class="span9"><?php echo form_input($company);?></div>
                                          </div>
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_email_label', 'email');?></div>
                                                <div class="span9"><?php echo form_input($email);?></div>
                                          </div>
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_phone_label', 'phone');?></div>
                                                <div class="span9"><?php echo form_input($phone);?></div>
                                          </div>
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_password_label', 'password');?></div>
                                                <div class="span9"><?php echo form_input($password);?></div>
                                          </div>
                                          <div class="row-form">
                                                <div class="span3"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></div>
                                                <div class="span9"><?php echo form_input($password_confirm);?></div>
                                          </div>
                                          
                                          <br></div></br>

                                      <p align="right"><?php echo form_reset('reset', lang('client_add_reset_btn')); echo '        |       '; echo form_submit('submit', lang('create_user_submit_btn'));?></p>

                              <?php echo form_close();?>

                                    
                                    </div>
                    </div>
                              
                  <div class="span2"></div>
                        
                        </div>

                        <div class="row-fluid">
                    <br></br><br></br><br></br><br></br><br></br>

                </div>
                
                        
                 
                        
            </div>