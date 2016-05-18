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
                    <a href="/display-walls/fusion-catalyst">Fusion Catalyst</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Fusion Catalyst</h1></div>
                <div>
                    <ul class="action-links Col_child">
                        <li></li>
                        <li><a class='btn form-box' style='display:block' href='/resources/forms/getaquote'>Get a Quote</a></li>
                        <li><a class='btn' href='/reseller-locator'>Find a Reseller</a></li>
                    </ul>
                </div>
            </div>

            <div class="C10 alternateDivChildL2">
                <div class="info">
                    <div class="image-set" style="float:right; margin-left: 1em;">
                        <img src="/resources/static/images/display-walls/fusion-catalyst1.jpg">
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
                          <a href="fusion-catalyst-4000"><h6 class="title">Fusion 4000</h6></a>
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
                          <a href="fusion-catalyst-4500"><h6 class="title">Fusion 4500</h6></a>
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
                          <a href="fusion-catalyst-8000"><h6 class="title">Fusion 8000</h6></a>
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
                          <a href="quad-hd-decoder-card-fusion-catalyst"><h6 class="title">Quad HD Decoder Card <br/>
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
                          <div class="image-set cmsedit" style="float: right; padding: 1em;">
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
                    </div>
                </div>
                <div id="details">
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 1em;">
                              <img src="/resources/static/images/display-walls/fusion-catalyst2.jpg" >
                          </div>
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
                    </div>
                    <div class="C6 alternateDivChildL2" style='float: left;'>
                      <div class="info cmsedit">
                          <h5 class="name">Watch the Fusion Catalyst video</h5>
                          <strong class="tagline"></strong>
                          <a href="http://www.jupiter.com/vef/load/69b42b2a69dba16a6ca90d2743824605?width=640px&amp;height=365" class="colorbox-load init-colorbox-load-processed cboxElement"><img class="video_thumbnail img-responsive" typeof="foaf:Image" src="http://www.jupiter.com/system/files/styles/video_thumbnail/private/video-thumbnails/Video_Still_FusionCatalyst2.jpg?itok=lCKoD1Xa" width="740" height="415" alt=""></a>
                          <hr/>
                      </div>
                    </div>
                    <div class="C6 alternateDivChildL2" style='float: left;'>
                      <div class="info cmsedit">
                          <h5 class="name">Supports both ControlPoint™ and Canvas</h5>
                          <strong class="tagline"></strong>
                          <p>ControlPoint™, Jupiter's display wall management software, provides an object-based, drag and drop interface. Objects such as DVI, RGB, HD, and video inputs, streaming video inputs, web browsers, image viewers, and local and remote application windows can be dragged and dropped anywhere on the display wall. Object-level security allows managers to create discrete management and access permissions for wall segments, layouts, inputs, applications, and remote cursor control. User activity and event logging allow thorough forensic analysis.</p>
                          <p>Fusion Catalyst display wall processors can be ordered with Canvas, Jupiter’s award-winning collaborative visualization software. Canvas enables video, data, applications, and more to be shared with colleagues anywhere, on any device, delivering end-to-end collaboration. Users can share streams and collaborate from anywhere in the network: at the main display wall, on PCs, and on iOS and Android smartphones and tablets. Canvas brings a rich set of familiar tools for collaboration and allows annotation directly on live video streams. Shared voice chat, Microsoft Lync® integration, and the ability to connect with SIP-based conferencing systems put the Fusion Catalyst running Canvas at the center of enterprise communications and collaboration.</p>
                          <hr/>
                      </div>
                    </div>
                    <div class="C6 alternateDivChildL2" style='float: left;'>
                      <div class="info cmsedit">
                          <h5 class="name">Fusion Catalyst in action</h5>
                          <strong class="tagline"></strong>
                          <p>The Fusion Catalyst Processor from Jupiter Systems is the perfect solution for control room projects requiring high performance and reliability in a cost effective, space efficient platform.</p>
                          <p>A Fusion Catalyst Display Wall Processor incorporates all of the visual data sources found in a control room environment and displays them in movable, scalable windows on a virtual display comprised of multiple output devices: monitors, LCD flat panels, plasma panels, projection cubes, or a rear projection system.</p>
                          <p>Data sources can include local applications, remote network applications, remote network RGB streams, compressed network video streams, directly connected SD and HD video, VGA, and DVI inputs. All data sources are accessed from an intuitive and consistent software interface providing complete control of the virtual display surface.</p>
                          <hr/>
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
