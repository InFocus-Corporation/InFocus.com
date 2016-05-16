<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | PixelNet</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/core.css" />

<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}
?>
<style>
div.image-set {
    float: right;
    width: 45%;
}
div.image-set img { width: 100%; }
div.info {
    width: 45%;
}
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
#details_photos {
    float: right;
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
                    <a href="/display-walls/pixelnet">PixelNet</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">PixelNet</h1></div>
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
                    <strong class="tagline mysqledit" id="header">A better way to get visual information where you need it.</strong>
                    <span>PixelNet adopts Gigabit Ethernet technology to create a network of input and output nodes to drive high resolution, real time video walls.</span>
                    <div class="mysqledit" id="blurb">
                        <p>A broad variety of PixelNet input nodes can be matched to almost any video source, while PixelNet output nodes connect to displays. Connected via CAT-6 cables, input and output nodes can be located as far as 100 meters from the switch. Using packet-switching technology, any information source can be shown on any display, such as a window on a single display, or as a window spanning multiple displays in a display wall.</p>

                        <p>PixelNet makes creating complex topologies of inputs, outputs and switches simple, cost effective, and future proof. Massively scalable, the same component parts can scale from a single input distributed to a single output to hundreds of inputs and outputs. PixelNet input nodes are small, silent and use very little power. PixelNet Domain Control software provides an intuitive, object-oriented, drag-and-drop interface to control and manage multiple inputs, outputs and display walls.</p>
                    </div>
                </div>
                <div class="image-set">
                    <img src="/resources/static/images/display-walls/pixelnet_hero-1.jpg">
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
                                <img src="/resources/static/images/display-walls/Product_PixelNet_AnalogHD.jpg" >
                            </div>
                            <div class="info cmsedit">
                                <strong class="tagline mysqledit">
                                    Flexible, Scable, Powerful.
                                </strong>
                                <div class="mysqledit">
                                    <p>PixelNet is all about scalability. The same component parts can scale from a single input distributed to a single output to a configuration with hundreds of inputs and outputs. The networked system can support multiple display walls. Need to add another input? Add another PixelNet input node. Want to add more streaming IP sources? Add another StreamCenter. Expanding the display wall? Add PixelNet output nodes for the new displays.</p>
                                </div>
                                <hr>
                                <strong class="tagline mysqledit">
                                    A PixelNet Network
                                </strong>
                                <div class="mysqledit">
                                    <img src="/resources/static/images/display-walls/PixelNet_System_rev.jpg">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="details">
                    <div class="C10 alternateDivChildL2">
                        <div>
                            <div class="image-set cmsedit" id="details_photos">
                                <img src="/resources/static/images/display-walls/Product_PixelNet_AnalogHD.jpg" >
                            </div>
                            <div class="info cmsedit">
                                <p>PixelNet makes creating complex topologies of inputs, outputs and switches simple, cost effective, and future proof. Massively scalable, the same component parts can scale from a single input distributed to a single output to hundreds of inputs and outputs. PixelNet input nodes are small, silent and use very little power. PixelNet Domain Control software provides an intuitive, object-oriented, drag-and-drop interface to control and manage multiple inputs, outputs and display walls.</p>
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
