<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Fusion Catalyst</title>
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
                    <a href="/display-walls/fusion-catalyst">Fusion Catalyst</a> &gt;
                    <a href="/display-walls/fusion-catalyst-quad-hd-decoder-card">Quad HD Decoder Card</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C6x4_child">
                <div>
                  <h1 class="mysqledit h2" id="pagetitle">Quad HD Decoder Card<br/> for Fusion Catalyst</h1>
                </div>
                <div>
                    <ul class="action-links Col_child">
                        <li></li>
                        <li><a class='btn form-box' style='display:block' href='/resources/forms/getaquote'>Get a Quote</a></li>
                        <li><a class='btn' href='/reseller-locator'>Find a Reseller</a></li>
                    </ul>
                </div>
            </div>

            <div class="C10 alternateDivChildL2">
              <div class="info cmsedit">
                  <div class="image-set cmsedit" style="float: right; padding: 1em; max-width: 450px;">
                      <img src="/resources/static/images/display-walls/Product_QhadHDDecoderCard.jpg">
                  </div>
                  <h5 class="name"></h5>
                  <strong class="tagline">HD and SD Streams, Multiple Formats</strong>
                  <p>The Quad HD Decoder Card™ from Jupiter Systems provides support for the display of both high definition and standard definition IP video streams in MPEG-2, MPEG-4, H.264, and MJPEG formats. Streams from cameras, encoders, NVRs, and PCs are all supported.</p>
                  <p>Using Jupiter scaling and communication technology, large numbers of streamed sources can be displayed at full frame rate, simultaneously, with digital precision throughout.</p>
                  <p>The Quad HD Decoder Card supports most popular IP cameras and encoders. All display wall processors in the Fusion Catalyst™ product line are supported.</p>
                  <p>Fusion Catalyst systems can be configured with Quad HD Decoder Cards to support well over one hundred simultaneous streams.</p>
              </div>
            </div>
            <div class="tabs">
                <nav role="navigation" class="C10 transformer-tabs tabs-wrapper">
                    <ul>
                        <li><a href="#overview" class="active">Overview</a></li>
                        <li><a href="#downloads">Downloads</a></li>
                    </ul>
                </nav>
                <div id="overview" class="active">
                    <div class="C6" style="float: left;">
                      <div class="info cmsedit">
                          <h5 class="name"></h5>
                          <strong class="tagline">Leading Technology, Maximum Flexibility</strong>
                          <p>The Quad HD Decoder Card™ is the fourth generation of streaming video decoding products from Jupiter Systems. The card installs directly into both Fusion Catalyst and VizionPlus II display wall processors, offering Second Generation PCI Express performance and tight integration with Jupiter’s industry-leading ControlPoint software.</p>
                          <p>The Quad HD Decoder Card features four independent decoders, each of which can handle streams from a variety of formats and source types. Supporting streams in MPEG-2, MPEG-4, H.264 and MJPEG, the Quad HD Decoder card can decode and display streams from IP cameras, NVRs, desktop encoders, and video management systems. Supported source resolutions range from NTSC and PAL to full high definition 1080p.</p>
                          <p>Each decoder has its own Gigabit Ethernet network connection, ensuring sufficient bandwidth to each decoder to handle any stream bandwidth up to 20 Mbps with ease. Each decoder supports all stream formats and protocols, adapting automatically to specific stream types.</p>
                          <hr/>
                          <h5 class="name"></h5>
                          <strong class="tagline">Power and Simplicity</strong>
                          <p>Setting up streams is simple and intuitive with Jupiter’s ControlPoint drag-and-drop graphical user interface.</p>
                          <p>Quad HD Decoder windows can be scaled from postage stamp size to the size of the full wall, while maintaining true, real time update rates and perfect visual performance. Stream and decoder management software, a component of the ControlPoint software suite, ensures that in the event of a decoder or network failure, routing of streams to available resources is done quickly and automatically.</p>
                          <hr/>
                      </div>
                    </div>
                    <div style="display: block; clear: both; width: 100%;"></div>
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
                                          <a data-event="Fusion-Catalyst-Quad-HD" href="/resources/static/documents/fusion-catalyst/Quad HD Decoder card (rev 201-110).pdf">
                                              <span class="title">Quad HD Decoder Card</span><br>
                                              <span class="description">Datasheet</span>
                                          </a>
                                      </td>
                                      <td>
                                          <ul class="langlist">
                                              <li>
                                                  Choose Language
                                                  <ul>
                                                      <li><a data-event="Fusion-Catalyst-Quad-HD" href="/resources/static/documents/fusion-catalyst/Quad HD Decoder card (rev 201-110).pdf">English</a></li>
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
