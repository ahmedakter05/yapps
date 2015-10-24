<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-ok"></span>
                    </div>
                    <h1><?php echo lang('change_password_heading');?> <small><?php echo 'Users Control Panel';?></small></h1>
                </div>
                
                <div class="row-fluid">
                    <br></br>
                </div> 

                <div class="row-fluid">
                
                    <div class="span3"></div>
                
                    <div class="span6">
                        <div class="block">
                            <div class="head yellow">
                                <h5><?php echo $message;?></h5>
                            </div>
                        
                            <div class="data dark">
                                <div class="data-fluid">
                                
                                    <?php echo form_open("users/admin/change_password");?>
                                    <div class="row-form">
                                        <div class="span4"><?php echo lang('change_password_old_password_label', 'old_password');?></div>
                                        <div class="span8"><?php echo form_input($old_password);?></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></div>
                                        <div class="span8"><?php echo form_input($new_password);?></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?></div>
                                        <div class="span8"><?php echo form_input($new_password_confirm);?></div>
                                    </div>
                                    <?php echo form_input($user_id);?>
                                    <div class="row-form">
                                        <div class="toolbar bottom tar">
                                            <div class="btn-group">
                                            <?php echo form_submit('submit', lang('change_password_submit_btn'));?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php echo form_close();?>

                                </div>
                            </div>
                        </div>
                    </div>
                                        
                    <div class="span3"></div>
                
                </div>


                <div class="row-fluid">
                    <br></br><br></br><br></br><br></br><br></br>
                </div>                
                

            </div>