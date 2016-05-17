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
                    <a href="/display-walls/fusion-catalyst-4500">Fusion Catalyst 4500</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C6x4_child">
                <div>
                  <h1 class="mysqledit h2" id="pagetitle">Fusion Catalyst™ 4500</h1>
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
                      <img src="/resources/static/images/display-walls/Product_Fusion_Catalyst_4500.jpg" >
                  </div>
                  <h5 class="name"></h5>
                  <strong class="tagline">​Speed, Flexibility, Perfection</strong>
                  <p>Introducing Fusion Catalyst™ 4500, the newest member of Jupiter’s award-winning family of display wall processors. Users and industry pundits around the world have called the Fusion Catalyst product line the best-in-class since its introduction in 2010.</p>
                  <p>The Fusion Catalyst 4500 features bandwidth that reaches 336 Gbps, delivering the high resolution, high frame rate performance that users have come to expect from Jupiter Systems. The system is built around a PCI Express 2.0 chassis with 7 powerful, high speed slots, providing faster graphics, real time HD/SD/DVI/RGB frame rates, and better overall system performance than anything in its class. Redundant power supplies maximize system uptime. Featuring the award-winning performance and quality for which Jupiter is known, this is the solution for projects both large and small.</p>
                  <p>And with an Intel E5 Six Core Xeon and Windows 7 onboard, you can run even the most demanding network management, SCADA, volumetric traffic management, or other mission critical applications directly on the video wall. Add the optional second Xeon CPU is available for even more compute power.</p>
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
                          <strong class="tagline">Expansive Capabilities</strong>
                          <p>The new Fusion Catalyst 4500 Expansion Chassis (FC4500E) allows you to pursue even the most ambitious projects.  Add up to 4 Fusion Catalyst 4500 Expansion Chassis to a Fusion Catalyst CPU Chassis and you can handle up to 216 inputs and up to 96 outputs.</p>
                          <hr/>
                          <h5 class="name"></h5>
                          <strong class="tagline">Supports Both Canvas and ControlPoint™</strong>
                          <p>The Fusion Catalyst 4500 defines flexibility, supporting almost any design spec, whether for a standalone control room or an enterprise-wide collaborative visualization deployment across multiple hardware platforms. This is the system that can do it all.
                          <p>When deployed as part of a Jupiter Canvas installation, the Fusion Catalyst 4500 runs the Canvas Client, providing access to all of the visual business intelligence made available in the user’s network—live streams from network cameras and mobile devices, VNC from PC sources, and real-time data feeds. Users at the display wall can collaborate with distant colleagues on their laptops, smartphones and tablets, tapping into a 360° view of operations.</p>
                          <p>The Fusion Catalyst 4500 also supports Jupiter’s ControlPointTM display wall management software, the most complete and powerful solution for managing the control room display wall, deployed in over 10,000 of the most demanding installations around the world.</p>
                          <hr/>
                          <h5 class="name"></h5>
                          <strong class="tagline">Fusion Catalyst™ 4500 In Action</strong>
                          <p>The Fusion Catalyst 4500 is the ideal solution for projects of any size.</p>
                          <p>Each 3RU rack-mountable CPU Chassis and Expansion Chassis has 7 PCI Express 2.0 high speed slots. Adding up to 4 Expansion Chassis enables very large configurations. Driving a large display wall? The Fusion Catalyst supports up to 96 HD outputs when running ControlPoint software, or 48 outputs when deployed with Canvas software.</p>
                          <p>With optional Quad HD Decoder Cards, Fusion Catalyst 4500 can support up to 108 video streams. Most popular IP cameras and encoders are supported, as are desktop PC streams with real-time updates.</p>
                          <p>With optional Dual-Link DVI-I Input Cards, Fusion Catalyst 4500 can support up to 54 DVI-I, progressive scan component HD, or analog RGB inputs. </p>
                          <p>Up to 216 video inputs can be accommodated using optional Octal SD Video Input Cards.</p>
                          <hr/>
                      </div>
                    </div>
                    <div style="display: block; clear: both; width: 100%;"></div>
                </div>
                <div id="specs">
                    <div class="C6" style='float: left;'>
                      <div class="info cmsedit">
                          <h5 class="name">Fusion Catalyst 4500 Specifications</h5>
                          <strong class="tagline">CPU Chassis</strong>
                          <br/>
                          <p>System Architecture</p>
                          <ul class="feature-list">
                            <li>PCI Express 2.0 chassis with 7 high speed slots for input, output, or auxiliary cards</li>
                          </ul>
                          <p>CPU Board</p>
                          <ul class="feature-list">
                            <li>Intel E5 Six Core Xeon CPU</li>
                            <li>Optional 2nd Intel E5 Six Core Xeon CPU</li>
                          </ul>
                          <p>System Memory</p>
                          <ul class="feature-list">
                            <li>24GB RAM per CPU standard</li>
                            <li>Up to 96GB RAM per CPU optional</li>
                          </ul>
                          <p>Drives</p>
                          <ul class="feature-list">
                            <li>500GB hard disk drive, standard</li>
                            <li>Optional 256GB and 512GB solid state drives</li>
                            <li>Optional 2nd and 3rd HDD or SSD drives</li>
                            <li>Optional RAID1 array with hot spare</li>
                          </ul>
                          <p>Optical Storage</p>
                          <ul class="feature-list">
                            <li>DVD-RW/CD-RW</li>
                          </ul>
                          <p>Network Interface</p>
                          <ul class="feature-list">
                            <li>Ethernet: Standard dual 100/1000 Mbps RJ45 ports</li>
                          </ul>
                          <p>Input Devices (USB)</p>
                          <ul class="feature-list">
                            <li>104-key keyboard and mouse</li>
                          </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Graphics Inputs</strong>
                            <p>Quad HD Decoder Input Card (Optional)</p>
                            <ul class="feature-list">
                              <li>Inputs: Up to 108 inputs in 1 CPU Chassis + 4 Expansion Chassis</li>
                              <li>1 GigE connection shared across 4 decoders</li>
                              <li>Supports real-time decoding of HD or SD streams</li>
                              <li>Supports most popular IP cameras and encoders</li>
                            </ul>
                            <p>Dual DVI/RGB/HD Input Card (Optional)</p>
                            <ul class="feature-list">
                              <li>Inputs: Up to 54 inputs in 1 CPU Chassis + 4 Expansion Chassis</li>
                              <li>Format: Dual-Link DVI up to 2560x1600, Single-Link DVI up to 2048x1200, progressive scan component HD (480p, 720p, 1080p), and analog RGB with any sync type (composite, separate, sync on green) up to 2048x1200</li>
                              <li>Pixel rate, Digital: Up to 270 MHz</li>
                              <li>Pixel rate, Analog: Up to 210 MHz</li>
                              <li>Pixel format: 32 bits per pixel</li>
                              <li>Windows: 4 destination windows per card</li>
                            </ul>
                            <p>Octal SD Video Input Card (Optional)</p>
                            <ul class="feature-list">
                                <li>Inputs: Up to 216 inputs in 1 CPU Chassis + 4 Expansion Chassis</li>
                                <li>Input format: NTSC, PAL</li>
                                <li>Windows: 16 destination windows per card</li>
                                <li>Octal Video Connection Module: Dual BNC-F connectors support S-Video or Composite on 1RU 19” rackmount panel with 2 BNC sub-panels. Each sub-panel has 16 BNC connectors for 8 Composite or 8 S-Video signals</li>
                            </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Graphics Outputs</strong>
                            <p>Fusion Catalyst 4500 Output Card</p>
                            <ul class="feature-list">
                              <li>Outputs: Up to 96 with ControlPoint™ display wall management software in 1 CPU Chassis + 4 Expansion Chassis. Up to 48 with Canvas collaborative visualization software in 1 CPU Chassis + 4 Expansion Chassis.</li>
                              <li>Resolution: Digital: 640x480 to 1920x1080 pixels per output</li>
                              <li>Color Depth: 32 bits per pixel</li>
                              <li>Output Signal: DVI-D single-link connector or HDMI connector, depending on configuration.</li>
                            </ul>
                          <hr/>
                          <br/>
                          <strong class="tagline">Other</strong>
                            <p>Rackmount CPU Chassis & Expansion Chassis</p>
                            <ul class="feature-list">
                                <li>Dimensions: 5.25” H x 19” W x 25.5” D (13.3 cm x 48.3 cm x 64.8 cm)</li>
                                <li>Weight 53 lbs. (24.1 kg.)</li>
                                <li>Shipping weight 75 lbs. (34.1 kg.)</li>
                            </ul>
                            <p>Operating Range</p>
                            <ul class="feature-list">
                              <li>Temperature, Operating: 32°F – 104°F (0°C – 40°C)</li>
                              <li>Temperature, Non-operating: 14°F – 150°F (-10°C – 66°C)</li>
                              <li>Humidity 10-90% non-condensing</li>
                              <li>Altitude: Up to 10,000 feet (3,048.0 m)</li>
                            </ul>
                            <p>Electrical</p>
                            <ul class="feature-list">
                              <li>Redundant power supplies: High efficiency (94%) with PMBus and I2C</li>
                              <li>Input voltage: 100-240 VAC, auto-ranging power supply</li>
                              <li>Line frequency: 50-60 Hz</li>
                              <li>Power consumption: 500 Watts nominal per chassis</li>
                            </ul>
                            <p>Regulatory</p>
                            <ul class="feature-list">
                              <li>United States: UL 60950 listed, FCC Class A</li>
                              <li>Canada: cUL CSA C22.2, No. 60950</li>
                              <li>International: CE Mark, CB Certificate, IEC 60950, CCC, VCCI</li>
                              <li>Digital: Up to 270 MHz Analog: Up to 210 MHz</li>
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
                                        <a data-event="Fusion-4500B" href="/resources/static/documents/fusion-catalyst/LR_Fusion Catalyst 4500B datasheet_Mar2015_0.pdf">
                                            <span class="title">Fusion Catalyst 4500B</span><br>
                                            <span class="description">Datasheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-4500B" href="/resources/static/documents/fusion-catalyst/LR_Fusion Catalyst 4500B datasheet_Mar2015_0.pdf">English</a></li>
                                                    <li><a data-event="Fusion-4500B" href="/resources/static/documents/fusion-catalyst/Fusion Catalyst 4500B datasheet_Jan2015_ru-RU.pdf">Pусский</a></li>
                                                    <li><a data-event="Fusion-4500B" href="/resources/static/documents/fusion-catalyst/SPA Fusion Catalyst 4500B datasheet_Jan2015.pdf">Español</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Fusion-4500C" href="/resources/static/documents/fusion-catalyst/LR_Fusion Catalyst 4500C datasheet_Mar2015_0.pdf">
                                            <span class="title">Fusion Catalyst 4500C</span><br>
                                            <span class="description">Datasheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-4500C" href="/resources/static/documents/fusion-catalyst/LR_Fusion Catalyst 4500C datasheet_Mar2015_0.pdf">English</a></li>
                                                    <li><a data-event="Fusion-4500C" href="/resources/static/documents/fusion-catalyst/Fusion Catalyst 4500C datasheet_Jan2015_ru-RU_0.pdf">Pусский</a></li>
                                                    <li><a data-event="Fusion-4500C" href="/resources/static/documents/fusion-catalyst/SPA Fusion Catalyst 4500C datasheet_Jan2015.pdf">Español</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Fusion-4500H" href="/resources/static/documents/fusion-catalyst/LR_Fusion Catalyst 4500H datasheet_Mar2015_0.pdf">
                                            <span class="title">Fusion Catalyst 4500H</span><br>
                                            <span class="description">Datasheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-4500H" href="/resources/static/documents/fusion-catalyst/LR_Fusion Catalyst 4500H datasheet_Mar2015_0.pdf">English</a></li>
                                                    <li><a data-event="Fusion-4500H" href="/resources/static/documents/fusion-catalyst/Fusion Catalyst 4500H datasheet_Jan2015_ru-RU.pdf">Pусский</a></li>
                                                    <li><a data-event="Fusion-4500H" href="/resources/static/documents/fusion-catalyst/SPA Fusion Catalyst 4500H datasheet_Jan2015.pdf">Español</a></li>
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
