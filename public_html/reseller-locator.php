<?php
    require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
    echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '"/>' . PHP_EOL;
?>
    <title><?php echo translate('InFocus | Reseller Locator'); ?></title>
    <script type="text/Javascript" src="/resources/js/OpenLayers.js"></script>
    <script type="text/Javascript" src="/resources/js/AnimatedCluster.js"></script>
    <script src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>

    <link rel="stylesheet" href="/resources/css/infocus.min.css" />
    <link rel="stylesheet" href="/resources/css/resellerlocator.css" />

</head>
<body class="">
    <?php include($homedir . "/resources/html/mainmenu.html"); ?>
    <div class="content">
        <div class="C9">
            <h2 class="title"><?php echo translate("Reseller Locator"); ?></h2>
            <span style="color:rgb(141, 141, 141);"><!--Trans-Marker--><?php echo $pageText["DisplayOnly"]; ?></span>
            <ol id="selectable" >
                <li class="ui-widget-content <?php if(strtolower($_SERVER['QUERY_STRING']) != "mondopad" AND strtolower($_SERVER['QUERY_STRING']) != "bigtouch" AND strtolower($_SERVER['QUERY_STRING']) != "jtouch"){echo "selected";}?>" onclick="SetJSON('Projector');"><?php echo translate("All InFocus Resellers"); ?></li>
                <li class="ui-widget-content <?php if(strtolower($_SERVER['QUERY_STRING']) == "mondopad"){echo "selected";}?>" onclick="SetJSON('Mondopad');"><?php echo translate("Mondopad Authorized Resellers"); ?></li>
            </ol>
            <div style="clear:both;">
                <h5 style="color:rgb(141, 141, 141);font-weight:bold;"><!--Trans-Marker--><?php echo $pageText['Click']; ?></h5>
                <span style="color:rgb(141, 141, 141);padding-bottom:20px;"><!--Trans-Marker--><?php echo $pageText['Doubleclick']; ?>
                <!--Trans-Marker--></span>
                <div class="map">
                    <div id="map1"></div>
                </div>
            </div>

            <div id="results-header" style="border-bottom:1px solid #f1f1f1">
                <div class="C2 Col" id="shopOnline"></div>
                <div class="C8 Col" id="localResults">
                    <?php echo translate("Local Results"); ?>
                </div>
            </div>
            <div id="results">
                <ul id="onlineresults" class="C2 Col" style="vertical-align:top;background-color: #f1f1f1;">
                </ul>
                <table id="results-table" class="C8 Col" >
                    <thead>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer id="site-info" >
        <?php include($homedir . "/resources/html/footer.html"); ?>
    </footer>
    <script type="text/Javascript" src="/resources/js/resellerlocator.js"></script>
    <script>
        <?php

        echo "var onlinetext = '" . translate("Shop InFocus Online") . "';";
        echo "var mapreseller = '" . translate("Map this Reseller") . "';";
        echo "var website = '" . translate("Website") . "';";

        if(strtolower($_SERVER['QUERY_STRING']) == "mondopad" OR strtolower($_SERVER['QUERY_STRING']) == "bigtouch" OR strtolower($_SERVER['QUERY_STRING']) == "jtouch"){echo "vector1.setVisibility(false);";}
        if(strtolower($_SERVER['QUERY_STRING']) != "mondopad"){echo "vector2.setVisibility(false);";}
        if(strtolower($_SERVER['QUERY_STRING']) != "bigtouch" AND strtolower($_SERVER['QUERY_STRING']) != "jtouch"){echo "vector3.setVisibility(false);";}?>

    </script>
</body>
