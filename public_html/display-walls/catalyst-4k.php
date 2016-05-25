<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Canvas CRS-4K</title>
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
                    <a href="/display-walls/catalyst-4k">Catalyst 4K</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Catalyst 4K</h1></div>
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
                    <img src="/resources/static/images/display-walls/video-wall.jpg">
                </div>
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">4K Display Wall Processor with Canvas 5.0</strong>
                    <div class="mysqledit" id="blurb">
                        <p>Create the world’s highest resolution video wall with 4K resolution on every display.</p>
                        <p>Get razor-sharp 4K resolution on every display in your video wall with the new, highly evolved Catalyst 4K processor. Faster graphics, real time frame rates, and better overall system performance than anything in its class is delivered thanks to its Intel E5 Six-Core Xeon CPU-based platform with a PCI Express 3.0 chassis and 6 powerful, high speed slots. </p>
                        <p>Drag and drop video and data windows anywhere on the display wall, juxtapose sources in order to get a full 360-degree view of operations, and save and recall layouts appropriate for specific situations, users, or time of day.</p>
                        <p>Catalyst 4K ships with <a href="/display-walls/canvas">Canvas 5.0</a>, the latest version of our award-winning collaborative visualization suite.</p>
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
                          <div class="image-set cmsedit" style="float: right; padding: 1em;">
                              <img src="/resources/static/images/display-walls/InFocus-Jupiter-Catalyst-4K-Hero.jpg" >
                          </div>
                          <h5 class="name">4K Input and Output Support</h5>
                          <strong class="tagline"></strong>
                          <p>Capable of decoding up to 28 non-HDCP 4K signals, Catalyst 4K supports input signals with a 4K DVI input card that leverages a DVI-D single-link connector. Catalyst 4K supports up to 12 non-HDCP 4K outputs on a single CPU chassis. Each 4K display has a resolution of 3840 x 2160 pixels per output and four destination windows per card through a mini DisplayPort interface. Add up to four Expansion Chassis to gain even more inputs.</p>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Built for Canvas</h5>
                          <strong class="tagline"></strong>
                          <p>The Catalyst 4K display wall processor ships with <a href="/display-walls/canvas">Canvas 5.0</a>, providing access to all of the visual business intelligence made available in the user’s network—including live streams from network cameras and mobile devices, application screens from PCs, and real-time data feeds.</p>
                          <p>Users at the display wall can collaborate with distant colleagues on their PCs, smartphones, tablets, and in conference rooms equipped with Canvas Touch or CRS-4K endpoints.</p>
                          <p>With Canvas, users can annotate directly on live video streams, chat by text or voice, integrate with Microsoft Lync, and collaborate on documents in real time. Canvas 5.0 adds software decoding of IP video streams (including 4K), as well as support for user authentication in Active Directory or Workgroup environments.</p>
                          <hr/>
                      </div>
                        <div class="info cmsedit">
                          <h5 class="name">Native 4K Decoding</h5>
                          <strong class="tagline"></strong>
                          <p>Catalyst 4K offers CPU-based decoding on both H.264 and H.265 HD and 4K sources.</p>
                          <p>Catalyst 4K supports decoding up to:</p>
                          <ul class="feature-list" style="padding-bottom:50px; width:38%;">
                            <li>Eight HD streams or two 4K streams from H.264 sources</li>
                            <li>Eight HD streams with low bitrate from H.265 sources</li>
                            <li>8-bit 4K streams from H.265 sources</li>
                          </ul>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Catalyst 4K in Action</h5>
                          <strong class="tagline"></strong>
                          <p>The Catalyst 4K processor is the ideal solution for projects of any size. Each 3RU rack-mountable CPU Chassis has 6 PCI Express 3.0 slots while each of up to 4 expansion chassis has 7 PCI Express 2.0 slots, enabling very large configurations.</p>
                          <p>Catalyst 4K supports up to 12 4K displays, which can showcase up to 48 HD sources. With optional Quad HD Decoder Cards, Catalyst 4K can support up to 112 HD inputs in one CPU Chassis plus four Expansion Chassis.</p>
                          <p>The Catalyst 4K processor is also valuable when users want to present content to an in-room audience outside of a Canvas session. With optional Dual-Link DVI Input Cards, up to 56 inputs without HDCP are supported for display on the local display wall only. Inputs via the DVI connection are not shareable in Canvas.</p>
                          <hr/>
                      </div>
                    </div>
                </div>
                <div id="specifications">
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 1em; width: 50%;">
                              <img src="/resources/static/images/display-walls/InFocus-Jupiter-Catalyst-4K-Back.jpg" >
                          </div>
                        <h5 class="name">SYSTEM ARCHITECTURE CHASSIS</h5>
                        <p><strong>Features</strong></p>
                        <p>
                        Form Factor: Mini-ITX desktop<br>
                        CPU: Intel i7 4770S (65w)<br>
                        System Memory: 16GB RAM<br>
                        Storage: 128GB solid state drive<br>
                        Operating System: Windows 7 Ultimate
                        </p>
                        <p><strong>Network Interface</strong></p>
                        <p>Ethernet: Two Gigabit LAN RJ45 ports</p>
                        <p><strong>Input Devices</strong></p>
                        <p>
                            Tablet Interface: Multitouch web-based tablet GUI for video preview and controlling size and position of canvases on displays<br>
                            Keyboard & Mouse: 104-key USB keyboard and USB mouse
                        </p>
                        <hr>
                    </div>
                    <div class="info cmsedit">
                        <h5 class="name">SUPPORTED SOURCES</h5>
                        <p><strong>Accessed Via LAN</strong></p>
                        <p>H.264 Video Streams: Up to 8 simultaneous streams</p>
                        <p>VNC Screen Graphics: Up to 8 simultaneous VNC viewer windows</p>
                        <p>Web Windows: Up to 8 simultaneous web browser windows</p>
                        <p>Desktop Presentation Screens: Up to 2 simultaneous SimpleShare™ windows</p>
                        <hr>
                    </div>
                    <div class="info cmsedit">
                        <h5 class="name">GRAPHICS OUTPUTS</h5>
                        <p><strong>Mini DisplayPort Digital Interface</strong></p>
                        <p>Graphics Card: PCI Express 3.0 16-lane graphics card with 2GB GDDR5 GPU memory (72 GB/s)</p>
                        <p>Outputs: 4 Mini DisplayPort connectors supporting DisplayPort version 1.2</p>
                        <p>Resolution: Supports up to four HD displays at 1920x1080 pixels each -OR- one Ultra HD 4K display at 4096x2160 pixels</p>
                        <p>Color Depth: 30-bit, producing more than 1 billion colors</p>
                        <hr>
                        <h5 class="name">AUDIO</h5>
                        <p><strong>Front Panel I/O</strong></p>
                        <p>MIC In: 3.5mm connector, supports AC’97 and HD Audio</p>
                        <p>Line Out: 3.5mm connector, supports AC’97 and HD Audio</p>
                        <hr>
                    </div>
                    <div class="info cmsedit">
                        <h5 class="name">OTHER</h5>
                        <p><strong>Chassis</strong></p>
                        <p>Dimensions: 3.8” H x 8.7” W x 13.4” D (96 mm x 222 mm x 328 mm)</p>
                        <p>Weight: 10 lbs. (4.6 kg.)</p>
                        <p>Shipping dimensions: 8.7” H x 11” W x 19.5” D (220 mm x 280 mm x 425 mm)</p>
                        <p>Shipping weight: 15 lbs. (6.8 kg.)</p>
                        <p><strong>Operating Range</strong></p>
                        <p>Temperature Range, Operating: 32°F – 104°F (0°C – 40°C)</p>
                        <p>Temperature Range, Non-operating: 14°F – 150°F (-10°C – 66°C)</p>
                        <p>Humidity Range: 10-90% non-condensing</p>
                        <p>Altitude Range: Up to 10,000 feet (3,048.0 m)</p>
                        <p><strong>Electrical</strong></p>
                        <p>Power supply: Single 150 watt</p>
                        <p>Input voltage: 100-240 VAC</p>
                        <p>Line frequency: 50-60 Hz</p>
                        <p>Power consumption: 150 Watts nominal</p>
                        <p><strong>Operational Acoustics</strong></p>
                        <p>Noise Level: 30 dbA</p>
                        <p><strong>Regulatory</strong></p>
                        <p>United States: UL 60950 listed, FCC Class A</p>
                        <p>Canada: cUL CSA C22.2, No. 60950</p>
                        <p>International: CE Mark, CB Certificate, EAC, CCC, C-Tick, VCCI</p>
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
                                        <a data-event="Jupiter-Canvas-CRS-4K-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-CRS-4K-Datasheet-EN.pdf">
                                            <span class="title">Canvas CRS-4K</span><br>
                                            <span class="description">Conference Room System</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Jupiter-Canvas-CRS-4K-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-CRS-4K-Datasheet-EN.pdf">English</a></li>
                                                    <li><a data-event="Jupiter-Canvas-CRS-4K-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-CRS-4K-Datasheet-ES.pdf">Español</a></li>
                                                    <li><a data-event="Jupiter-Canvas-CRS-4K-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-CRS-4K-Datasheet-RU.pdf">русский</a></li>
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
