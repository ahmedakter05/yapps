           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('edit_user_heading');?> <small><?php echo lang('edit_user_subheading');?></small></h1>
                </div>
                
				
				<div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span10">
						<div class="block">
                            <div class="head blue">
                                <h3><?php //echo $message;?></h3>
							</div>
						</div>
						
						<div class="data-fluid">
							<?php
							echo "<pre>";
							print_r($this->session->all_userdata());
							echo "</pre>";
							?>
						</div>
                    </div>
					
                	<div class="span1"></div>
				
				</div>	
                
				<div class="row-fluid">
                    <br></br><br></br><br></br><br></br><br></br>
                    
                </div>
                 
				
            </div>
  