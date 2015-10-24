<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('agent_view_heading');?> <small><?php echo lang('add_agent_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span10">
                        <div class="block">
                            <div class="span11">
                                <span class="label"><?php echo anchor('apps/agent/add', lang('agent_add_link'))?> </span>
                                <span class="label label-info" style="align: right;"> <?php echo anchor('apps/client/index', lang('client_view_link'))?></span>
                                <span class="label label-success" style="align: right;"> <?php echo anchor('apps/page/college_view', lang('college_view_link'))?></span>
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
                                            <th width="10%">
                                            <?php echo lang('agent_levelname_label');?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('agent_fullname_label');?>
                                            </th>
                                            <th width="10%">
                                            <?php echo lang('agent_username_label');?>
                                            </th>
                                            <th width="10%">
                                            <?php echo lang('agent_passport_label');?>
                                            </th>
											<th width="15%">
                                            <?php echo lang('agent_clientthismonth_label');?>
                                            </th>
                                            <th width="10%">
                                            <?php echo lang('agent_clienttotal_label');?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('agent_status_label');?>
                                            </th>
                                            <th width="20%">
                                            <?php echo lang('agent_action_label');?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($agents as $agent):?>
                                        <tr>
                                            <td>
                                                <?php echo lang('agent_levelid_'.$agent->levelid.'_label');  ;?>
                                            </td>
                                            <td>
                                                <?php echo anchor("apps/agent/view/".$agent->agentid, $agent->firstname . ' ' . $agent->lastname);?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($agent->username,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($agent->passportnoagent,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($agent->clientthismonth,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo anchor("apps/agent/agent_view_client/".$agent->agentid, "$agent->clienttotal") ;?>
                                            </td>
                                            <td>
                                                <?php //echo htmlspecialchars($client->status,ENT_QUOTES,'UTF-8');?>
                                                <span><?php echo anchor("apps/agent/change_status/".$agent->agentid, "$agent->status") ;?></span>
                                            </td>
											<td>
                                                <span><!--
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
												</span> <span style="color:#4692D7;"> | </span>--> <span>
												<?php echo anchor("apps/agent/edit/".$agent->agentid, 'Edit') ;?>
												<span style="color:#4692D7;"> | </span> <span>
												<?php echo anchor("apps/client/add/".$agent->agentid, 'Add Client') ;?>
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
                                        <span class="label"><?php echo anchor('apps/agent/add', lang('agent_add_link'))?> </span>
                                        <span class="label label-info" style="align: right;"> <?php echo anchor('apps/client/index', lang('client_view_link'))?></span>
                                        <span class="label label-success" style="align: right;"><?php echo anchor('apps/page/college_view', lang('college_view_link'))?></span>
                                    </div>
                                    <div class="span1">
                                        <span class="label label-important"><?php echo anchor('users/admin/logout', lang('logout_heading'))?> </span>
                                    </div>
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
            