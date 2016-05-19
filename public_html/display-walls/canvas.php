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
                    <a href="/display-walls/">Display Walls</a> &gt;
                    <a href="/display-walls/canvas">Canvas</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C4x6_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Canvas</h1></div>
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
                    <img src="/resources/static/images/display-walls/160775957.jpg">
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
                            <li><strong>Supports Canvas CRS-4K</strong> - Jupiter’s new conference room system for Canvas, the <a href="/display-walls/canvas-crs4k">Canvas CRS-4K</a>, turns any conference room or huddle room into a Canvas workspace for teams. The new SimpleShare™ feature employs WebRTC technology to allow anyone with a laptop, even one without Canvas installed, to easily and instantly present content to local and remote Canvas users without downloading software, connecting cables, or attaching a dongle.</li>
                          </ul>
                          <hr/>
			                </div>
                    </div>
                </div>
                <div id="details">
                    <div class="C5 alternateDivChildL2" style="float:right;">
                        <div class="image-set cmsedit">
                            <img src="/resources/static/images/display-walls/canvas.jpg" >
                        </div>
                    </div>
                    <div class="C5 alternateDivChildL2" style="float:left;">
                        <div class="info cmsedit">
                      			<h5 class="name">Instant connection and access</h5>
                      			<strong class="tagline"></strong>
                            <p>Canvas transforms your computer, tablet or smartphone into a portable video wall to provide instant connection and access to essential visual information from anywhere. Share camera feeds, web pages, application screens and real time data for rapid, well-informed decision making.</p>
                            <hr/>
    			              </div>
                        <div class="info cmsedit">
                      			<h5 class="name">End-to-end collaboration</h5>
                      			<strong class="tagline"></strong>
                            <p>Canvas elevates teamwork to a level previously unimagined by enabling remote users to be both sources and destinations for visual information. Colleagues can annotate directly on live video streams as events unfold, empowering true end-to-end collaboration.</p>
                            <hr/>
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
                      </div>
                      <div style="clear: both; width:100%; display: block;"></div>
                      <hr>
                      <div class="C5 alternateDivChildL2" style="float:right;">
                            <div class="info cmsedit">
                          			<h5 class="name">Watch the Canvas video</h5>
                                <a href="http://www.jupiter.com/vef/load/a65fcace882c229ea0a725ce25fc65e6?width=640px&amp;height=365" class="colorbox-load init-colorbox-load-processed cboxElement"><img class="video_thumbnail img-responsive" typeof="foaf:Image" src="http://www.jupiter.com/system/files/styles/video_thumbnail/private/video-thumbnails/Video_Still_Canvas2_1.jpg?itok=bxT7uDqe" width="740" height="415" alt=""></a>
      			                </div>
                        </div>
                        <div class="C5 alternateDivChildL2" style="float:left;">
                            <div class="info cmsedit">
                          			<h5 class="name">A secure system</h5>
                          			<strong class="tagline"></strong>
                                <p>Canvas authenticates users via the customer’s own Windows Active Directory. User permissions, including access to specific sources and features are assigned and managed by the system administrator. Role-based security makes management of large numbers of users and permissions easy and flexible, according privileges to cadres of users sharing a common role in the enterprise.</p>
                                <p>Employing a superior security design, Canvas provides object-level security for all sources, eliminating inadvertent disclosure of restricted content. The system actively prevents users from sharing sources with any other user lacking appropriate permission.</p>
                                <p>Content and communications to and from mobile devices are encrypted, because you should feel as secure working in the field as you do in your office. Upstream video from mobile devices is encrypted with AES 128/256 encryption, including SHA-1, 80-bit authentication. Video sent downstream to mobile devices is protected with HTTP basic authentication and SSL encryption.</p>
      			                </div>
    			              </div>
                        <div style="clear: both; width:100%; display: block;"></div>
                        <hr>
                        <div class="C10 alternateDivChildL2">
                          <div class="info cmsedit">
                              <h5 class="name">Use your Canvas video wall for in-room presentations, too</h5>
                              <strong class="tagline"></strong>
                              <p>Your Canvas video wall can be used for displaying content for a local audience when not in a Canvas session. DVI inputs can be connected to a <a href="/display-walls/fusion-catalyst">Fusion Catalyst</a> display wall processor running Canvas for display on the attached video wall. Now the local video wall can be used for making in-room presentations or viewing other sources not intended for sharing and collaboration.    </p>
                              <hr/>
                          </div>
                          <div class="info cmsedit">
                              <h5 class="name">The Canvas system</h5>
                              <strong class="tagline"></strong>
                              <img alt="" class="img-responsive" src="http://www.jupiter.com/system/files/Canvas%20ecosystem%20diagram_Jan_2016.jpg">
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
