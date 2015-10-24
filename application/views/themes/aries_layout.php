<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title><?php echo $title ?></title>
    <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>assets/aries/favicon.ico"/>
    
    <link href="<?php echo base_url(); ?>assets/aries/css/stylesheets.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/footer-distributed.css" rel="stylesheet" type="text/css" />
	
    <!--[if lte IE 7]>
        <link href="<?php echo base_url(); ?>assets/aries/css/ie.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/other/lte-ie7.js'></script>
    <![endif]-->    
	
	
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script> 

    <script type='text/javascript' src="<?php echo base_url(); ?>assets/aries/js/plugins/uniform/jquery.uniform.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/aries/js/plugins/select/select2.min.js"></script>   
    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jflot/jquery.flot.js'></script>    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jflot/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/jflot/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/sparklines/jquery.sparkline.min.js'></script>        
    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/aries/js/plugins/uniform/jquery.uniform.min.js"></script>

    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/highlight/jquery.highlight-4.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/other/faq.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/plugins.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/charts.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/actions.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/aries/js/prints.js'></script>

</head>
<body>    
    <div id="loader"><img src="<?php echo base_url(); ?>assets/aries/img/loader.gif"/></div>
    <div class="wrapper">
        
        <div class="sidebar">
            
            <div class="top">
                <a href="<?php echo base_url(); ?>" class="logo"></a>
				
                <form action="<?php echo base_url() . 'apps/search';?>" method="get">
                    <div class="search">
    					</br>
                        <div class="input-prepend">
                            <span class="add-on orange"><span class="icon-search icon-white"></span></span>
                            <input type="text" placeholder="search..." name="query"/>     
                            <input style="display: none;" type="text" placeholder="Criteria" name="type" value="all"/>   
                            <input style="display: none; "type="submit" value="Submit">                                                 
                        </div>            
                    </div>
                </form>
            </div>
            <div class="nContainer">                
                <ul class="navigation bordered">         
                    <li class="active"><a href="<?php echo base_url(); ?>home" class="blblue">Dashboard</a></li>
                    <li>
                        <a href="<?php echo base_url(); ?>users/admin" class="blyellow">Admin Panel</a>
                        <div class="open"></div>
                        <ul>
                            <?php if (isset($this->session->userdata['username'])){ ?>
                            <li><a href="<?php echo base_url(); ?>users/admin/logout">Logout</a></li>
                            <?php } else { ?>
                            <li><a href="<?php echo base_url(); ?>users/admin/login">Login</a></li>
                            <?php }; ?>
                            <li><a href="<?php echo base_url(); ?>users/admin/index">View User</a></li>
                            <li><a href="<?php echo base_url(); ?>users/admin/create_user">Create User</a></li>
                            <li><a href="<?php echo base_url(); ?>users/admin/create_group">Create Groups</a></li>
                            <li><a href="<?php echo base_url(); ?>users/admin/change_password">Change Password</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="blgreen">Buisness Panel</a>
                        <div class="open"></div>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>apps/search">Search</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/agent/index">View Agents</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/agent/add">Add Agent</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/client/index">View Clients</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/client/add">Add Client</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/payment/index">View Payments</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/client/index">Add Payment</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/page/college_view">View Colleges</a></li>
                            <li><a href="<?php echo base_url(); ?>apps/level/index">View Levels</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="blorange">Others</a>
                        <div class="open"></div>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>pages/page/faq">FAQ</a></li>
                            <li><a href="<?php echo base_url(); ?>pages/page/about_us">About US</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="close">
                    <span class="ico-remove"></span>
                </a>
            </div>
            <div class="widget">
                <div class="datepicker"></div>
            </div>


            
        </div>
 
        <div class="body">
            
            <ul class="navigation">
                <li>
                    <a href="<?php echo base_url(); ?>home" class="button">
                        <div class="icon">
                            <span class="ico-monitor"></span>
                        </div>                    
                        <div class="name">Dashboard</div>
                    </a>                
                </li>
                <li>
                    <a href="#" class="button yellow">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-cog-2"></span>
                        </div>                    
                        <div class="name">Clients</div>
                    </a>          
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>apps/client/index">View Clients</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/client/add">Add Client</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/client/statistics">Clients Statistics</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/client/status">Clients Status</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/search/index">Search</a></li>
                    </ul>
                </li>                
                <li>
                    <a href="#" class="button green">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-pen-2"></span>
                        </div>                    
                        <div class="name">Agents</div>
                    </a>                
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>apps/agent/index">View Agents</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/agent/add">Add Agent</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/search/index">Search</a></li>
                    </ul>                    
                </li>                        
                <li>
                    <a href="#" class="button orange">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-chart-4"></span>
                        </div>                    
                        <div class="name">Admin Panel</div>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>users/admin/index">View Users</a></li>
                        <li><a href="<?php echo base_url(); ?>users/admin/create_user">Add User</a></li>
                        <li><a href="<?php echo base_url(); ?>users/admin/create_group">Add Group</a></li>
                        <li><a href="<?php echo base_url(); ?>users/admin/change_password">Change Password</a></li>
                        <?php if (isset($this->session->userdata['username'])){ ?>
                        <li><a href="<?php echo base_url(); ?>users/admin/logout">Logout</a></li>
                        <?php } else { ?>
                        <li><a href="<?php echo base_url(); ?>users/admin/login">Login</a></li>
                        <?php }; ?>
                    </ul>                               
                </li>                
                <li>
                    <a href="#" class="button dblue">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-layout-7"></span>
                        </div>                    
                        <div class="name">Others</div>
                    </a> 
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>apps/payment/index">View Payments</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/level/index">View Levels</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/client/index">Add Payment</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/payment/stats">Payment Stats</a></li>
                        <li><a href="<?php echo base_url(); ?>apps/payment/agents">Agent Payments</li>
                    </ul>                                        
                </li>
                <li>
                    <a href="#" class="button purple">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-box"></span>
                        </div>                    
                        <div class="name">About US</div>
                    </a>                
                    <ul class="sub">
                        <li><a href="<?php echo base_url(); ?>pages/page/faq">FAQ</a></li>
                        <li><a href="<?php echo base_url(); ?>pages/page/about_us">About US</a></li>
                    </ul>                                        
                </li>
                <?php if (isset($this->session->userdata['username'])){ ?>
                <li>
                    <a href="<?php echo base_url(); ?>users/admin/logout" class="button red">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-cloud"></span>
                        </div>                    
                        <div class="name">Logout</div>
                    </a>                
                                                  
                </li>
                <?php } else { ?>
                <li>
                    <a href="<?php echo base_url(); ?>users/admin/login" class="button green">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-cloud"></span>
                        </div>                    
                        <div class="name">Login</div>
                    </a>                
                                                  
                </li>
                <?php }; ?>
				<li> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </li>
                <li align="center">
                    <div class="user">
						<a href="#" class="name"></br>
                            <span><?php if (isset($this->session->userdata['username'])){ echo ucfirst($this->session->userdata['first_name'] . ' ' . $this->session->userdata['last_name']);} else {echo 'Guest';} ?></span>
                            <span class="sm"><?php if (isset($this->session->userdata['username'])){ echo ucfirst($this->session->userdata['company']);}?></span>
                            <span style="text-align=center;"> </br>
                                <!--<div style="line-height:16px;text-align:center;">
                                    <script type="text/javascript" src="http://s2.tracemyip.org/tracker/lgUrl.php?stlVar2=1300&amp;rgtype=4684NR-IPIB&amp;pidnVar2=74848&amp;prtVar2=10&amp;scvVar2=12&amp;gustVarS=2&amp;gustVarU=53421&amp;gustVarM=2"></script>
                                    <div style="line-height:0px;"><a href="http://www.tracemyip.org/"><img src="http://log.tracemyip.org/tracker/script.gif" alt="tracemyip" style="border:0px;"></a></div>
                                    <noscript><img src="http://s2.tracemyip.org/tracker/1300/4684NR-IPIB/74848/10/12/ans/" alt="tracemyip" style="border:0px;"></noscript>
                                </div>-->
                            </span>
                        </a>
                    </div>
                </li> 
				<li> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </li>
            </ul>
            
				<?php echo $output;?>
				<?php // echo $this->load->get_section('sidebar'); ?>
            
                <div class="row-fluid">
                    <br></br>
                    <div class="head dblue">
                        <footer class="footer-distributed">

                            <div class="footer-right">


                            </div>

                            <div class="footer-left">
                                <p>AA Planetica &copy; 2015 all rights resrved</p>
                            </div>

                        </footer>
                    </div>

                </div>

        </div>
        
    </div>
    
    <div class="dialog" id="source" style="display: none;" title="Source"></div>
    
</body>
</html>
