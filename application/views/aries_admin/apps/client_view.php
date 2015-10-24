<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('client_view_heading');?> <small><?php echo lang('client_view_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span10">
                        <div class="block">
                            <div class="span11">
                                <span class="label"><?php echo anchor('apps/client/add', lang('index_create_client_link'))?> </span>
                                <span class="label label-info" style="color: #FFF; align: right;"> <?php echo anchor('apps/agent/index', lang('agent_view_link'))?></span>
                                <span class="label label-success" style="color: #FFF; align: right;"> <?php echo anchor('apps/page/college_view', lang('college_view_link'))?></span>
                            </div>
                            <div class="span1">
                                
                            </div>
                        </div>
                        <div class="block">
                            <div class="head blue">
                                <h5><?php echo $message;?></h5>                         
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%">
                                            <?php echo lang('client_name_th');?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('client_agentname_th');?>
                                            </th>
                                            <th width="12%">
                                            <?php echo lang('college_name_label');?>
                                            </th>
                                            <th width="15%" align="center">
                                            <?php echo lang('client_passportno_th');?>
                                            </th>
                                            <th width="13%">
                                            <?php echo lang('client_fileno_th');?>
                                            </th>
											<th width="15%">
                                            <?php echo lang('client_status_th');?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('client_action_th');?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($clients as $client):?>
                                        <tr>
                                            <td>
                                                <?php echo anchor("apps/client/view/".$client->clientid, $client->firstname . ' ' . $client->lastname);?>
                                            </td>
                                            <td>
                                                <?php echo anchor("apps/agent/view/".$client->agentid, $client->agentname);?>
                                            </td>
                                            <td>
                                                <?php echo anchor("apps/college/client_view/".$client->collegeid, $client->collegename);?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($client->passportnoclient,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
												<?php echo htmlspecialchars($client->filenumber,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php //echo htmlspecialchars($client->status,ENT_QUOTES,'UTF-8');?>
                                                <span><?php echo anchor("apps/client/change_status/".$client->clientid, "$client->status") ;?></span>
                                            </td>
											<td>
                                                <span><!--
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
												</span> <span style="color:#4692D7;"> | </span>--> <span>
												<?php echo anchor("apps/client/edit/".$client->clientid, 'Edit') ;?>
												<span style="color:#4692D7;"> | </span> <span>
												<?php echo anchor("apps/payment/add/".$client->clientid, 'Add Payment') ;?>
												</span>
                                            </td>
                                        </tr>
                                    <?php endforeach;?> 
									</tbody>
                                </table>
                               	<br></br>
                                <div class="block">
                                    <div class="span5">
                                        
                                    </div>
                                    <div class="span2">
                                        <span class="label label-important"><?php echo $links; ?> </span>
                                    </div>
                                    <div class="span5">
                                        
                                    </div>
                                </div>
								<div class="block">
                                    <div class="span11">
                                        <span class="label"><?php echo anchor('apps/client/add', lang('index_create_client_link'))?> </span>
                                        <span class="label label-info" style="color: #FFF; align: right;"> <?php echo anchor('apps/agent/index', lang('agent_view_link'))?></span>
                                        <span class="label label-success" style="color: #FFF; align: right;"> <?php echo anchor('apps/page/college_view', lang('college_view_link'))?></span>
                                    </div>
                                    <div class="span1">
                                        <span class="label label-important"><?php echo anchor('users/admin/logout', lang('logout_heading'))?> </span>
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
            