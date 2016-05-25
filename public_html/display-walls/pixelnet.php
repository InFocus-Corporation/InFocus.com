<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | PixelNet</title>
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
        // toggle more text
        $('#warp_show').on('click', function(){
            $("#warp_more").show();
            $("#warp_show").hide();
        })
        $('#warp_hide').on('click', function(){
            $("#warp_more").hide();
            $("#warp_show").show();
        })
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
                    <a href="/display-walls/pixelnet">Jupiter PixelNet</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Jupiter PixelNet</h1></div>
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
                    <span>PixelNet®adopts Gigabit Ethernet technology to create a network of input and output nodes to drive high resolution, real time video walls.</span>
                    <div class="mysqledit" id="blurb">
                        <p>A broad variety of PixelNet® input nodes can be matched to almost any video source, while PixelNet® output nodes connect to displays. Connected via CAT-6 cables, input and output nodes can be located as far as 100 meters from the switch. Using packet-switching technology, any information source can be shown on any display, such as a window on a single display, or as a window spanning multiple displays in a display wall.</p>

                        <p>PixelNet® makes creating complex topologies of inputs, outputs and switches simple, cost effective, and future proof. Massively scalable, the same component parts can scale from a single input distributed to a single output to hundreds of inputs and outputs. PixelNet® input nodes are small, silent and use very little power. PixelNet® Domain Control software provides an intuitive, object-oriented, drag-and-drop interface to control and manage multiple inputs, outputs and display walls.</p>
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
                    <div class="C5 alternateDivChildL2" style="float: right;">
                        <div class="info cmsedit">
                            <div class="image-set cmsedit">
                                <img src="/resources/static/images/display-walls/Product_PixelNet_AnalogHD.jpg">
                            </div>
                          </div>
                      </div>
                      <div class="C5 alternateDivChildL2" style="float: left;">
                          <div class="info cmsedit">
                            <h5 class="name">
                                Flexible, Scable, Powerful.
                            </h5>
                            <div class="mysqledit">
                                <p>PixelNet® is all about scalability. The same component parts can scale from a single input distributed to a single output to a configuration with hundreds of inputs and outputs. The networked system can support multiple display walls. Need to add another input? Add another PixelNet® input node. Want to add more streaming IP sources? Add another StreamCenter. Expanding the display wall? Add PixelNet® output nodes for the new displays.</p>
                            </div>
                          </div>
                      </div>
                      <div style="clear: both; display: block"></div>
                      <hr/>

                      <div class="C5 alternateDivChildL2" style="float: left;">
                        <div class="info cmsedit">
                            <h5 class="name">
                                Watch the PixelNet® video
                            </h5>
                            <iframe id="youtube" src="https://www.youtube.com/embed/9BbWL0ZgYEU" frameborder="0" allowfullscreen></iframe>
                        </div>
                      </div>
                      <div class="C5 alternateDivChildL2" style="float: right;">
                        <div class="info cmsedit">
                            <h5 class="name">
                                A PixelNet® Network
                            </h5>
                            <div class="mysqledit">
                                <img src="/resources/static/images/display-walls/PixelNet_System_rev.jpg" style="width: 100%; margin-bottom: 3em;">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="details">
                    <div class="C10 alternateDivChildL2">
                        <div class="info">
                            <div class="image-set cmsedit" id="details_photo">
                                <img src="/resources/static/images/display-walls/Product_PixelNet_AnalogHD.jpg" >
                            </div>
                            <div class="info cmsedit">
                                <p>PixelNet® makes creating complex topologies of inputs, outputs and switches simple, cost effective, and future proof. Massively scalable, the same component parts can scale from a single input distributed to a single output to hundreds of inputs and outputs. PixelNet® input nodes are small, silent and use very little power. PixelNet® Domain Control software provides an intuitive, object-oriented, drag-and-drop interface to control and manage multiple inputs, outputs and display walls.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="product_details">
                            <div class="product_photos">
                                <a href="/resources/static/images/display-walls/PN_DVI_Input_back.jpg" title="PixelNet® DVI input Node Back" class="colorbox" rel="gallery-node-370-dVCuqrD4mKk">
                                    <img
                                    class="product_detail_image"
                                    src="/resources/static/images/display-walls/PN_DVI_Input_back.jpg"
                                    width="400"
                                    height="300"
                                    alt=""
                                    title="PixelNet® DVI input Node Back"/>
                                </a>
                            </div>
                            <strong class="tagline mysqledit">PixelNet® DVI Input Node</strong>
                            <span>DVI and Analog RGB Input Node for PixelNet®</span><br/>
                            <br/>
                            <ul class="feature-list">
                                <li>Captures signals up to 1920x1200 resolution and up to 165 MHz pixel rate</li>
                                <li>Captures analog or digital progressive scan RGB signals</li>
                                <li>Provides analog-to-analog and digital-to-digital loop-through&nbsp;</li>
                                <li>Choice of external (loop-through) or internal EDID</li>
                                <li>Automatic format detect for Plug-and-Play simplicity&nbsp;</li>
                                <li>Provides one or two Gigabit PixelNet® ports</li>
                                <li>Available KM (keyboard and mouse) option</li>
                            </ul>
                        </div>
                        <div class="product_details">
                            <div class="product_photos">
                                <a href="/resources/static/images/display-walls/PN_Analog_Input_back.jpg" title="PixelNet® Analog HD Input Node Back" class="colorbox" rel="gallery-node-371-dVCuqrD4mKk"><img
                                    class="product_detail_image"
                                    typeof="foaf:Image"
                                    src="/resources/static/images/display-walls/PN_Analog_Input_back.jpg"
                                    width="400"
                                    height="300"
                                    alt=""
                                    title="PixelNet® Analog HD Input Node Back"/>
                                </a>
                            </div>
                            <strong class="tagline mysqledit">PixelNet® Analog HD Input Node</strong>
                            <span>Analog High Definition Video Capture for PixelNet®</span><br/>
                            <br/>
                            <ul class="feature-list">
                                <li>Handles all standard and high definition video formats&nbsp;</li>
                                <li>Analog component inputs (YPrPb)</li>
                                <li>Automatic format detection</li>
                                <li>10-bit color processing</li>
                                <li>State-of-the-art video de-interlacing, and scaling</li>
                                <li>Dual Gigabit PixelNet® ports</li>
                            </ul>
                        </div>
                        <div class="product_details">
                            <div class="product_photos">
                                <a href="/resources/static/images/display-walls/PN_Quad_SD_back.jpg" title="PixelNet® Quad CVBS Input Node Back" class="colorbox" rel="gallery-node-372-dVCuqrD4mKk">
                                    <img
                                    class="product_detail_image"
                                    typeof="foaf:Image"
                                    src="/resources/static/images/display-walls/PN_Quad_SD_back.jpg"
                                    width="400"
                                    height="300"
                                    alt=""
                                    title="PixelNet® Quad CVBS Input Node Back"/>
                                </a>
                            </div>
                            <br>
                            <strong class="tagline mysqledit">PixelNet® Quad SD Input Node</strong>
                            <span>Quad Standard Definition Video Input Node for PixelNet®</span><br/>
                            <ul class="feature-list">
                                <li>Handles composite and S-video standard definition video via CVBS/Y-C</li>
                                <li>Supports PAL and NTSC encoding formats</li>
                                <li>Four BNC inputs, configurable as four composite or two S-video</li>
                                <li>Supports up to eight PixelNet® windows</li>
                                <li>Superior quality Algolith de-interlacing</li>
                                <li>Dual Gigabit PixelNet® Port</li>
                            </ul>
                        </div>
                        <div class="product_details">
                            <div class="product_photos">
                                <a href="/resources/static/images/display-walls/PN_3G_SDI_back.jpg" title="PixelNet® 3G-SDI Input Node Back" class="colorbox" rel="gallery-node-373-dVCuqrD4mKk">
                                    <img
                                    class="product_detail_image"
                                    typeof="foaf:Image"
                                    src="/resources/static/images/display-walls/PN_3G_SDI_back.jpg"
                                    width="400"
                                    height="300"
                                    alt=""
                                    title="PixelNet® 3G-SDI Input Node Back"/>
                                </a>
                            </div>
                            <strong class="tagline mysqledit">PixelNet® 3G-SDI Input Node</strong>
                            <span>Serial Digital Video Input Node for PixelNet®</span><br/>
                            <br/>
                            <ul class="feature-list">
                                <li>Handles ANSI/SMPTE 259M-C NTSC/PAL signals</li>
                                <li>Automatic format detection</li>
                                <li>10-bit color processing&nbsp;</li>
                                <li>High-quality Algolith video processing</li>
                                <li>Reclocked SDI output</li>
                                <li>Single Gigabit PixelNet® port</li>
                            </ul>
                        </div>
                        <div class="product_details">
                            <div class="product_photos">
                                <a href="/resources/static/images/display-walls/PN_Teammate_output_back.jpg" title="PixelNet® TeamMate Output Node Back" class="colorbox" rel="gallery-node-379-dVCuqrD4mKk">
                                    <img
                                    class="product_detail_image"
                                    typeof="foaf:Image"
                                    src="/resources/static/images/display-walls/PN_Teammate_output_back.jpg"
                                    width="400"
                                    height="300"
                                    alt=""
                                    title="PixelNet® TeamMate Output Node Back"/>
                                </a>
                            </div>
                            <strong class="tagline mysqledit">Pixelnet® Teammate Output Node</strong>
                            <span>Flexible Display Node for PixelNet®</span><br/>
                            <br/>
                            <ul class="feature-list">
                                <li>Output both analog (RGB) and digital (DVI) signals</li>
                                <li>Supports output resolutions up to 2048x 1200 pixels and up to 165 MHz pixel rate</li>
                                <li>Displays up to 64 PixelNet® sources in freely scalable windows</li>
                                <li>Can be a discrete output or part of a display wall</li>
                                <li>Frame-sync for perfect visualization in large display walls</li>
                                <li>Dual Gigabit PixelNet® ports&nbsp;</li>
                            </ul>
                        </div>
                        <div class="product_details">
                            <div class="product_photos">
                                <a href="/resources/static/images/display-walls/PN_Audio_Output_back.jpg" title="PixelNet® Audio Output Node Back" class="colorbox" rel="gallery-node-374-dVCuqrD4mKk">
                                    <img
                                    class="product_detail_image"
                                    typeof="foaf:Image"
                                    src="/resources/static/images/display-walls/PN_Audio_Output_back.jpg"
                                    width="400"
                                    height="300"
                                    alt=""
                                    title="PixelNet® Audio Output Node Back"/>
                                </a>
                            </div>
                            <strong class="tagline mysqledit">PixelNet® Audio Output Node</strong>
                            <span>Superb Audio from PixelNet® HD SDI and Analog HD Nodes</span><br/>
                            <br/>
                            <ul class="feature-list">
                                <li>Output either digital or analog signals</li>
                                <li>Optical port (S/PDIF), BNC connector (S/PDIF or AES3id), and two analog TRS 1/4" jacks</li>
                                <li>Frequency Response: 4 Hz - 22 KHz (48 KHz sampling), 4 Hz - 44 KHz (96 KHz sampling)</li>
                                <li>Signal-to-Noise Ratio: -100dB</li>
                                <li>Dynamic Range: 110dB</li>
                                <li>Total Harmonic Distortion: 0.003%</li>
                            </ul>
                        </div>
                        <div class="product_details">
                            <div class="product_photos">
                                <a href="/resources/static/images/display-walls/PN_Warp_Blend_Node_back.jpg" title="PixelNet® Warp/Blend Node Back" class="colorbox" rel="gallery-node-375-dVCuqrD4mKk">
                                    <img
                                    class="product_detail_image"
                                    typeof="foaf:Image"
                                    src="/resources/static/images/display-walls/PN_Warp_Blend_Node_back.jpg"
                                    width="400"
                                    height="300"
                                    alt=""
                                    title="PixelNet® Warp/Blend Node Back"/>
                                </a>
                            </div>
                            <strong class="tagline mysqledit">PixelNet® Warp/Blend Node™</strong>
                            <span>Essential for projector-driven video walls</span><br/>
                            <br/>
                            <p>The Warp/Blend Node™ from Jupiter Systems is the advanced edge-blend and warp solution for the award-winning PixelNet® Distributed Display Wall System. The Warp/Blend Node is the same space-saving size and shape as other PixelNet® nodes and extends
                                the functionality, power, and ease of use for which PixelNet® has become well known. Supporting arrays of up to 50 projectors, it provides warping and edge-blending capabilities to front-projection or rear-projection display walls in an easily
                                scalable way.</p>

                            <a id="warp_show">Read More...</a>
                            <div id="warp_more">
                                <p>The Warp/Blend Node opens PixelNet® to a variety of new applications using projectors, including simulation, training, and scientific visualization and provides seamless display screens for command and control, boardroom, and digital signage
                                    installations.</p>
                                <p>The Warp/Blend Node supports both warp/edge-blended display walls and non-warp/edge-blended display walls in the same PixelNet® Domain. For example, a 2x1 boardroom projection screen and ancillary LCD screens can be supported in the same PixelNet
                                    Domain.</p>
                                <p>Utilizing revolutionary, patent-pending technology from Jupiter Systems, all signalling and communications between the Warp/Blend Node and its associated PixelNet® TeamMate Output Node are conducted within the single DVI cable linking the two devices.</p>
                                <p>The Warp/Blend Node is tightly integrated with PixelNet® Domain Control (PDC) software, providing simple setup and control. The user interface and mapping tools are both intuitive and easy to use, allowing users to align complex multi-channel
                                    installations with ease.</p>
                                <p>The Warp/Blend Node supports EasyBlend™ software from Scalable Displays for easy camera-based auto-calibration of edge-blending and warping.</p>
                                <p>
                                    <strong class="tagline mysqledit">Edge Blending</strong>
                                </p>
                                <p>The Warp/Blend Node™ makes it easy to create seamless images from multiple projectors. The system provides extensive blend capabilities, including gamma fine-tuning.</p>
                                <ul class="feature-list">
                                    <li>
                                        <p>Blends the output of 2 or more PixelNet® TeamMate Output Nodes</p>
                                    </li>
                                    <li>
                                        <p>Blends both horizontal and vertical arrays</p>
                                    </li>
                                    <li>
                                        <p>Up to 50% overlap in both horizontal and vertical directions (Recommended overlap is 10-20%)</p>
                                    </li>
                                    <li>
                                        <p>Supports digital (DVI, single link) signals</p>
                                    </li>
                                    <li>
                                        <p>Supports resolutions up to 1920x1080</p>
                                    </li>
                                </ul>
                                <p>
                                    <strong class="tagline mysqledit">Warping &amp; Geometry Correction</strong>
                                </p>
                                <p>The Warp/Blend Node™ is capable of supporting nearly all surface geometries. It allows users to project onto both planar and non-planar surfaces, and supports off-axis projection with advanced keystone correction.&nbsp; Supported non-planar
                                    surfaces include:</p>
                                <ul class="feature-list">
                                    <li>
                                        <p>Partial convex</p>
                                    </li>
                                    <li>
                                        <p>Partial concave</p>
                                    </li>
                                    <li>
                                        <p>Partial cylinder</p>
                                    </li>
                                    <li>
                                        <p>Globe</p>
                                    </li>
                                    <li>
                                        <p>Cylinder</p>
                                    </li>
                                    <li>
                                        <p>Arbitrarily curved screens</p>
                                    </li>
                                </ul>
                                <p>
                                    <strong class="tagline mysqledit">Input/Output Signals</strong>
                                </p>
                                <ul class="feature-list">
                                    <li>
                                        <p>Range Up to 1920x1080 resolution</p>
                                    </li>
                                    <li>
                                        <p>Signal type Digital (DVI, single link)</p>
                                    </li>
                                    <li>
                                        <p>Input Signal Processing</p>
                                    </li>
                                    <li>
                                        <p>Proprietary Jupiter Systems PixelNet® Warp and Blend</p>
                                    </li>
                                </ul>
                                <p>
                                    <strong class="tagline mysqledit">Dimensions</strong>
                                </p>
                                <ul class="feature-list">
                                    <li>
                                        <p>L x W x H (without feet) 9.25” (235mm) x 6.435” (164.5mm) x 1.415” (35.94mm)</p>
                                    </li>
                                    <li>
                                        <p>L x W x H (with feet) 9.25” (235mm) x 6.435” (164.5mm) x 1.670” (42.42mm)</p>
                                    </li>
                                    <li>
                                        <p>Weight 2.5 lbs</p>
                                    </li>
                                    <li>
                                        <p>Shipping weight 3.5 lbs</p>
                                    </li>
                                </ul>
                                <p>
                                    <strong class="tagline mysqledit">Operating Range</strong>
                                </p>
                                <ul class="feature-list">
                                    <li>
                                        <p>Temperature 32°F - 104°F (0°C - 40°C)</p>
                                    </li>
                                    <li>
                                        <p>Humidity Up to 90% non-condensing</p>
                                    </li>
                                    <li>
                                        <p>Altitude Up to 10,000 feet (3,048.0m)</p>
                                    </li>
                                </ul>
                                <p>
                                    <strong class="tagline mysqledit">Electrical Requirements</strong>
                                </p>
                                <ul class="feature-list">
                                    <li>
                                        <p>Input voltage 100-240 VAC, auto-ranging power supply</p>
                                    </li>
                                    <li>
                                        <p>Line frequency 50-60Hz</p>
                                    </li>
                                    <li>
                                        <p>Power consumption 25 watts, maximum</p>
                                    </li>
                                </ul>

                                <a id="warp_hide">Close</a>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® Product Line Brochure</span><br>
                                            <span class="description">Benefits and specifications for PixelNet</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-DVI-Input-Node-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® DVI Input Node Data Sheet</span><br>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-Analog-HD-Input-Node-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® Analog HD Input Node Data Sheet</span><br>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-Quad-SD-Input-Node-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® Quad SD Input Node Data Sheet</span><br>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-3G-SDI-Input-Node-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® 3G-SDI Input Node Data Sheet</span><br>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-Teammate-Output-Node-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® Teammate Output Node Data Sheet</span><br>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-Audio-Output-Node-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® Audio Output Node Data Sheet</span><br>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-PixelNet-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-PixelNet-Warp-Blend-Node-Datasheet-EN.pdf">
                                            <span class="title">PixelNet® Warp/Blend Node™ Data Sheet</span><br>
                                        </a>
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
