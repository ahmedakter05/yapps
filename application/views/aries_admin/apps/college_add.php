           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('add_client_heading');?> <small><?php echo lang('add_client_subheading');?></small></h1>
                </div>
                
				<div class="row-fluid">
				
					<div class="span3"></div>
				
                    <div class="span6">
                        <div class="block">
                            <div class="head blue">
                                <h5 align="center"><?php echo 'Level Details';?></h5>
                                <h5><?php echo $message;?></h5>
                            </div>
                        
                            <div class="data dark">
                                <div class=""><?php echo form_open("apps/page/college_add");?>
                                    <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th width="30%" style="vertical-align: text-top;">
                                                	<?php echo lang('college_name_label', 'collegename');?>
                                                </th>
                                                <th width="70%" style="vertical-align: text-top;">
                                                	<?php echo form_input($collegename);?>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="30%">
                                                    <br>
                                                </th>
                                                <th width="70%">
                                                    </br>
                                                </th>                                    
                                            </tr>
                                            <tr>
                                                <th width="30%" style="vertical-align: text-top;">
                                                	<?php echo lang('comments', 'comments');?>
                                                </th>
                                                <th width="70%" style="vertical-align: text-top;">
                                                	<?php echo form_textarea($comments);?>
                                                </th>                                    
                                            </tr>
                                        </thead>
                                    </table>
                                    <br>
                                    <div class="data-fluid">
                                        <div class="span6" align="left">
                                            <?php echo form_reset('reset', lang('client_add_reset_btn')); ?>
                                        </div>
                                        <div class="span6" align="right">
                                            <?php echo form_submit('submit', lang('submit'));?>
                                        </div>
                                    </div>
                                    <?php echo form_close();?></br>
                                </div>         
                            </div>
                        </div>
                    </div>
					<div class="span3"></div>
				</div>  
				
