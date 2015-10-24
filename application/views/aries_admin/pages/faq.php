<div class="content">
                
    <div class="page-header">
        <div class="icon">
            <span class="ico-question-sign"></span>
        </div>
        <h1>FAQ <small>Welcome to Yapps</small></h1>
    </div>


    <div class="row-fluid">

        <div class="span8">

            <div class="block">
                <div class="head blue">
                    <h2><?php echo (!empty($message) ? $message : 'FAQ'); ?></h2>
                </div>
                <div class="toolbar">
                    <div class="left">
                        <div class="input-append input-prepend">
                            <div class="add-on"><span class="icon-search icon-white"></span></div>
                            <input type="text" name="text" placeholder="Keyword..." id="faqSearchKeyword"/>
                            <button class="btn" id="faqSearch" type="button">Search</button>
                        </div>                            
                    </div>
                    <div class="right tar">
                        <div class="btn-group">
                            <button class="btn tip" id="faqOpenAll" data-original-title="Open all"><span class="icon-chevron-down icon-white"></span></button>
                            <button class="btn tip" id="faqCloseAll" data-original-title="Close all"><span class="icon-chevron-up icon-white"></span></button>
                            <button class="btn tip" id="faqRemoveHighlights" data-original-title="Remove highlights"><span class="icon-remove icon-white"></span></button>
                        </div>
                    </div>                        
                </div>

                <div class="data-fluid faq">
                    <?php $id='1'; foreach ($faqs as $faq): ?>
                    <div class="item" id="<?php echo 'faq-' . $id; $id++; ?>">
                        <div class="title"><?php echo $faq->title; ?></div>
                        <div class="text"><?php echo $faq->content; ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>                    

            </div>

        </div>
        <div class="span4">

            <div class="block">                    
                <div class="head blue">
                    <div class="icon"><span class="ico-star"></span></div>
                    <h2>Frequently asked questions</h2>
                </div>
                <div class="data-fluid">
                    <ul class="list" id="faqListController">
                        <li><a href="#faq-1">YApps how to</a></li>
                        <li><a href="#faq-2">Why Apps</a></li>
                    </ul>                        
                </div>
            </div>

            <div class="block">
                <div class="head">
                    <div class="icon"><span class="ico-arrow-right"></span></div>                                
                    <h2>Contact us</h2>
                </div>
                <div class="data-fluid">
                    <div class="row-form">                            
                        <div class="span12">                                      
                            <select class="select" style="width: 100%;">
                                <option value="0">Choose category...</option>
                                <option value="1">Contact Admin</option>
                                <option value="2">Contact Agent</option>
                                <option value="2">Or something else</option>
                            </select>
                        </div>
                    </div>                        
                    <div class="row-form">
                        <div class="span3">Name / Title:</div>
                        <div class="span9">                                      
                            <input type="text" placeholder="Name">
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span3">Email:</div>
                        <div class="span9">                                    
                            <input type="text" placeholder="Email">
                        </div>
                    </div>                                
                    <div class="row-form">
                        <div class="span12">
                            <textarea name="text"></textarea> 
                        </div>
                    </div>                        
                </div>
                <div class="toolbar">
                    <button class="btn">Send <span class="icon-arrow-next icon-white"></span></button>
                </div>
            </div>

        </div>

    </div>                
 
</div>
