<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | VizionPlus II</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/core.css" />

<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}
?>
<style>
div.info { float: left; }
div.image-set { float: right; }
div.image-set img { width: 100%; }
div.info .tagline {
    font-family: 'GoodPro';
    font-weight: bold;
}
div.info span {
    font-size: 1.3rem;
}
div.info #blurb {
    font-size: 1rem;
}
#downloads .rounded {
    margin:auto;
    max-width:960px;
}
#downloads h2 {
    margin-top:40px;
    text-align:center;
}
#downloads .HeaderRow th:nth-child(1) { width: 45px; }
#downloads .HeaderRow th:nth-child(3) { width: 160px; }
#downloads table tbody tr td img {
    width: 45px;
}
</style>
<script>
    $(function () {
        // Datasheet Download Languages
        $( "ul.langlist" ).menu();

        // Google Analytics
        $('#downloads a[data-event]').click(function (e) {
            ga('send','event','Link','click', $(this).data('event'));
        });
    });
</script>
</head>
<body>
    <?php include($homedir . "/resources/html/mainmenu.html"); ?>

    <div class="content">
        <div id="family" class="C9">
            <div class="breadcrumb">
                <ol itemscope itemtype="https://schema.org/BreadcrumbList">
                    <a href="/">Home</a> &gt;
                    <a href="/display-walls/">Display Walls</a> &gt;
                    <a href="/display-walls/vizionplus-ii">VizionPlus II</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">VizionPlus II</h1></div>
                <div>
                    <ul class="action-links Col_child">
                        <li></li>
                        <li><a class='btn form-box' style='display:block' href='/resources/forms/getaquote'>Get a Quote</a></li>
                        <li><a class='btn' href='/reseller-locator'>Find a Reseller</a></li>
                    </ul>
                </div>
            </div>
            <div class="C10 Col_child C6x4_child">
                <div class="info">
                    <strong class="tagline mysqledit" id="header"></strong>
                    <span></span>
                    <div class="mysqledit" id="blurb">
                    </div>
                </div>
                <div class="image-set">
                    <img src="/resources/static/images/display-walls/169263611.jpg">
                </div>
            </div>
            <div class="tabs">
                <nav role="navigation" class="C10 transformer-tabs tabs-wrapper">
                    <ul>
                        <li><a href="#overview" class="active">Overview</a></li>
                        <li><a href="#details">Details</a></li>
                        <li><a href="#downloads">Downloads</a></li>
                    </ul>
                </nav>
                <div id="overview" class="active">
                    <div class="C10 alternateDivChildL2">
                        <div>
                            <div class="image-set cmsedit">
                                <img src="/resources/static/images/display-walls/Product_VizionPlus.jpg" >
                            </div>
                            <div class="info cmsedit">
                                overview
                            </div>
                        </div>
                    </div>
                </div>
                <div id="details">
                    <div class="C10 alternateDivChildL2">
                        <div>
                            <div class="image-set cmsedit">
                                <img src="/resources/static/images/display-walls/Product_VizionPlus.jpg" >
                            </div>
                            <div class="info cmsedit">
                                details
                            </div>
                        </div>
                    </div>
                </div>
                <div id="downloads">
                    <h2>Datasheets</h2>
                    <div class="rounded">
                        <table>
                            <thead>
                                <tr class="HeaderRow">
                                    <th>Type</th>
                                    <th>File name &amp; Description</th>
                                    <th>Language</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="site-info" >
        <?php include($_SERVER['DOCUMENT_ROOT']. "/resources/html/footer.html"); ?>
    </footer>
</body>
</html>