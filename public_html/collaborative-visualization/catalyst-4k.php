<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Jupiter Catalyst 4K</title>
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
                    <a href="/collaborative-visualization/">Collaborative Visualization</a> &gt;
                    <a href="/collaborative-visualization/catalyst-4k">Jupiter Catalyst 4K</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C6x4_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Jupiter Catalyst 4K</h1></div>
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
                    <img src="/resources/static/images/display-walls/InFocus-Jupiter-Catalyst-4K-Video-Wall-Room.jpg">
                </div>
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">4K Display Wall Processor with Canvas 5.0</strong>
                    <div class="mysqledit" id="blurb">
                        <p>Create the world’s highest resolution video wall with 4K resolution on every display.</p>
                        <p>Get razor-sharp 4K resolution on every display in your video wall with the new, highly evolved Catalyst 4K processor. Faster graphics, real time frame rates, and better overall system performance than anything in its class is delivered thanks to its Intel E5 Six-Core Xeon CPU-based platform with a PCI Express 3.0 chassis and 6 powerful, high speed slots. </p>
                        <p>Drag and drop video and data windows anywhere on the display wall, juxtapose sources in order to get a full 360-degree view of operations, and save and recall layouts appropriate for specific situations, users, or time of day.</p>
                        <p>Catalyst 4K ships with <a href="/collaborative-visualization/canvas">Canvas 5.0</a>, the latest version of our award-winning collaborative visualization suite.</p>
                        <p></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="tabs">
                <nav role="navigation" class="C10 transformer-tabs tabs-wrapper">
                    <ul>
                        <li><a href="#overview" class="active">Overview</a></li>
                        <li><a href="#specifications">Specifications</a></li>
                        <li><a href="#downloads">Downloads</a></li>
                    </ul>
                </nav>
                <div id="overview" class="active">
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <iframe style="position:relative;z-index:100;float:right;display:block;margin:1em;max-width:100%;" width="420" height="315" src="https://www.youtube.com/embed/pUQ76I5mYTQ?rel=0" frameborder="0" allowfullscreen></iframe>
                          <h5 class="name">4K Input and Output Support</h5>
                          <strong class="tagline"></strong>
                          <p>Capable of decoding up to 28 non-HDCP 4K signals, Catalyst 4K supports input signals with a 4K DVI input card that leverages a DVI-D single-link connector. Catalyst 4K supports up to 12 non-HDCP 4K outputs on a single CPU chassis. Each 4K display has a resolution of 3840 x 2160 pixels per output and four destination windows per card through a mini DisplayPort interface. Add up to four Expansion Chassis to gain even more inputs.</p>
                          <div style="clear: both; display: block;"></div>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Built for Canvas</h5>
                          <strong class="tagline"></strong>
                          <p>The Catalyst 4K display wall processor ships with <a href="/collaborative-visualization/canvas">Canvas 5.0</a>, providing access to all of the visual business intelligence made available in the user’s network—including live streams from network cameras and mobile devices, application screens from PCs, and real-time data feeds.</p>
                          <p>Users at the display wall can collaborate with distant colleagues on their PCs, smartphones, tablets, and in conference rooms equipped with Canvas Touch or CRS-4K endpoints.</p>
                          <p>With Canvas, users can annotate directly on live video streams, chat by text or voice, integrate with Microsoft Lync, and collaborate on documents in real time. Canvas 5.0 adds software decoding of IP video streams (including 4K), as well as support for user authentication in Active Directory or Workgroup environments.</p>
                          <hr/>
                      </div>
                        <div class="info cmsedit">
                          <iframe style="position:relative;z-index:100;float:right;display:block;margin:1em;max-width:100%;" width="560" height="315" src="https://www.youtube.com/embed/rotyK8OgFP0?rel=0" frameborder="0" allowfullscreen></iframe>
                          <h5 class="name">Native 4K Decoding</h5>
                          <strong class="tagline"></strong>
                          <p>Catalyst 4K offers CPU-based decoding on both H.264 and H.265 HD and 4K sources.</p>
                          <p>Catalyst 4K supports decoding up to:</p>
                          <ul class="feature-list">
                            <li>Eight HD streams or two 4K streams from H.264 sources</li>
                            <li>Eight HD streams with low bitrate from H.265 sources</li>
                            <li>8-bit 4K streams from H.265 sources</li>
                          </ul>
                          <div style="clear: both; display: block;"></div>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Catalyst 4K in Action</h5>
                          <strong class="tagline"></strong>
                          <p>The Catalyst 4K processor is the ideal solution for projects of any size. Each 3RU rack-mountable CPU Chassis has 6 PCI Express 3.0 slots while each of up to 4 expansion chassis has 7 PCI Express 2.0 slots, enabling very large configurations.</p>
                          <p>Catalyst 4K supports up to 12 4K displays, which can showcase up to 48 HD sources. With optional Quad HD Decoder Cards, Catalyst 4K can support up to 112 HD inputs in one CPU Chassis plus four Expansion Chassis.</p>
                          <p>The Catalyst 4K processor is also valuable when users want to present content to an in-room audience outside of a Canvas session. With optional Dual-Link DVI Input Cards, up to 56 inputs without HDCP are supported for display on the local display wall only. Inputs via the DVI connection are not shareable in Canvas.</p>

                      </div>
                    </div>
                </div>

                <div id="specifications">
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; margin-right: 0; max-width: 260px;">
                              <img src="/resources/static/images/display-walls/InFocus-Jupiter-Catalyst-4K-Back.jpg" >
                          </div>

                        <strong class="tagline mysqledit">System Architecture Chassis</strong>
                        <p>
                            PCI Express 3.0 Chassis with 6 high speed slots for input, output, or auxiliary cards<br>
                            <strong>CPU Board Processor:</strong> Intel E5 Six Core Xeon CPU<br>
                            <strong>CPU Board System Memory:</strong> 32GB RAM per CPU standard, up to 128GB RAM optional<br>
                            <strong>Drives:</strong> 512GB solid state drives, optional 2nd and 3rd drives, RAID1 array with hot spare<br>
                            <strong>Optical Storage:</strong> DVD-RW/CD-RW<br>
                            <strong>Network Interface (Ethernet):</strong> Standard dual 100/1000 Mbps RJ45 ports<br>
                            <strong>Input Devices (USB):</strong> 104-key keyboard and mouse
                        </p>
                        <br>

                        <strong class="tagline mysqledit">Expansion Chassis (Optional)</strong>
                        <p>
                            Catalyst 4K Expansion Chassis: PCI Express 2.0 Chassis with 7 slots for input or output cards
                        </p>
                        <br>

                        <strong class="tagline mysqledit">Quad HD Decoder Input Card (Optional)</strong>
                        <p>
                            Up to 112 inputs in 1 CPU Chassis + 4 Expansion Chassis<br>
                            Supports real-time decoding of HD or SD streams<br>
                            Supports most popular IP cameras and encoders
                        </p>
                        <br>

                        <strong class="tagline mysqledit">Dual-Link DVI Input Card without HDCP Support for Local Display Only (Optional)</strong>
                        <p>
                            <strong>Inputs:</strong> Up to 56 inputs in 1 CPU Chassis + 4 Expansion Chassis<br>
                            <strong>Format:</strong> Dual-Link DVI-D up to 2560x1600, Single-Link DVI-D up to 2048x1200<br>
                            <strong>Pixel Rate:</strong> Digital: Up to 270 MHz<br>
                            <strong>Pixel Format:</strong> 32 bits per pixel<br>
                            <strong>Windows:</strong> 4 destination windows per card
                        </p>
                        <br>

                        <strong class="tagline mysqledit">Catalyst 4K Output Graphics Card</strong>
                        <p>
                            CPU Chassis + 4 Expansion Chassis<br>
                            <strong>Outputs:</strong> Up to 12 non-HDCP outputs with Canvas collaborative visualization software in 1<br>
                            <strong>Resolution: Digital:</strong>  3840 x 2160 pixels per output<br>
                            <strong>Color Depth:</strong> 32 bits per pixel<br>
                            <strong>Output Signal:</strong> mini DisplayPort
                        </p>
                        <br>

                        <strong class="tagline mysqledit">Catalyst 4K Input Capture Card</strong>
                        <p>
                            Chassis + 4 Expansion Chassis<br>
                            <strong>Inputs:</strong>  Up to 28 non-HDCP inputs with Canvas collaborative visualization software in 1 CPU<br>
                            <strong>Resolution:</strong> Digital:  3840 x 2160 pixels per output<br>
                            <strong>Color Depth:</strong> 32 bits per pixel<br>
                            <strong>Input Signal:</strong> DVI-D single-link connector
                        </p>

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
                                        <a data-event="Jupiter-Catalyst-4K-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Catalyst-4K-Datasheet-EN.pdf">
                                            <span class="title">Catalyst 4K</span><br>
                                            <span class="description">4K Display Wall Processor with Canvas 5.0</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Jupiter-Canvas-CRS-4K-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Catalyst-4K-Datasheet-EN.pdf">English</a></li>
                                                    <li><a data-event="Jupiter-Canvas-CRS-4K-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Catalyst-4K-Datasheet-EU.pdf">Intl English</a></li>
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
