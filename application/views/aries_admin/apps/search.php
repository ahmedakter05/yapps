<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('client_view_heading');?> <small><?php echo lang('client_view_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
                    

                    
                </div>

                <div class="row-fluid">
				
					<div class="span4"></div>
				
                    <div class="span4">
						<div class="block">
                            <div class="head green">
                                <h5><?php echo $message;?></h5>
							</div>
						
							<div class="data dark">
							<div class="data-fluid">
								<form action="<?php site_url('apps/search');?>" method="get">
								  	<div class="row-form">
	                                    <div class="span3">Search:</div>
	                                    <div class="span9"><input type="text" placeholder="Search" name="query"/></div>
                                	</div>
									<div class="row-form">
	                                    <div class="span3">Crieteria:</div>
	                                    <div class="span9">
	                                        <select name="type">
	                                            <option value="client">Clients</option>
	                                            <option value="agent">Agents</option>
	                                            <option value="payment">Payments</option>
	                                            <option value="level">Level</option>                              
	                                        </select>
	                                    </div>
	                                </div>   
	                                <div class="row-form">
	                                    <div class="span3"></div>
	                                    <div class="span9" align="center"><input type="submit" value="Submit"></div>
                                	</div>
	                                
								</form>   							
								

							</div>
							</div>
						</div>
					</div>

					<div class="span4"></div>

				</div>


                <div class="row-fluid">
                    <br></br><br></br>
                </div>
            </div>
            