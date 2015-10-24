<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('level_view_heading');?> <small><?php echo lang('level_view_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span10">
                        <div class="block">
                            <div class="span11">
                                <span class="label"><?php echo anchor('apps/agent/add', lang('agent_add_link'))?> </span>
                                <span class="label label-info" style="align: right;"> <?php echo anchor('apps/client/index', lang('client_view_link'))?></span>
                                <span class="label label-success" style="align: right;"> <?php echo anchor('apps/agent/index', lang('agent_view_link'))?></span>
                            </div>
                            <div class="span1"></div>
                        </div>
                        <div class="block">
                            <div class="head blue">
                                <h5><?php echo $message;?></h5>                         
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('level_levelname_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('discounts');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('payment_fees_one_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('payment_fees_two_label');?>
                                            </th>
											<th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('payment_fees_three_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('payment_fees_four_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('payment_fees_five_label');?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo lang('level_clientsrequired_label');?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo lang('level_action_label');?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($levels as $level):?>
                                        <tr>
                                            <td style="text-align: left;">
                                                <?php echo anchor("apps/level/view/".$level->levelid, $level->levelname);?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($level->discounts,ENT_QUOTES,'UTF-8').'%';?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($level->fees1,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($level->fees2,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($level->fees3,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($level->fees4,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($level->fees5,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo htmlspecialchars($level->clientsrequired,ENT_QUOTES,'UTF-8');?>
                                            </td>
											<td style="text-align: center;">
                                                <span><!--
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
												</span> <span style="color:#4692D7;"> | </span>--> <span>
												<?php echo anchor("apps/level/edit/".$level->levelid, 'Edit') ;?>
												<span style="color:#4692D7;"> | </span> <span>
												<?php echo anchor("apps/level/add/".$level->levelid, 'Add') ;?>
												</span>
                                            </td>
                                        </tr>
                                    <?php endforeach;?> 
									</tbody>
                                </table>
                               	<br></br><!--
                                <div class="block">
                                    <div class="span5">
                                        
                                    </div>
                                    <div class="span2">
                                        <span class="label label-important"><?php echo $links; ?> </span> 
                                    </div>
                                    <div class="span5">
                                        
                                    </div>
                                </div>-->
								<div class="block">
                                    <div class="span11">
                                        <span class="label"><?php echo anchor('apps/agent/add', lang('agent_add_link'))?> </span>
                                        <span class="label label-info" style="align: right;"> <?php echo anchor('apps/client/index', lang('client_view_link'))?></span>
                                        <span class="label label-success" style="align: right;"> <?php echo anchor('apps/agent/index', lang('agent_view_link'))?></span>
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
            