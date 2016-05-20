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
                    <a href="/display-walls/fusion-catalyst-4000">Fusion Catalyst 4000</a>

                </ol>
            </div>
            <div class="productheader C10 Col_child C6x4_child">
                <div>
                  <h1 class="mysqledit h2" id="pagetitle">Fusion Catalyst™ 4000</h1>
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
                      <img src="/resources/static/images/display-walls/Product_FusionCatalyst4000_0.jpg" >
                  </div>
                  <h5 class="name"></h5>
                  <strong class="tagline">The Fusion Catalyst™ 4000 is the center of the Fusion Catalyst product line, perfect for most display wall projects.</strong>
                  <p>Abundant Capacity and Support for Any Source – At a full 48 slots, with two optional Expansion Chassis, the Fusion Catalyst 4000 can support up to 96 outputs at 2560x1600 pixels at 32 bits. Each Dual DVI-I Output Card has 256MB of onboard graphics memory for flawless image quality.</p>
                  <p>With optional Dual-Link DVI-I Input Cards, Fusion Catalyst 4000 can support up to 94 DVI, progressive scan component HD, or analog RGB inputs. Up to 376 video inputs can be accommodated using optional Octal SD Video Input Cards.</p>
                  <p>With optional Quad HD Decoder Cards, Fusion Cata­lyst 4000 can support up to 120 HD or SD streams in MPEG-2, MPEG-4, MJPEG, and H.264 formats. Most popular IP cameras and encoders are supported, as are desktop PC streams with real-time updates.</p>
                  <p>Optional CatalystLink™ cards support PixelNet® HD-SDI and DVI Input Nodes with remote KM capability.</p>
              </div>
            </div>
            <div class="tabs">
                <nav role="navigation" class="C10 transformer-tabs tabs-wrapper">
                    <ul>
                        <li><a href="#overview" class="active">Overview</a></li>
                        <li><a href="#specs">Specifications</a></li>
                        <li><a href="#downloads">Downloads</a></li>
                    </ul>
                </nav>
                <div id="overview" class="active">
                    <div class="C6" style="float: left;">
                      <div class="info cmsedit">
                          <h5 class="name"></h5>
                          <strong class="tagline">It's a PC, Too.</strong>
                          <p>Remember to bring your applications, because Fusion Catalyst 4000 is not just a display wall processor, it’s also a PC with Dual Quad Core Xeons, Windows 7, and multiple hard disk drives. Run mission-critical apps such as SCADA, access data through the network, engage the information, and collaborate on a wall-sized desktop.</p>
                          <hr/>
                          <h5 class="name"></h5>
                          <strong class="tagline">Supports Canvas Collaborative Visualization</strong>
                          <p>The Fusion Catalyst 4000 can be part of any Canvas system, delivering shared video and interaction with remote users on the display wall. With Canvas Client and Quad HD Cards installed, this powerful display wall processor brings all the same Canvas tools and features available to PC, smartphone and tablet users to the big screen.</p>
                          <hr/>
                          <h5 class="name"></h5>
                          <strong class="tagline">Safeguard Operations with ControlPoint Security™</strong>
                          <p>Fusion Catalyst™ processors ship with ControlPoint Security™, airtight security tools indigenous to Jupiter’s ControlPoint™ wall management software suite. ControlPoint Security features LDAP integration, pro­viding secure login with the standard user name and password controlled by the customer’s IT department.</p>
                          <p>With security defined at the object level, managers can create discrete management and access permissions for wall segments, layouts, inputs, applications, and remote cursor control. User activity and event logging are performed at sub-second resolution, allowing thorough forensic analysis.</p>
                          <a href="/resources/documents/InFocus-Jupiter-ControlPoint-with-ControlPoint-Security-Datasheet-EN.pdf">Download ControlPoint with ControlPoint Security Data Sheet</a>
                          <hr/>
                      </div>
                    </div>
                    <div style="display: block; clear: both; width: 100%;"></div>
                </div>
                <div id="specs">
                    <div class="C6" style='float: left;'>
                      <div class="info cmsedit">
                          <h5 class="name">Fusion Catalyst 4000 Specifications</h5>
                          <strong class="tagline">Main Chassis</strong>
                          <p></p>
                          <ul class="feature-list">
                            <li>System Architecture: Second Generation PCI Express Switch Fabric with 192 Gbps bandwidth</li>
                            <li>16 PCI Express 2.0 x4 lane slots (16 Gbps per slot, non-blocking bandwidth)</li>
                            <li>ControlPoint™ software</li>
                            <li>Built-in support for AMX and Crestron touch panels</li>
                            <li>CPU: Dual Quad Core Xeons</li>
                            <li>System memory: 8 GB ECC RAM standard (Optional 16 GB, 32 GB, 64 GB)</li>
                            <li>Operating System: Windows 7 64-bit</li>
                            <li>104-key keyboard and mouse</li>
                            <li>Dual hot swap 500 GB hard drives, 7200 RPM, RAID 1 array (Optional: 256 GB solid state drives, 3rd drive, RAID 5)</li>
                            <li>DVD-RW/CD-RW drive</li>
                            <li>2 Gigabit Ethernet ports (Add up to 4 additional dual-port cards)</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Expansion Chassis (Option)</strong>
                          <ul class="feature-list">
                            <li>System Architecture: Second Generation PCI Express Switch Fabric</li>
                            <li>16 PCI Express 2.0 x4 lane slots (16 Gbps per slot, non-blocking bandwidth)</li>
                            <li>Add up to two Expansion Chassis for max. 48 slots</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Output Cards</strong>
                          <ul class="feature-list">
                            <li>All output cards are dual-output, with 256 MB dedicated graphics memory</li>
                            <li>Up to 96 outputs</li>
                            <li>Output resolution max, digital: 2560x1600 pixels per output</li>
                            <li>Output resolution max, analog: 2048x1536 pixels per output</li>
                            <li>Color depth: 32 bits per pixel</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Dual DVI/RGB/HD Input Card (Option)</strong>
                          <ul class="feature-list">
                            <li>Up to 94 channels</li>
                            <li>Format, single-link DVI: Up to 2048x1200</li>
                            <li>Formats, dual-link DVI: Up to 2560x1600</li>
                            <li>Format, progressive scan component HD: 480p, 720p, 1080p</li>
                            <li>Format, analog RGB with any sync type (composite, separate, sync on green): Up to 2048x1200 resolution</li>
                            <li>Pixel rate, digital: Up to 270 MHz pixel rate</li>
                            <li>Pixel rate, analog: Up to 210 MHz</li>
                            <li>Pixel format: Samples and displays at 16 or 32 bits per pixel</li>
                            <li>Windows: 4 destination windows per card </li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Quad HD Decoder Input Card (Option)</strong>
                          <ul class="feature-list">
                            <li>Supports up to 120 HD or SD streams in MPEG-2, MPEG-4, MJPEG, and H.264 formats</li>
                            <li>Supports most popular IP cameras and encoders, as well as desktop PC streams with real-time updates</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Octal SD Video Input (Option)</strong>
                          <ul class="feature-list">
                            <li>Up to 376 inputs</li>
                            <li>Formats: NTSC, PAL</li>
                            <li>Windows: 16 destination windows per card</li>
                            <li>Octal Video Connection Model features 8 Composite (BNC) or S-Video (dual BNC) on 1RU 19” rackmount panel with 2 BNC sub-panels</li>
                            <li>Each sub-panel has 16 BNC connectors for 8 composite or 8 S-video signals</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">CatalystLink for Connection to PixelNet® (Option)</strong>
                          <ul class="feature-list">
                            <li>Up to 47 CatalystLink cards with quad PixelNet ports each</li>
                            <li>Support for all PixelNet input types, including DVI/RGB +KM capable.</li>
                            <li>Windows: 4 destination windows per card</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Rackmount Chassis</strong>
                          <ul class="feature-list">
                            <li>H x W x D: 7” H x 19” W x 22” D (17.8 cm x 48.3 cm x 55.9 cm)</li>
                            <li>Weight: 51 lbs. (23.1 kg.)</li>
                            <li>Shipping weight: 72 lbs. (32.7 kg.)</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Operating Range</strong>
                          <ul class="feature-list">
                            <li>Temperature, Operating: 32°F – 104°F (0°C – 40°C)</li>
                            <li>Temperature, Non-operating: 14°F – 150°F (-10°C – 66°C)</li>
                            <li>Humidity:10-90% non-condensing</li>
                            <li>Altitude: Up to 10,000 feet (3,048.0 m)</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Electrical Requirements</strong>
                          <ul class="feature-list">
                            <li>Input voltage: 100-240 VAC, auto-ranging power supply</li>
                            <li>Line frequency: 50-60 Hz</li>
                            <li>Power consumption: 600 Watts, maximum per chassis</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Regulatory</strong>
                          <ul class="feature-list">
                            <li>United States: UL 60950 listed, FCC Class A</li>
                            <li>Canada: cUL CSA C22.2, No. 80950</li>
                            <li>International: CE Mark, CB Certificate and Mark, IEC 60950, CCC, C-Tick, VCCI</li>
                          </ul>
                          <hr/>
                          <br/>
                      </div>
                    </div>
                    <div style="clear:both; display: block; width: 100%;"></div>
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
                                        <a data-event="Fusion-Catalyst-Brochure" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4000-8000-Datasheet-EN.pdf">
                                            <span class="title">Fusion Catalyst 4000 &amp; 8000</span><br>
                                            <span class="description">Brochure</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-Catalyst-Brochure" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4000-8000-Datasheet-EN.pdf">English</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Fusion-ControlPoint-Brochure" href="//www.infocus.com/resources/documents/InFocus-Jupiter-ControlPoint-with-ControlPoint-Security-Datasheet-EN.pdf">
                                            <span class="title">ControlPoint</span><br>
                                            <span class="description">ControlPoint with ControlPoint Security Data Sheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-ControlPoint-Brochure" href="//www.infocus.com/resources/documents/InFocus-Jupiter-ControlPoint-with-ControlPoint-Security-Datasheet-EN.pdf">English</a></li>
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
