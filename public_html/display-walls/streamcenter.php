<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | StreamCenter</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/core.css" />
<link rel="stylesheet" href="/resources/css/jupiter_pages.css" />
<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}
?>
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
                    <a href="/display-walls/streamcenter">StreamCenter</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">StreamCenter</h1></div>
                <div>
                    <ul class="action-links Col_child">
                        <li></li>
                        <li><a class='btn form-box' style='display:block' href='/resources/forms/getaquote'>Get a Quote</a></li>
                        <li><a class='btn' href='/reseller-locator'>Find a Reseller</a></li>
                    </ul>
                </div>
            </div>
            <div class="C10 Col_child C6x4_child">
                <div class="image-set" style="float:right;">
                    <img src="/resources/static/images/display-walls/BoM_Jupiter_Meeting_Room_1.jpg">
                </div>
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">The massively expandable solution for HD decoding and display</strong>
                    <div class="mysqledit" id="blurb">
                        <p><strong>Multistream Video Decoder for PixelNet®</strong></p>
                        <p>StreamCenter™ is the most fully featured multistream decoder anywhere. For applications ranging from security monitoring to traffic management to military command and control, and any organization which relies on video streams for situational awareness, Jupiter’s StreamCenter is the answer for high performance decoding of multiple streams.</p>
                        <p>StreamCenter supports both high definition and standard definition IP streams from cameras, encoders, NVRs, and PCs. Using Jupiter scaling and communication technology, large numbers of streamed sources can be displayed at full frame rate, simultaneously, with digital precision.</p>
                    </div>
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
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 1em;">
                              <img src="/resources/static/images/display-walls/Product_StreamCenter.jpg" >
                          </div>
                    			<h5 class="name">StreamCenter™ Is Powerful and Flexible</h5>
                    			<strong class="tagline"></strong>
                          <p>Each StreamCenter chassis can decode up to 32 channels of HD video. For projects with large numbers of sources, multiple StreamCenters can be put to work decoding hundreds or even thousands of streams simultaneously.</p>
                          <p>StreamCenter decodes most major streaming formats, including H.264, MPEG-2, MPEG-4, and MJPEG at resolutions up to 1920x1080.</p>

			                </div>
                    </div>
                </div>
                <div id="details">
                    <div class="C5 alternateDivChildL2" style="float:right;">
                        <div class="image-set cmsedit">
                            <img alt="" class="img-responsive" src="http://www.jupiter.com/system/files/StreamCenter_system_rev.jpg">
                        </div>
                    </div>
                    <div class="C5 alternateDivChildL2" style="float:left;">
                        <div class="info cmsedit">
                            <h5 class="name">Designed for PixelNet®</h5>
                            <strong class="tagline"></strong>
                            <p>StreamCenter supports Jupiter Systems’ PixelNet Distributed Display Wall System. PixelNet is a high bandwidth non-blocking switched network of input and output nodes, adopting Gigabit Ethernet for use with high resolution, real time video</p>
                            <p>PixelNet is all about scalability. A system can be expanded by adding more input nodes or StreamCenters to attach additional sources, or more output nodes to attach additional displays, and connecting them to the PixelNet Switch with common CAT6 cables. PixelNet makes creating complex topologies of inputs, outputs and switches simple, cost effective, and future proof.</p>
                            <p>All of this power and flexibility is managed by Jupiter’s PixelNet Domain Control software, which provides an intuitive, object-oriented, drag-and-drop interface to control and manage multiple inputs, outputs and display walls.</p>
                            <p>StreamCenter matches PixelNet’s scalability with its own. Each StreamCenter chassis connects to switches in the PixelNet domain via 10G ports. Combining PixelNet and StreamCenter allows the creation of very large display walls, or multiple display walls, capable of monitoring thousands of high definition streaming sources.</p>
                        </div>
                      </div>
                      <div style="clear: both; width:100%; display: block;"></div>

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
                                              <a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-StreamCenter-Datasheet-EN.pdf">
                                                  <span class="title">StreamCenter</span><br>
                                                  <span class="description">Multistream Video Decoder for PixelNet</span>
                                              </a>
                                          </td>
                                          <td>
                                              <ul class="langlist">
                                                  <li>
                                                      Choose Language
                                                      <ul>
                                                          <li><a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-StreamCenter-Datasheet-EN.pdf">English</a></li>
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
