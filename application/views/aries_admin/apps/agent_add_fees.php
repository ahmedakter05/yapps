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
                    <h1><?php echo lang('add_Fees_heading');?> <small><?php echo lang('add_agent_subheading');?></small></h1>
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
						
							<?php echo form_open("apps/agent/fees_add");?>
							
							<div class="row-form">
								<div class="span3"><?php echo lang('client_agentname_label', 'agentname');?></div>
								<div class="span9"><?php echo form_input($agentname);?></div>
							</div>
							<div class="row-form">
                                <div class="span3"><?php echo lang('college_name_label', 'collegename');?></div>
                                <div class="span9">
                                    <select name="<?php echo $collegename['name']; ?>">
                                    <?php foreach ($collegename['options'] as $college):?>
                                        <option value="<?php echo $college->collegeid; ?>" <?php echo ($collegename['value']==$college->collegeid ? 'selected' : NULL);?> ><?php echo $college->collegename; ?></option>
                                    <?php endforeach; ?>                                                 
                                    </select>
                                </div>
                            </div>     
							<div class="row-form">
								<div class="span3"><?php echo lang('Fees 1', 'fees1');?></div>
								<div class="span9"><?php echo form_input($fees1);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('Fees 2', 'fees2');?></div>
								<div class="span9"><?php echo form_input($fees2);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('Fees 3', 'fees3');?></div>
								<div class="span9"><?php echo form_input($fees3);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('Fees 4', 'fees4');?></div>
								<div class="span9"><?php echo form_input($fees4);?></div>
							</div>
							<div class="row-form">
								<div class="span3"><?php echo lang('Fees 5', 'fees5');?></div>
								<div class="span9"><?php echo form_input($fees5);?></div>
							</div>

							<?php echo form_hidden($id); ?>

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
  