<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('level_view_heading');?> <small><?php echo lang('level_view_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span2"></div>
				
                    <div class="span8">
                        <div class="block">
                            <div class="span11">
                                <span class="label"><?php echo anchor('apps/page/college_add', lang('college_add_link'))?> </span>
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
                                            <th width="30%" style="vertical-align: text-top;text-align: center;">
                                            <?php echo lang('college_name_label');?>
                                            </th>
                                            <th width="40%" style="vertical-align: text-top;text-align: center;">
                                            <?php echo lang('comments');?>
                                            </th>
                                            <th width="30%" style="vertical-align: text-top;text-align: center;">
                                            <?php echo lang('client_action_th');?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($colleges as $college):?>
                                        <tr>
                                            <td style="text-align: center;">
                                                <?php echo $college->collegename;?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo wordwrap($college->collegecomments, '40', '</br>', 'false');?>
                                            </td>
											<td style="text-align: center;">
                                                <span><!--
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
												</span> <span style="color:#4692D7;"> | </span>--> <span>
												<?php echo anchor("apps/page/college_edit/".$college->collegeid, 'Edit') ;?>
												<span style="color:#4692D7;"> | </span> <span style="display:;">
												<?php echo anchor("apps/page/college_delete/".$college->collegeid, 'Delete') ;?>
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
                                        <span class="label"><?php echo anchor('apps/page/college_add', lang('college_add_link'))?></span>
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
                
					<div class="span2"></div>
				</div>  

                <div class="row-fluid">
                    <br></br>
                </div>
            </div>
            