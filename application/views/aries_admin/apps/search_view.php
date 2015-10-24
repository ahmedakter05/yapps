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
				
					<div class="span1"></div>
				
                    <div class="span10">
						<div class="block">
                            <div class="head green">
                                <h5><?php echo $message;?></h5>
							</div>
						
							<div class="data dark">
							<div class="data-fluid">
								<form action="<?php site_url('apps/search');?>" method="get">
								  	<div class="row-form">
	                                    <div class="span1">Search:</div>
	                                    <div class="span4"><input type="text" placeholder="Search" name="query" value="<?php echo $query; ?>"/></div>
                                	</div>
									<div class="row-form">
	                                    <div class="span1">Crieteria:</div>
	                                    <div class="span2">
	                                        <select name="type">
	                                            <option value="all" <?php echo (isset($all) ? 'selected' : NULL); ?> >All</option>
	                                            <option value="client" <?php echo (isset($client) ? 'selected' : NULL); ?> >Clients</option>
	                                            <option value="agent" <?php echo (isset($agent) ? 'selected' : NULL); ?> >Agents</option>
	                                            <option value="payment" <?php echo (isset($payment) ? 'selected' : NULL); ?> >Payments</option>
	                                            <option value="level" <?php echo (isset($level) ? 'selected' : NULL); ?> >Level</option>                              
	                                        </select>
	                                    </div>
	                                    <div class="span1" align="center"><input type="submit" value="Submit"></div>
	                                </div>   
	                                
								</form>   							
								

							</div>
							</div>

							<div class="data dark">
							<div class="data-fluid">
								<table class="table" width="95%" cellspacing="0">
	                                    <thead>
	                                       <tr>
	                                            <th><h2 align="center">Search Result</h2></th>
	                                       </tr>
	                                       <tr>
	                                            <td><h4 align="center"> <?php echo ( empty($all) && empty($client) && empty($agent) && empty($payment) ? 'No Data Found' : NULL); ?> </h4></td>
	                                       </tr>
	                                   </thead>
	                               </table>
	                               <table class="table" width="95%" cellspacing="0">
	                                    <thead>
	                                       <tr>
	                                       		<th width="5%">No.</th>
	                                       		<th width="20%">Name</th>
	                                       		<th width="20%">Agent Name</th>
	                                       		<th width="25%">Email</th>
	                                       		<th width="15%">Passport No</th>
	                                       		<th width="15%">File Number</th>
	                                       </tr>
	                                    </thead>
	                                    <tbody>
	                                    <?php $id = 1; foreach ( (!empty($all) ? $all : (!empty($client) ? $client : (!empty($agent) ? $agent : (!empty($payment) ? $payment : array())))) as $data): ?>
	                                   		<tr>
	                                   			<td><?php echo $id++; ?></td>
	                                   			<td><?php echo anchor("apps/client/view/".$data->clientid, $data->firstname . ' ' . $data->lastname); ?></td>
	                                   			<td><?php echo anchor("apps/agent/view/".$data->agentid, $data->agentname); ?></td>
	                                   			<td><?php echo $data->email; ?></td>
	                                   			<td><?php echo $data->passportnoclient; ?></td>
	                                   			<td><?php echo $data->filenumber; ?></td>
	                                   		</tr>
	                                   	<?php endforeach;?> 
	                                   </tbody>
                                </table>
							</div>
							</div>
						</div>
					</div>

					<div class="span1"></div>

				</div>


                <div class="row-fluid">
                    <br></br>
                </div>
            </div>
            