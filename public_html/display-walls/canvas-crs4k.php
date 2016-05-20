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
                    <a href="/display-walls/canvas-crs4k">Canvas</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Canvas CRS-4K</h1></div>
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
                    <img src="/resources/static/images/display-walls/iStock_000049003822XLarge_test1170x500.jpg">
                </div>
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">Now every conference room and huddle room is a Canvas room.</strong>
                    <div class="mysqledit" id="blurb">
                        <p><strong>Collaborative Visualization for Teams</strong></p>
                        <p><a href="/display-walls/canvas">Canvas</a> has set the standard for collaborative visualization on smartphones, tablets, PCs, and control room display walls. Global 2000 companies in fields from finance to pharmaceuticals to oil and gas, construction, engineering, and electric utilities, as well as governments and public agencies use Canvas to manage operations. The Canvas CRS-4K™ system extends the power of Canvas’ award-winning solution to teams working in conference rooms and huddle rooms.</p>
                        <p>The Canvas CRS-4K system is a small, quiet box that can be located anywhere in the room. What it enables is enormous.</p>
                        <p>With the Canvas CRS-4K, teams in huddle rooms can collaborate with remote colleagues running Canvas on almost any device, sharing live video, real-time data, application screens, web windows, documents, and presentations. Users can annotate onscreen, coordinate using voice and text chat, share whiteboards, and jointly edit documents, spreadsheets, and presentations.</p>
                        <p>Using Canvas SimpleShare™, any user can walk into the conference room and wirelessly present their laptop screen to both local and remote Canvas participants. No cables to connect, no dongles to hunt down.</p>
                        <p>Other features include Microsoft Lync® integration and support for calls to and from 3rd party SIP-based systems to share video and audio.</p>
                        <p>The Canvas CRS-4K supports up to four 1080p HD displays or a single 4K Ultra HD display.</p>
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
                              <img src="/resources/static/images/display-walls/canvas4k.jpg" >
                          </div>
                          <h5 class="name">Real Collaboration, Real Work, Real Value</h5>
                          <strong class="tagline"></strong>
                          <p>Developed specifically for the meeting room, the Canvas CRS- 4K™ system is all about teamwork and access to a 360° view of operations.</p>
                          <p>All of Canvas’ rich, familiar set of collaboration tools are available, enabling distant colleagues to work together as if they were in the same place. But even colleagues without Canvas can participate.</p>
                          <p>Jupiter’s revolutionary SimpleShare technology allows wireless presentation of content from any laptop, even if it does not have Canvas installed.</p>
                          <p>Remote experts without Canvas can share video and audio with Canvas users by connecting from a SIP-based conferencing system.</p>
                          <p>Microsoft Lync integration permits escalation to Canvas from the Lync client, as well as the ability to start a Lync conversation from Canvas.</p>
                          <p>A multitouch web-based interface supports most tablets, providing easy control of canvas placement and resizing, as well as video previews.</p>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">At the Center of Teamwork</h5>
                          <strong class="tagline"></strong>
                          <p>Measuring only 3.8” x 8.7” x 12.9”, the Canvas CRS-4K™ system is at home on the conference room table, on a shelf, or in an equipment closet.</p>
                          <p>The Canvas CRS-4K supports viewing up to 8 simultaneous sources, including H.264 video streams, VNC viewer windows, web windows, and SimpleShare windows.</p>
                          <p>Four Mini DisplayPort connections support up to four 1080p HD displays or one 4K Ultra HD display.</p>
                          <p>The Canvas CRS-4K’s high performance graphics system is ideal for use in Engineering and Design (CAD/CAE/AEC), Geographical Information Systems (GIS) & Visualization, Oil & Gas, Life Sciences, Digital Content Creation (DCC) & Digital Media, and other demanding applications.</p>
                          <hr/>
                      </div>
                    </div>
                </div>
                <div id="details">
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 1em;">
                              <img src="/resources/static/images/display-walls/canvas4k.jpg" >
                          </div>
                        <h5 class="name">SYSTEM CONFIGURATION</h5>
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
