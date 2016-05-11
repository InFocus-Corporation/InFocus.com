<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '"/>' . PHP_EOL;
?>
<script><?php echo "var vLang = '$lang';"; ?></script>
<script type="text/Javascript" src="/resources/js/productfinder.js"></script>
<link rel="stylesheet" href="/resources/css/infocus.min.css" />
<link rel="stylesheet" href="/resources/css/productfinder.css" />

</head>
<body class="">
    <?php include($homedir . "/resources/html/mainmenu.html"); ?>
    <div class="content">
        <div class="C9">
            <h2 class="lead_text--secondary_headline"><?php echo translate('Product Finder'); ?></h2>
            <div class="C5 Col">
                <form name="prodfind" action=""  method="post" class="liresults" >
                    <fieldset>
                        <div class="col" >
                            <label for="Q5" class="top"><?php echo $pageText['InstQ'];?></label>
                            <Select type="text" name="Q5" id="Q5" style="font-size:65%;" onchange="fetchMatches();" >
                                <option value="" selected></option>
                                <option value="Installed"><?php echo $pageText['InstA1'];?></option>
                                <option value="Portable"><?php echo $pageText['InstA2'];?></option>
                                <option value="Mobile"><?php echo $pageText['InstA3'];?></option>
                            </select>
                            <label for="Q1" class="top"><?php echo $pageText['SizeQ'];?></label>
                            <select type="text" name="Q1" id="Q1" style="font-size:65%;" onchange="fetchMatches();">
                                <option value="" selected></option>
                                <option value="screen5"><?php echo $pageText['SizeA1'];?></option>
                                <option value="screen6"><?php echo $pageText['SizeA2'];?></option>
                                <option value="screen7"><?php echo $pageText['SizeA3'];?></option>
                                <option value="screen8"><?php echo $pageText['SizeA4'];?></option>
                                <option value="screen9"><?php echo $pageText['SizeA5'];?></option>
                            </select>
                            <label class="top">
                                <?php echo $pageText['DistQ1'];?>
                                <br>
                                <span style="font-size:x-small">
                                    <?php echo $pageText['DistQ2'];?>
                                </span>
                            </label>
                            <label class="top">
                                <?php echo translate('From'); ?><input type="text" name="Q2" id="Q2" style="width:30px" onkeyup="this.value = this.value.replace(/[^0-9]/gi, '')" onchange="fetchMatches();">
                                <span style="font-size:small">
                                    <?php echo translate('ft'); ?>.
                                </span>
                                <?php echo translate('To'); ?><input type="text" name="Q2a" id="Q2a" style="width:30px;" onkeyup="this.value = this.value.replace(/[^0-9]/gi, '')" onchange="fetchMatches();">
                                <span style="font-size:small">
                                    <?php echo translate('ft'); ?>.
                                </span>
                            </label>
                            <label for="Q3" class="top">
                                <?php echo $pageText['LightQ'];?>
                            </label>
                            <Select type="text" name="Q3" id="Q3" style="font-size:60%;" onchange="fetchMatches();">
                                <option value="" selected></option>
                                <option value="120"><?php echo $pageText['LightA1'];?></option>
                                <option value="90"><?php echo $pageText['LightA2'];?></option>
                                <option value="80"><?php echo $pageText['LightA3'];?></option>
                                <option value="70"><?php echo $pageText['LightA4'];?></option>
                                <option value="60"><?php echo $pageText['LightA5'];?></option>
                                <option value="50"><?php echo $pageText['LightA6'];?></option>
                                <option value="30"><?php echo $pageText['LightA7'];?></option>
                            </select>
                            <div style="display:none"><label for="Q4" class="top"><?php echo $pageText['TypeQ'];?></label>
                                <Select type="text" name="Q4" id="Q4" style=""  onchange="fetchMatches();">
                                    <option value="" selected></option>
                                    <option value="graphical"><?php echo $pageText['TypeA1'];?></option>
                                    <option value="data"><?php echo $pageText['TypeA2'];?></options>
                                </select>
                            </div>
                            <label for="Q6" class="top">
                                <?php echo $pageText['InputQ'];?>
                            </label>
                            <div class="section">
                                <ol id="selectable" name="Q6" style="font-size:75%;" >
                                    <li class="ui-widget-content">VGA</li>
                                    <li class="ui-widget-content">HDMI</li>
                                    <li class="ui-widget-content">USB</li>
                                    <li class="ui-widget-content">Component</li>
                                    <li class="ui-widget-content">Composite</li>
                                </ol>
                            </div>
                            <div class="section" style="clear:both">
                                <label for="Q7" class="top"><?php echo $pageText['AspectQ'];?></label>
                                <br>
                                <ol id="selectable2" name="Q7" >
                                    <li class="ui-widget-content" style="font-size:x-small;text-align:center;" id="4:3"><img src="/resources/images/4x3" height="80px" /><br><?php echo $pageText['AspectA1'];?></li>
                                    <li class="ui-widget-content" style="font-size:x-small;text-align:center;" id="16:9"><img src="/resources/images/16x9" height="80px"/><br><?php echo $pageText['AspectA2'];?></li>
                                    <li class="ui-widget-content" style="font-size:x-small;text-align:center;" id="1080p"><img src="/resources/images/1080p" height="80px"/><br>&nbsp;</li>
                                </ol>
                            </div>
                        </div>
                    </fieldset>
                    <button type="button" style="display:block" id="specfeattoggle" onclick="showAdvanced();"><?php echo $pageText['Expand'];?></button>
                    <fieldset id="specfeat" style="display:none">
                        <div class="section">
                            <label for="Q8" class="top"><?php echo $pageText['OtherQ'];?></label>
                            <ol id="selectable3" name="Q8" style="font-size:75%;display:block;" >
                                <li class="ui-widget-content"><?php echo $pageText['OtherA1'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['OtherA2'];?></li>
                                <li class="ui-widget-content">RS232</li>
                                <li class="ui-widget-content"><?php echo $pageText['OtherA3'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['OtherA4'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['OtherA5'];?></li>
                            </ol>
                        </div>
                        <br>
                        <div style="display:block;clear:both;">
                            <label for="Q9" class="top"><?php echo $pageText['SpecialQ'];?></label>
                            <ol id="selectable4" name="Q9" style="font-size:75%;" >
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA1'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA2'];?></li>
                                <!--<li class="ui-widget-content">24/7 operation</li>-->
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA3'];?></li>
                                <!--<li class="ui-widget-content">Wireless display capability (maybe, see below)</li>-->
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA4'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA5'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA6'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA7'];?></li>
                                <li class="ui-widget-content"><?php echo $pageText['SpecialA8'];?></li>
                            </ol>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div id="results" class="C5 Col">
                <br>
                <?php echo $pageText['Message'];?>
            </div>
        </div>
    </div>
    <div id="loading_spinner">
        LOADING
    </div>
    <footer id="site-info" >
    <?php include($homedir . "/resources/html/footer.html"); ?>
    </footer>
</body>
</html>
