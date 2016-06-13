<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Canvas</title>
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
                    <a href="/collaborative-visualization/canvas">Jupiter Canvas</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Jupiter Canvas</h1></div>
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
                    <img src="/resources/static/images/display-walls/160775957.jpg" style="float:none;">
                    <img src="/resources/static/images/infocomm/Canvas5-Catalyst4K-INFO16-BestofShow-AVT-Winner.jpg" style="float:none;max-width:90%;margin:2rem auto 1rem;">
                </div>
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">The world's most powerful collaborative visualization tool.</strong>
                    <div class="mysqledit" id="blurb">
                        <p><strong>See and engage every corner of the enterprise, from anywhere, on any device.</strong></p>
                        <p>Sharing a common operating picture is essential to effective management. Canvas enables video, data, applications, and more to be shared with colleagues anywhere, on any device, delivering end-to-end collaboration. Live H.264 video streams, VNC viewer windows, active web browser windows, and desktop presentation screens.</p>
                        <p>Users can share streams and collaborate from anywhere in the network: at the main display wall, on PCs, and on iOS and Android smartphones and tablets. Canvas brings a rich set of familiar tools for collaboration and allows them to be used in ways that no other system can. And, unique in the industry, Canvas allows users to annotate directly on live video streams. Create shared whiteboards for brainstorming.</p>
                        <p>With Canvas, smartphones and tablets can also be sources. Point the mobile device camera at anything and share live video with remote colleagues. View the scene in front of you as well as an overlay of information from experts at other sites.</p>
                        <p>No matter what needs attention or who sees it first, any situation captured in a stream can be shared quickly and easily with team members, regardless of their location.</p>
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
                <?php if (PRESS_RELEASE_2016JUNE2) { ?>
                  <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                        <div class="image-set cmsedit" style="float: right; padding: 1em; max-width: 350px;">
                          <img src="/resources/static/images/display-walls/canvas.jpg" >
                        </div>
                        <h5 class="name">New in Canvas 5.0</h5>
                        <p><strong>Enhanced features offer better ease of use, more flexibility, and an intuitive object-based, drag and drop interface.</strong></p>
                        <ul class="feature-list">
                          <li>Flexible and secure across Workgroup and Active Directory environments</li>
                          <li>Continued support of Active Directory for user authentication</li>
                          <li>Now also supports Workgroup environments so users who prefer not to use Active Directory can employ their own authentication protocols</li>
                          <li>Manage applications anywhere with the expanded capabilities of web-based Mimic Touch software</li>
                          <li>Includes the powerful features of ControlPoint for display wall management</li>
                          <li>Create layouts, access Canvas sources, and control images, text, web-based content, DVI windows, and other applications</li>
                          <li>Drag and drop video and data windows anywhere on the display wall</li>
                          <li>Juxtapose sources in order to get full 360-degree view of ops</li>
                          <li>Save and recall layouts appropriate for specific situations, users, or time of day</li>
                        </ul>
                        <p><strong>Cost effective and efficient native CPU based decoding with the <a href="/collaborative-visualization/catalyst-4k">Catalyst 4K</a> display wall processor.</strong></p>
                        <ul class="feature-list">
                          <li>For H.264, simultaneously decode 8 HD streams or 2 UHD streams</li>
                          <li>For H.265, simultaneously decode 8 HD streams or 2 UHD streams</li>
                        </ul>
                        <p><strong>Canvas 5.0 now ships standard with <a href="/collaborative-visualization/catalyst-4k">Catalyst 4K</a>, bringing 4K and 1080p HD sources together on one video wall.</strong></p>
                        <ul class="feature-list">
                          <li>Available as an upgrade to earlier Fusion Catalyst 1000, 4000, 8000, and 4500 systems</li>
                          <li>Canvas 5.0 replaces ControlPoint and previous versions of Canvas</li>
                        </ul>
                        <hr>
                      </div>
                      <div class="info cmsedit">
                        <h5 class="name">Instant Connection And Access</h5>
                        <p>Canvas transforms your computer, tablet or smartphone into a portable video wall to provide instant connection and access to essential visual information from anywhere. Share camera feeds, web pages, application screens and real time data for rapid, well-informed decision making.</p>
                        <hr>
                      </div>
                      <div class="info cmsedit">
                        <h5 class="name">End-To-End Collaboration</h5>
                        <p>Canvas elevates teamwork to a level previously unimagined by enabling remote users to be both sources and destinations for visual information. Colleagues can annotate directly on live video streams as events unfold, empowering true end-to-end collaboration.</p>
                        <hr>
                      </div>
                      <div class="info cmsedit">
                        <h5 class="name">Collaboration, Evolved</h5>
                        <p>Canvas enables managers to annotate directly on live video shared with remote colleagues across a broad array of devices.</p>
                        <ul class="feature-list">
                          <li>Circle, label, identify, or annotate areas of interest on live video</li>
                          <li>Use the keyboard to type comments directly on live video</li>
                          <li>Drag shapes from the toolbar to any area in the video to be resized, colored and titled</li>
                          <li>Create whiteboards for brainstorming</li>
                        </ul>
                        <hr>
                      </div>
                    </div>
                    <div class="C10 alternateDivChildL2" style="clear:both;">
                      <div class="cmsedit info">
                        <h5 class="name">Watch The Canvas Video</h5>
                        <a href="//www.infocus.com/videos?Hr02fvMVmF0" class="colorbox-load init-colorbox-load-processed cboxElement"><img class="video_thumbnail" typeof="foaf:Image" src="//www.infocus.com/resources/images/InFocus-Jupiter-Canvas-5-Video-Teaser.png" width="740" alt=""></a>
                      </div>
                      <hr>
                    </div>
                    <div class="C10 alternateDivChildL2" style="clear:both;">
                      <div class="cmsedit info">
                        <h5 class="name">A Secure System</h5>
                        <p>Canvas authenticates users via the customer’s own Windows Active Directory. User permissions, including access to specific sources and features are assigned and managed by the system administrator. Role-based security makes management of large numbers of users and permissions easy and flexible, according privileges to cadres of users sharing a common role in the enterprise.</p>
                        <p>Employing a superior security design, Canvas provides object-level security for all sources, eliminating inadvertent disclosure of restricted content. The system actively prevents users from sharing sources with any other user lacking appropriate permission.</p>
                        <p>Content and communications to and from mobile devices are encrypted, because you should feel as secure working in the field as you do in your office. Upstream video from mobile devices is encrypted with AES 128/256 encryption, including SHA-1, 80-bit authentication. Video sent downstream to mobile devices is protected with HTTP basic authentication and SSL encryption.</p>
                      </div>
                      <hr>
                    </div>
                    <div class="C10 alternateDivChildL2" style="clear:both;">
                      <div class="cmsedit info">
                        <h5 class="name">Use Your Canvas Video Wall For In-Room Presentations, Too</h5>
                        <p>Your Canvas video wall can be used for displaying content for a local audience when not in a Canvas session. DVI inputs can be connected to a Fusion Catalyst display wall processor running Canvas for display on the attached video wall. Now the local video wall can be used for making in-room presentations or viewing other sources not intended for sharing and collaboration.</p>
                        <hr>
                      </div>
                      <div class="cmsedit info">
                        <h5 class="name">The Canvas System</h5>
                        <img alt="" class="img-responsive" src="http://www.jupiter.com/system/files/Canvas%20ecosystem%20diagram_Jan_2016.jpg" style="width:auto;max-width:100%">
                      </div>
                    </div>
                <?php } else { ?>
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 1em; max-width: 350px;">
                              <img src="/resources/static/images/display-walls/canvas.jpg" >
                          </div>
                    			<h5 class="name">New in Canvas 3.1</h5>
                    			<strong class="tagline"></strong>
                          <p>Canvas 3.1 delivers new, advanced communications and presentation features, as well as integrations with major unified communication and collaboration platforms, to make this edition of Canvas the most powerful solution of its kind.</p>
                          <p>New features of the updated Canvas 3.1 software include:</p>
                          <ul class="feature-list">
                          	<li><strong>Shared voice chat</strong> - All Canvas participants are automatically enrolled in a shared voice chat room to facilitate collaboration and teamwork.</li>
                            <li><strong>Microsoft Lync&reg; integration</strong> - Integration with the leading UCC platform means that users can escalate to Canvas from the Lync client or start a Lync conversation from Canvas.</li>
                            <li><strong>Connect with remote non-Canvas users</strong> - Remote colleagues who do not have Canvas at their location can participate in collaborative sessions with Canvas users.  With this new version, Canvas users can dial out to users of SIP-based conferencing systems, and allows users of SIP-based conferencing systems to dial into a canvas.</li>
                            <li><strong>Supports Canvas CRS-4K</strong> - Jupiter’s new conference room system for Canvas, the <a href="/collaborative-visualization/canvas-crs4k">Canvas CRS-4K</a>, turns any conference room or huddle room into a Canvas workspace for teams. The new SimpleShare™ feature employs WebRTC technology to allow anyone with a laptop, even one without Canvas installed, to easily and instantly present content to local and remote Canvas users without downloading software, connecting cables, or attaching a dongle.</li>
                          </ul>
			                </div>
                    </div>
                <?php } ?>
                </div>
                <div id="details">
                <?php if (PRESS_RELEASE_2016JUNE2) { ?>
                    <div class="C10">
                      <div class="cmsedit info">
                        <iframe style="position:relative;z-index:100;float:right;display:block;margin:1em;max-width:100%;" width="560" height="315" src="https://www.youtube.com/embed/kjVCe1-mZ9g?rel=0" frameborder="0" allowfullscreen></iframe>
                        <h5 class="name">Uniquely adaptable</h5>
                        <p>Canvas defines flexibility, supporting a broad range of common networks and applications, as well as unique customizations.</p>
                        <ul class="feature-list">
                          <li>Supports most enterprise LAN and WAN network configurations</li>
                          <li>Supports 4G mobile networks</li>
                          <li>Supports integration with popular UCC platforms and VMS systems</li>
                          <li>Robust API permits the creation of customized features and integrations</li>
                        </ul>
                      </div>
                    </div>
                    <div class="C10 alternateDivChildL2" style="clear:both;">
                      <hr>
                      <div class="cmsedit info">
                        <h5 class="name">Airtight security</h5>
                        <p>Canvas reduces the risk of inadvertent disclosure of secure content and improper system usage with object-level security. User access and authentication are managed by your native Active Directory system.</p>
                        <ul class="feature-list">
                          <li>Supports Windows Single Sign-On (SSO)</li>
                          <li>User permissions, including access to specific sources and operations, are assigned and managed by the system administrator.</li>
                          <li>Role-based security makes management of large numbers of users and permissions easy and flexible</li>
                        </ul>
                        <hr>
                      </div>
                      <div class="cmsedit info">
                        <h5 class="name">Easy to own</h5>
                        <p>Adding Canvas is easy. Just order the number of Canvas Clients desired for PCs, smartphones, or tablets, the Canvas Server software, and the Canvas Media Server if using mobile clients. If your plans call for a video wall, order the Fusion Catalyst display wall processor. You add the network, PCs, iOS and Android smartphones and tablets, server hardware, and your streaming sources. There are no hidden costs and no complex pricing schemes with essential features offered as added cost “options.” Every Canvas system is fully featured.</p>
                        <hr>
                      </div>
                      <div class="cmsedit info">
                        <h5 class="name">System Requirements and Specifications</h5>
                        <strong class="tagline mysqledit">Canvas Client</strong>
                        <p>
                          <strong>CPU:</strong> PC: Intel Core 2 Duo 2.4GHz or equivalent<br>
                          <strong>RAM:</strong> 4GB RAM, minimum<br>
                          <strong>Operating System:</strong> Windows 7 Pro
                        </p>
                        <br>
                        <strong class="tagline mysqledit">Canvas Server</strong>
                        <p>
                          <strong>CPU:</strong> Intel Xeon 2.4 GHz or equivalent<br>
                          <strong>HDD:</strong> 20GB, minimum<br>
                          <strong>RAM:</strong> 4GB RAM, minimum<br>
                          <strong>Operating System:</strong> Windows 7 32-bit Pro, Windows 7 64-bit Ultimate, Windows Server 2008
                        </p>
                        <br>
                        <strong class="tagline mysqledit">Canvas iOS Client</strong>
                        <p>
                          <strong>OS:</strong> iOS 6.1 or later<br>
                          <strong>Devices:</strong><br>
                          iPhone 4, 4S, 5, or later<br>
                          iPad 2nd Gen, 3rd Gen, 4th Gen, or later<br>
                          iPad Mini 1st Gen or later
                        </p>
                        <br>
                        <strong class="tagline mysqledit">Canvas Android Client</strong>
                        <p>
                          <strong>OS:</strong> Jelly Bean, or later<br>
                          <strong>Devices:</strong> Android smartphones and tablets
                        </p>
                        <br>
                        <strong class="tagline mysqledit">Supported Streams</strong>
                        <p>
                          <strong>Video Streams:</strong> H.264, H.265 (4K), H.264 (1080p), Real Video (720p), Divx 4/5/6 (1080p), Xvid (1080p), WMV7/8 (SD), Divx 3 (720p), VP6 (CIF), VC1 (1080p), MPEG-1 (1080p), MPEG-2 (1080p), MPEG-4 (720p), H263<br>
                          <strong>Desktop Streams:</strong> VNC (only on PC and Video Wall clients)
                        </p>
                        <br>
                        <strong class="tagline mysqledit">Network</strong>
                        <p>
                          <strong>LAN/WAN:</strong> Gigabit Ethernet, TCP/IP<br>
                          <strong>Wireless:</strong> Wi-Fi, 4G/LTE<br>
                          <strong>Active Directory:</strong> Canvas Server utilizes customer’s Active Directory server for user authentication.<br>
                          <strong>Capacity:</strong> The Canvas system can run on many indigenous enterprise networks. Bandwidth requirements are dependent on number and types of streams. Maximum performance is assured with a dedicated video network and appropriately selected routers.
                        </p>
                      </div>
                    </div>
                <?php } else { ?>
                    <div class="C10 alternateDivChildL2">
                        <div class="info cmsedit">
                            <div class="image-set cmsedit" style="float:right; margin-left: 1em; padding: 0 1em 1em;">
                                <img src="/resources/static/images/display-walls/canvas.jpg" >
                            </div>
                      			<h5 class="name">Instant connection and access</h5>
                      			<strong class="tagline"></strong>
                            <p>Canvas transforms your computer, tablet or smartphone into a portable video wall to provide instant connection and access to essential visual information from anywhere. Share camera feeds, web pages, application screens and real time data for rapid, well-informed decision making.</p>
                            <hr/>
    			              </div>
                        <div class="info cmsedit">
                      			<h5 class="name">End-to-end collaboration</h5>
                      			<strong class="tagline"></strong>
                            <p>Canvas elevates teamwork to a level previously unimagined by enabling remote users to be both sources and destinations for visual information. Colleagues can annotate directly on live video streams as events unfold, empowering true end-to-end collaboration.</p>
                            <hr style="clear:both;"/>
  			                </div>
                        <div class="info cmsedit">
                      			<h5 class="name">Collaboration, evolved</h5>
                      			<strong class="tagline"></strong>
                            <p>Canvas enables managers to annotate directly on live video shared with remote colleagues across a broad array of devices.</p>
                            <ul class="feature-list">
                            	<li>Circle, label, identify, or annotate areas of interest on live video</li>
                              <li>Use the keyboard to type comments directly on live video</li>
                              <li>Drag shapes from the toolbar to any area in the video to be resized, colored and titled</li>
                              <li>Create whiteboards for brainstorming</li>
                            </ul>
  			                </div>
                        <hr style="clear:both;"/>
                    </div>
                    <div class="C10 alternateDivChildL2">
                        <div class="info cmsedit">
                      			<h5 class="name">Watch the Canvas video</h5>
                            <a href="//www.infocus.com/videos?kjVCe1-mZ9g" class="colorbox-load init-colorbox-load-processed cboxElement"><img class="video_thumbnail img-responsive" typeof="foaf:Image" src="http://www.jupiter.com/system/files/styles/video_thumbnail/private/video-thumbnails/Video_Still_Canvas2_1.jpg?itok=bxT7uDqe" style="width:740px;max-width:100%;" alt=""></a>
  			                </div>
                        <hr style="clear:both;"/>
                    </div>
                    <div class="C10 alternateDivChildL2">
                        <div class="info cmsedit">
                      			<h5 class="name">A secure system</h5>
                      			<strong class="tagline"></strong>
                            <p>Canvas authenticates users via the customer’s own Windows Active Directory. User permissions, including access to specific sources and features are assigned and managed by the system administrator. Role-based security makes management of large numbers of users and permissions easy and flexible, according privileges to cadres of users sharing a common role in the enterprise.</p>
                            <p>Employing a superior security design, Canvas provides object-level security for all sources, eliminating inadvertent disclosure of restricted content. The system actively prevents users from sharing sources with any other user lacking appropriate permission.</p>
                            <p>Content and communications to and from mobile devices are encrypted, because you should feel as secure working in the field as you do in your office. Upstream video from mobile devices is encrypted with AES 128/256 encryption, including SHA-1, 80-bit authentication. Video sent downstream to mobile devices is protected with HTTP basic authentication and SSL encryption.</p>
  			                </div>
                        <hr style="clear:both;"/>
			              </div>
                    <div class="C10 alternateDivChildL2">
                      <div class="info cmsedit">
                          <h5 class="name">Use your Canvas video wall for in-room presentations, too</h5>
                          <strong class="tagline"></strong>
                          <p>Your Canvas video wall can be used for displaying content for a local audience when not in a Canvas session. DVI inputs can be connected to a <a href="/collaborative-visualization/fusion-catalyst">Fusion Catalyst</a> display wall processor running Canvas for display on the attached video wall. Now the local video wall can be used for making in-room presentations or viewing other sources not intended for sharing and collaboration.    </p>
                          <hr style="clear:both;"/>
                      </div>
                      <div class="info cmsedit">
                          <h5 class="name">The Canvas system</h5>
                          <strong class="tagline"></strong>
                          <img alt="" class="img-responsive" src="http://www.jupiter.com/system/files/Canvas%20ecosystem%20diagram_Jan_2016.jpg">
                      </div>
                    </div>
                <?php } ?>
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
                                        <a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Datasheet-EN.pdf">
                                            <span class="title">Canvas Brochure</span><br>
                                            <span class="description">Benefits and specifications for Canvas</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Datasheet-EN.pdf">English</a></li>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Datasheet-EU.pdf">Intl English</a></li>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Datasheet-ES.pdf">Español</a></li>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Datasheet-AR.pdf">العربية</a></li>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Datasheet-RU.pdf">русский</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td><img src="/resources/images/pdficon"></td>
                                    <td>
                                        <a data-event="Jupiter-Canvas-Customer-Sample" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Customer-List-EN.pdf">
                                            <span class="title">Canvas Customers</span><br>
                                            <span class="description">Canvas Customers Sample List</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Jupiter-Canvas-Customer-Sample" href="//www.infocus.com/resources/documents/InFocus-Jupiter-Canvas-Customer-List-EN.pdf">English</a></li>
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
