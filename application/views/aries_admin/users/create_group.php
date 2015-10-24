<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-ok"></span>
                    </div>
                    <h1><?php echo lang('create_group_heading');?> <small><?php echo lang('create_group_subheading');?></small></h1>
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
                                
                                    <?php echo form_open("users/admin/create_group");?>
                                    <div class="row-form">
                                        <div class="span3"><?php echo lang('create_group_name_label', 'group_name');?></div>
                                        <div class="span9"><?php echo form_input($group_name);?></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span3"><?php echo lang('create_group_desc_label', 'description');?></div>
                                        <div class="span9"><?php echo form_input($description);?></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="toolbar bottom tar">
                                            <div class="btn-group">
                                            <?php echo form_submit('submit', lang('create_group_submit_btn'));?>
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
            




<h1></h1>
<p></p>

<div id="infoMessage"><?php echo $message;?></div>

