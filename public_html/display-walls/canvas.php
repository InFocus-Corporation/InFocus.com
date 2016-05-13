<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Canvas</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/core.css" />

<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}
?>
<style>
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
                    <a href="/display-walls/canvas">Canvas</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Canvas</h1></div>
                <div>
                    <ul class="action-links Col_child">
                        <li></li>
                        <li><a class='btn form-box' style='display:block' href='/resources/forms/getaquote'>Get a Quote</a></li>
                        <li><a class='btn' href='/reseller-locator'>Find a Reseller</a></li>
                    </ul>
                </div>
            </div>
            <div class="C10 Col_child C6x4_child">
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">The world's most powerful collaborative visualization tool.</strong>
                    <span>No matter what needs attention or who sees it first, any situation captured in a stream can be shared quickly and easily with team members, regardless of their location.</span>
                    <div class="mysqledit" id="blurb">
                        <p>
                            Sharing a common operating picture is essential to effective management. Canvas enables video, data, applications, and more to be shared with colleagues anywhere, on any device, delivering end-to-end collaboration. Live H.264 video streams, VNC viewer windows, active web browser windows, and desktop presentation screens.
                        </p>
                        <p>
                            Users can share streams and collaborate from anywhere in the network: at the main display wall, on PCs, and on iOS and Android smartphones and tablets. Canvas brings a rich set of familiar tools for collaboration and allows them to be used in ways that no other system can. And, unique in the industry, Canvas allows users to annotate directly on live video streams. Create shared whiteboards for brainstorming.
                        </p>
                        <p>
                            With Canvas, smartphones and tablets can also be sources. Point the mobile device camera at anything and share live video with remote colleagues. View the scene in front of you as well as an overlay of information from experts at other sites.
                        </p>
                    </div>
                </div>
                <div class="image-set" style="float:right;">
                    <img src="/resources/static/images/display-walls/160775957.jpg">
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
                                <img src="/resources/static/images/display-walls/canvas.jpg" >
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
                                <img src="/resources/static/images/display-walls/canvas.jpg" >
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
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-Canvas-Datasheet" href="/resources/static/documents/canvas/LR_4pCanvas brochure_030116.pdf">
                                            <span class="title">Canvas Brochure</span><br>
                                            <span class="description">Benefits and specifications for Canvas</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="/resources/static/documents/canvas/LR_4pCanvas brochure_030116.pdf">English</a></li>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="/resources/static/documents/canvas/SPA JUP_Canvas_Brochure_150126.pdf">Español</a></li>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="/resources/static/documents/canvas/Arabic Canvas brochure 2014.pdf">العربية</a></li>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="/resources/static/documents/canvas/JUP_Canvas_Brochure_150126_ru-RU.pdf">русский</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-Canvas-Customer-Sample" href="/resources/static/documents/canvas/Canvas Customers, A Sample List - 7 Apr 2015.pdf">
                                            <span class="title">Canvas Customers</span><br>
                                            <span class="description">Canvas Customers Sample List</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Jupiter-Canvas-Customer-Sample" href="/resources/static/documents/canvas/Canvas Customers, A Sample List - 7 Apr 2015.pdf">English</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
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