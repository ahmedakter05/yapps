<?php 
foreach($output->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($output->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?><!--
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>           -->
		   
		   <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo lang('edit_user_heading');?> <small><?php echo lang('edit_user_subheading');?></small></h1>
                </div>
                
				
				<div class="row-fluid">
				
					<?php echo "$output->output";?>
					
				</div>

				<div class="row-fluid">
                    <br></br>
                </div>
                
				
                 
				
            </div>
  