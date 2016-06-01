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
                    <a href="/collaborative-visualization/">Collaborative Visualization</a> &gt;
                    <a href="/collaborative-visualization/fusion-catalyst">Jupiter Fusion Catalyst</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C6x4_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Jupiter Fusion Catalyst</h1></div>
                <div>
                    <ul class="action-links Col_child">
                        <li></li>
                        <li><a class='btn form-box' style='display:block' href='/resources/forms/getaquote'>Get a Quote</a></li>
                        <li><a class='btn' href='/reseller-locator'>Find a Reseller</a></li>
                    </ul>
                </div>
            </div>

            <div class="C10 Col_child">
                <div class="info">
                    <div class="image-set" style="float:right; margin-left: 1em; padding: 0 1em 1em;">
                        <img src="/resources/static/images/display-walls/fusion-catalyst1.jpg" style="width:460px;max-width:100%;">
                    </div>
                    <strong class="tagline mysqledit" id="header">The next generation of display wall processors has arrived.</strong>
                    <div class="mysqledit" id="blurb">
                        <p>Fusion Catalyst™ ushers in a new era of performance and flexibility for display wall processors. With more than 10,000 systems installed around the world, the award-winning line of Fusion Catalyst processors is designed for continuous, 24/7 operation and can be found in Global 2000 enterprises, banking and finance operations, oil and gas operations, network operation centers, traffic management centers, electric and gas utility control rooms, emergency operations centers, security centers, and fixed and mobile military operations.</p>
                        <p>Remember to bring your applications, because Fusion Catalyst is also a PC with Intel® CPUs and Microsoft Windows® onboard. Run mission-critical applications, access data through the network, engage the information, and collaborate on a wall-sized desktop.</p>
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
                  <div id="models">
                    <ul class="C10 panels resultsList">
                      <li>
              					<div>
                          <a href="fusion-catalyst-4000"><h6 class="title">Fusion Catalyst 4000</h6></a>
            				      <ul class="spec-list">
                            <li>48 slots</li>
                            <li>Up to 96 outputs at 2560x1600 pixels at 32 bits</li>
                            <li>Dual DVI-I Output Card</li>
                            <li>Up to 94 inputs.</li>
                          </ul>
                          <a href="fusion-catalyst-4000" class="blue_btn" style="width:80%;">Learn More</a>
              			    </div>
              			  </li>
                      <li>
              					<div>
                          <a href="fusion-catalyst-4500"><h6 class="title">Fusion Catalyst 4500</h6></a>
              				    <ul class="spec-list">
                            <li>336 Gbps bandwidth</li>
                            <li>PCI Express 2.0 chassis</li>
                            <li>7 powerful, high speed slots</li>
                            <li>Intel E5 Six Core Xeon and Windows 7</li>
                          </ul>
                          <a href="fusion-catalyst-4500" class="blue_btn" style="width:80%;">Learn More</a>
              			     </div>
              			  </li>
                      <li>
              					<div>
                          <a href="fusion-catalyst-8000"><h6 class="title">Fusion Catalyst 8000</h6></a>
              				    <ul class="spec-list">
                            <li>320 Gbps bandwidth</li>
                            <li>Up to 80 slots</li>
                            <li>Hot-swappable input and output cards</li>
                            <li>Dual Quad Core Xeons and Windows 7</li>
                          </ul>
                          <a href="fusion-catalyst-8000" class="blue_btn" style="width:80%;">Learn More</a>
              			     </div>
              			  </li>
                      <li>
              					<div>
                          <a href="fusion-catalyst-quad-hd-decoder-card"><h6 class="title">Quad HD Decoder Card <br/>
                          for Fusion Catalyst</h6></a>
              				    <ul class="spec-list">
                            <li>Support for MPEG-2, MPEG-4, H.264, and MJPEG formats.</li>
                            <li>All display wall processors in the Fusion Catalyst™ product line are supported</li>
                          </ul>
                          <a href="fusion-catalyst-quad-hd-decoder-card" class="blue_btn" style="width:80%;">Learn More</a>
              			     </div>
              			  </li>
                    </ul>
                    <hr/>
                  </div>
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 0 1em 1em;">
                              <img src="/resources/static/images/display-walls/fusion-catalyst2.jpg" >
                          </div>
                          <h5 class="name">The Fusion Catalyst 4500™ Product Line</h5>
                          <strong class="tagline"></strong>
                          <p>The Fusion Catalyst 4500 family is comprised of the Fusion Catalyst 4500B, Fusion Catalyst 4500H, and Fusion Catalyst 4500C models, each offering unique features and value to Jupiter customers. The Fusion Catalyst 4500 family of display wall processors can be configured to support almost any application or design specification. </p>
                          <ul>
                            <li>
                              <p>
                                <strong>Fusion Catalyst 4500B™</strong> - The Fusion Catalyst 4500B is the base model and standard-bearer for the Fusion Catalyst 4500 family of products. Featuring Jupiter’s ControlPoint™ display wall management software, the 4500B is an ideal solution for any display wall project where HDCP is not required.  Up to 4 Expansion Chassis can be added to support up to 96 non-HDCP outputs at resolutions up to 1920x1080, up to 108 streaming video inputs, up to 54 Dual-Link DVI inputs, or up to 216 SD video inputs.
                              </p>
                            </li>
                            <li>
                              <p>
                                <strong>Fusion Catalyst 4500H™</strong> - The Fusion Catalyst 4500H adds support for the display of HDCP-protected content. Like the 4500B, the 4500H features Jupiter’s ControlPoint™ display wall management software. Up to 4 Expansion Chassis can be added to support up to 48 HDCP outputs at resolutions up to 1920x1080, up to 108 streaming video inputs, up to 54 Single-Link DVI inputs supporting HDCP-encrypted content, up to 54 Dual-Link DVI inputs for non-HDCP content, or up to 216 SD video inputs.
                              </p>
                            </li>
                            <li>
                              <p>
                                <strong>Fusion Catalyst 4500C™</strong> - The Fusion Catalyst 4500C supports Canvas, Jupiter’s award-winning collaborative visualization solution. With its version of the Canvas Client built especially for display walls, the Fusion Catalyst 4500C provides shared access to streaming H.264 video, VNC viewer windows, active web browser windows, and desktop presentation screens in a rich collaborative environment with remote users on smartphones, tablets, PC, and other video walls anywhere in the world. Up to 4 Expansion Chassis can be added to support up to 48 non-HDCP outputs at resolutions up to 1920x1080 and up to 108 HD streaming video inputs.  When the system is not being used in a Canvas session, the Fusion Catalyst 4500C can also support up to 54 DVI inputs for local presentations.
                              </p>
                            </li>
                          </ul>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Fusion Catalyst 4000 and 8000</h5>
                          <strong class="tagline"></strong>
                          <p>Employing cutting edge, second generation PCI Express technology, Fusion Catalyst 4000 and 8000 processors offer up to an astonishing 320 Gbps of bandwidth. That’s enough to carry multiple 1080p video signals at a 60 frames per second, drive HD displays at a full 32 bits per pixel, and support virtually any configuration requirement.</p>
                          <ul class="feature-list">
                            <li>Up to 80 Gen 2 PCI Express slots</li>
                            <li>Up to 120 graphics outputs</li>
                            <li>Up to 100 DVI, HD, or RGB inputs</li>
                            <li>Up to 400 SD streaming video inputs</li>
                            <li>Up to 200 HD streaming video inputs</li>
                            <li>Output resolutions to 2560x1600</li>
                          </ul>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Watch the Fusion Catalyst video</h5>
                          <a href="//www.infocus.com/videos?h-BRIkr2dmk" class="colorbox-load init-colorbox-load-processed cboxElement">
                            <img class="video_thumbnail" typeof="foaf:Image" src="http://www.jupiter.com/system/files/styles/video_thumbnail/private/video-thumbnails/Video_Still_FusionCatalyst2.jpg?itok=lCKoD1Xa" width="740" style="max-width:100%;height:auto;">
                          </a>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Supports both ControlPoint™ and Canvas</h5>
                          <strong class="tagline"></strong>
                          <p>ControlPoint™, Jupiter's display wall management software, provides an object-based, drag and drop interface. Objects such as DVI, RGB, HD, and video inputs, streaming video inputs, web browsers, image viewers, and local and remote application windows can be dragged and dropped anywhere on the display wall. Object-level security allows managers to create discrete management and access permissions for wall segments, layouts, inputs, applications, and remote cursor control. User activity and event logging allow thorough forensic analysis.</p>
                          <p>Fusion Catalyst display wall processors can be ordered with Canvas, Jupiter’s award-winning collaborative visualization software. Canvas enables video, data, applications, and more to be shared with colleagues anywhere, on any device, delivering end-to-end collaboration. Users can share streams and collaborate from anywhere in the network: at the main display wall, on PCs, and on iOS and Android smartphones and tablets. Canvas brings a rich set of familiar tools for collaboration and allows annotation directly on live video streams. Shared voice chat, Microsoft Lync® integration, and the ability to connect with SIP-based conferencing systems put the Fusion Catalyst running Canvas at the center of enterprise communications and collaboration.</p>
                          <hr/>
                      </div>
                      <div class="info cmsedit">
                        <h5 class="name">Fusion Catalyst in action</h5>
                          <strong class="tagline"></strong>
                          <p>The Fusion Catalyst Processor from Jupiter Systems is the perfect solution for control room projects requiring high performance and reliability in a cost effective, space efficient platform.</p>
                          <p>A Fusion Catalyst Display Wall Processor incorporates all of the visual data sources found in a control room environment and displays them in movable, scalable windows on a virtual display comprised of multiple output devices: monitors, LCD flat panels, plasma panels, projection cubes, or a rear projection system.</p>
                          <p>Data sources can include local applications, remote network applications, remote network RGB streams, compressed network video streams, directly connected SD and HD video, VGA, and DVI inputs. All data sources are accessed from an intuitive and consistent software interface providing complete control of the virtual display surface.</p>
                      </div>
                    </div>
                </div>
                <div id="details">
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 0 1em 1em;">
                              <img src="/resources/static/images/display-walls/fusion-catalyst2.jpg" >
                          </div>
                          <h5 class="name">Express Switch Fabric: Critical for Control Room Operations PCI</h5>
                          <p>Fusion Catalyst display wall processors feature Second Generation PCI Express technology, creating a true non-blocking communication infrastructure within each chassis. With at least double the bandwidth found in its competition, and up to eight times that of previous generations of Fusion 900-series processors, the new Fusion Catalyst family of display wall processors provides more expandability, faster graphics, real time SD/DVI/RGB/HD frame rates, and better overall system performance, regardless of configuration size.</p>
                          <hr style="clear:both;display:block;">
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Run Applications on the Controller</h5>
                          <p>Fusion Catalyst processors are also PCs, with Intel CPUs and Microsoft Windows, enabling applications to be run directly on the processor. The Fusion Catalyst 8000 and Fusion Catalyst 4000 models feature two Quad Core Xeon CPUs and up to 64 GB RAM, while the Fusion Catalyst 1000 features a Core 2 Duo with 4 GB RAM. Speedy, capacious drives extend the functionality. The result is unrivaled performance for even the most demanding command and control applications.</p>
                          <hr>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">High Performance Graphics</h5>
                          <p>Fusion Catalyst utilizes the most advanced graphics GPU architecture found in a display wall processor today--each output card capable of driving two displays at up to 2560x1600 (Dual-Link DVI) digital, or up to 2048x1536 analog. With 11 GB/s of internal bandwidth and 256 MB of GDDR3 memory per card, the Fusion Catalyst can render complex application data while displaying multiple video or computer inputs simultaneously. All outputs are synchronized to eliminate “frame tearing” between displays.</p>
                          <hr>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Abundant, Powerful Inputs</h5>
                          <p>Fusion Catalyst display wall processors can be configured to specific direct input connection requirements. The Dual DVI-I input card handles input signals such as single- and dual-link DVI up to 2560x1600, analog VGA inputs up to 2048x1200, and component video progressive-scan HD inputs up to 1080p60.</p>
                          <p>The Octal SD Video input card handles up standard definition composite and S-Video inputs through a rackmountable input panel. It uses Jupiter’s motion-compensated de-interlacing and scaling engine to provide world class video quality, with scalable windows that are freely sized and placed on the display wall.</p>
                          <p>The Quad HD Decoder Card supports HD or SD streams in MPEG-2, MPEG-4, MJPEG, and H.264 formats. Most popular IP cameras and encoders are supported, as are desktop PC streams with real-time updates.</p>
                          <p>All input cards employ Jupiter’s proprietary communication technology, ensuring that each card can transmit and display input signals at full frame rate – no dropped frames regardless of output window size – while maintaining absolutely perfect visualization. In addition, each source can be placed into as many as four separately positioned and scaled windows, simultaneously. Overlap, PIP, multiple PIP – virtually any arrangement is possible without performance penalty.</p>
                          <hr>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Uniquely Engineered for Collaborative Visualization</h5>
                          <p>Jupiter Systems designs all its own software and hardware as an integrated whole, creating a tightly woven system architecture that provides the best functionality and achieves the highest possible performance. This provides Jupiter with a better foundation for supporting our products in the field – we have the sort of deep system knowledge that no integrator of 3rd party or COTS components can claim.</p>
                          <hr>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">System Availability</h5>
                          <p>Fusion Catalyst systems are designed for continuous 24/7 operation, specifically for the most demanding visualization environments where availability of critical decision support systems can literally mean life or death. To this end, the Fusion Catalyst 4000 features many redundant components including hot-swappable N+1 redundant power supplies, hot-swappable system fans, and hot-swappable disk drives configured as a RAID 1 array. The Fusion Catalyst 8000 adds hot-swappable input and output cards to that list. Hardware and software continuously monitor key system parameters such as ambient chassis temperature, CPU temperatures, power supply voltages, fan tachometers, and ECC memory performance, automatically alerting users to conditions that require direct intervention. System events are logged both in ControlPoint software and in the standard Windows event log.</p>
                          <hr>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">ControlPoint™ GUI, Protocol and API</h5>
                          <p>Fusion Catalyst is delivered with ControlPoint software standard. ControlPoint is a complete, integrated, and intuitive software solution for the control and management of the display wall processor. ControlPoint is a client/server based system: the server resides on the Fusion Catalyst processor directly accessing hardware functionality, whereas the client is installed on a network accessible PC running Windows XP/Vista/7. ControlPoint client and server communicate over a TCP/IP connection using an open, clear-text communications protocol: the ControlPoint protocol. ControlPoint protocol and supporting APIs can be used for custom applications and control. Simple applications using JavaScript and HTML can be generated in minutes. Using well-documented API, the complete power of the Fusion Catalyst processor is available to those who truly want a customized interface and complete control. An RS-232 gateway is provided for devices requiring serial communication.</p>
                          <p>
                          The ControlPoint client provides a consistent user interface to start, position, size, and scale application, DVI, RGB, HD, and SD video windows remotely via a network client.&nbsp;ControlPoint offers an object-based, drag and drop interface – defined objects such as DVI, RGB, HD, and Video inputs, Streaming Video inputs, web browsers, image viewers, and local and remote application windows can be dragged and dropped onto the display mimic. Setting up complex combinations of graphical and real-time data is simple, quick and intuitive. Toolbar shortcuts to commonly used functionality are provided to make adjustments to windows even more convenient.</p>
                          <p>ControlPoint provides the ability to save the state of the display wall into a layout, stored on the display processor, and to quickly recall saved layouts directly from the user interface or from user-assignable hot-keys. The number of layouts that can be stored is enormous, limited only by the size of the hard drive on the Fusion Catalyst.</p>
                          <p><a href="/resources/documents/InFocus-Jupiter-ControlPoint-with-ControlPoint-Security-Datasheet-EN.pdf" target="_blank">Download ControlPoint with ControlPoint Security Data Sheet</a></p>
                          <hr>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">Safeguard Operations with ControlPoint Security™</h5>
                          <p>Fusion Catalyst™ processors ship with ControlPoint Security™, airtight security tools indigenous to Jupiter’s ControlPoint™ wall management software suite. ControlPoint Security features Active Directory integration, providing secure login with the standard user name and password controlled by the customer’s IT department. With security defined at the object level, managers can create discrete management and access permissions for wall segments, layouts, inputs, applications, and remote cursor control. User activity and event logging are performed at sub-second resolution, allowing thorough forensic analysis.</p>
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
                                        <a data-event="Fusion-NMDOT-Case-Study" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-NMDOT-Case-Study-EN.pdf">
                                            <span class="title">Fusion NMDOT Case Study</span><br>
                                            <span class="description">Case study of the New Mexico Department of Transportation</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-NMDOT-Case-Study" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-NMDOT-Case-Study-EN.pdf">English</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Fusion-4500B" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500B-Datasheet-EN.pdf">
                                            <span class="title">Fusion Catalyst 4500B</span><br>
                                            <span class="description">Datasheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-4500B" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500B-Datasheet-EN.pdf">English</a></li>
                                                    <li><a data-event="Fusion-4500B" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500B-Datasheet-RU.pdf">Pусский</a></li>
                                                    <li><a data-event="Fusion-4500B" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500B-Datasheet-ES.pdf">Español</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Fusion-4500C" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500C-Datasheet-EN.pdf">
                                            <span class="title">Fusion Catalyst 4500C</span><br>
                                            <span class="description">Datasheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-4500C" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500C-Datasheet-EN.pdf">English</a></li>
                                                    <li><a data-event="Fusion-4500C" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500C-Datasheet-RU.pdf">Pусский</a></li>
                                                    <li><a data-event="Fusion-4500C" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500C-Datasheet-ES.pdf">Español</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Fusion-4500H" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500H-Datasheet-EN.pdf">
                                            <span class="title">Fusion Catalyst 4500H</span><br>
                                            <span class="description">Datasheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-4500H" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500H-Datasheet-EN.pdf">English</a></li>
                                                    <li><a data-event="Fusion-4500H" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500H-Datasheet-RU.pdf">Pусский</a></li>
                                                    <li><a data-event="Fusion-4500H" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Fusion-Catalyst-4500H-Datasheet-ES.pdf">Español</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Fusion-Catalyst-Quad-HD" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Quad-HD-Decoder-Card-Datasheet-EN.pdf">
                                            <span class="title">Quad HD Decoder Card</span><br>
                                            <span class="description">Datasheet</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Fusion-Catalyst-Quad-HD" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Quad-HD-Decoder-Card-Datasheet-EN.pdf">English</a></li>
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
