<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('index_heading');?> <small><?php echo lang('index_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span10">
                        <div class="block">
                            <div class="head blue">
                                <h3><?php echo $message;?></h3>                         
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="25%">
                                            User Name
                                            </th>
                                            <th width="20%">
                                            <?php echo lang('index_email_th');?>
                                            </th>
                                            <th width="20%" align="center">
                                            <?php echo lang('index_groups_th');?>
                                            </th>
                                            <th width="18%">
                                            <?php echo lang('index_status_th');?>
                                            </th>
											<th width="25%">
                                            <?php echo lang('index_action_th');?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($users as $user):?>
                                        <tr>
                                            <td>
                                                <?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?> &nbsp; <?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php foreach ($user->groups as $group):?>
												<span class="label label-warning" style="color: #FFF; align: center;"><?php echo anchor("users/admin/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?> </span>
												<?php endforeach?>
                                            </td>
                                            <td>
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
                                            </td>
											<td>
                                                <!--<span>
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
												</span>--> <span style="color:#4692D7;"> | </span> <span>
												<?php echo anchor("users/admin/edit_user/".$user->id, 'Edit') ;?>
												<span style="color:#4692D7;"> | </span> <span>
												<?php echo anchor("users/admin/delete_user/".$user->id, 'Delete') ;?>
												</span>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
									</tbody>
                                </table>
								<br></br>
								<div class="block">
									<div class="span11">
										<span class="label label-info"><?php echo anchor('users/admin/create_user', lang('index_create_user_link'))?> </span> <span class="label label-success" style="color: #FFF; align: right;"> <?php echo anchor('users/admin/create_group', lang('index_create_group_link'))?></span>
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
                    <br></br><br></br><br></br><br></br><br></br>
                    <br></br><br></br>
                </div>
            </div>
            