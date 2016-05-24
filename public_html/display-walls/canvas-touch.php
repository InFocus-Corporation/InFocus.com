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
                <div><h1 class="mysqledit h2" id="pagetitle">InFocus Canvas Touch&trade;</h1></div>
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
                    <img src="/resources/images/InFocus-Canvas-Touch-Architecture.jpg">
                </div>
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">The Essential Endpoint for Your Canvas Environment</strong>
                    <div class="mysqledit" id="blurb">
                        <p>Canvas Touch extends the power of Canvas’ award-winning visualization solution to conference rooms, huddle spaces, personal offices, or anywhere else groups meet and collaborate.</p>
                        <p>Use the powerful touchscreen interface of Canvas Touch to collaborate with remote colleagues that run <a href="/display-walls/canvas">Canvas</a>, including sharing live video, real-time data, application screens, web windows, documents, and presentations.</p>
                    </div>
                </div>
                <ul class="feature-list" style="padding-bottom:50px; width:38%;">
                    <li>View and interact with Canvas video and data wherever you collaborate</li>
                    <li>Supports viewing of up to 6 simultaneous sources</li>
                    <li>57-, 65-, and 70-inch models offer vivid 1080p HD resolution</li>
                    <li>80-inch model offers detailed 4K resolution</li>
                    <li>65-inch model offers ultra-responsive capacitive touch</li>
                    <li>Highly customizable for your needs and your PC applications</li>
                    <li>Web-based interface provides easy control of canvas placement and resizing, as well as video previews</li>
                </ul>

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
                              <img src="/resources/static/images/display-walls/Canvas-Touch-Hero.png" style="width:500px" >
                          </div>
                                <h5 class="name">Real Collaboration, Real Work</h5>
                                <strong class="tagline"></strong>
                          <p>Developed specifically for the meeting room, Canvas Touch presents a comprehensive view of operations and enables your colleagues around the world to work together as if they were in the same room.</p>
                          <p>Display up to six simultaneous sources from your Canvas environment, including:</p>
                          <ul class="feature-list">
                            <li><strong>H.264 video streams</strong></li>
                            <li><strong>VNC viewer windows</strong></li>
                            <li><strong>SimpleShare&trade; windows</strong></li>
                          </ul>
                          <p>All of Canvas’ rich collaboration tools are available so users can annotate on-screen, share whiteboards, and jointly edit documents, spreadsheets, and presentations.</p>
                                <h5 class="name">Wirelessly Share Information</h5>
                                <strong class="tagline"></strong>
                          <p>Users can wirelessly present content from their laptop to Canvas Touch by using SimpleShare technology, even if it does not have Canvas installed.</p>
                          <p>They can present their entire desktop or selected application window to both local and remote Canvas participants.</p>
                                <h5 class="name">The Power Of Touch</h5>
                                <strong class="tagline"></strong>
                          <p>Touchscreens bring information to life. Canvas Touch employs a beautiful 57-, 65-, 70-, or 80-inch interactive display that empowers teams with hands-on access to critical Canvas video and data.</p>
                          <ul class="feature-list">
                            <li><strong>Show off your content with brightness, color, and clarity with 4K (80-inch model only) or 1080p HD resolution</strong></li>
                            <li><strong>Exceptionally accurate touches, swipes, and gestures with capacitive touch (65-inch model only)</strong></li>
                            <li><strong>Perform Windows gestures, such as tap, slide, swipe, pinch, and rotate to get a global view of everything on the screen</strong></li>
                            <li><strong>Wireless keyboard and mouse included to easily control the display from your seat</strong></li>
                          </ul>
                                <h5 class="name">Powered By Windows 10</h5>
                                <strong class="tagline"></strong>
                          <p>The 80-inch Canvas Touch model is built on Windows 10, offering the performance and flexibility you need for all of your applications. Windows 10 provides an elegant interface that leverages familiar aspects of previous Windows operating systems so that everyone can intuitively use it, plus new features that you'll love.</p>
                          <ul class="feature-list">
                            <li><strong>The Windows Start menu is back in an expanded form, so you can dive in immediately</strong></li>
                            <li><strong>New Battery Saver feature automatically conserves power</strong></li>
                            <li><strong>Available as a software upgrade on the 57-, 65-, and 70-inch models</strong></li>
                          </ul>
                        </div>
                    </div>
                </div>
                <div id="details">
                    <table id="table-comparison">
                        <thead>
                            <tr>
                                <th class="model"></th>
                                <th class="model">57-inch</th>
                                <th class="model">65-inch</th>
                                <th class="model">70-inch</th>
                                <th class="model">80-inch</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Resolution</td>
                                <td>1080p (1920 x 1080)</td>
                                <td>1080p (1920 x 1080)</td>
                                <td>1080p (1920 x 1080)</td>
                                <td>4k (3840 x 2160)</td>
                            </tr>
                            <tr>
                                <td>Touch Technology</td>
                                <td>IR</td>
                                <td>Capacitive</td>
                                <td>IR</td>
                                <td>IR</td>
                            </tr>
                            <tr>
                                <td>Hard Drive</td>
                                <td>120 GB</td>
                                <td>128 GB</td>
                                <td>120 GB</td>
                                <td>256 GB</td>
                            </tr>
                            <tr>
                                <td>Operating System</td>
                                <td>Windows 8.1 Pro</td>
                                <td>Windows 7 Pro 64 bit</td>
                                <td>Windows 8.1 Pro</td>
                                <td>Windows 10 Pro</td>
                            </tr>
                        </tbody>
                    </table>
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
                                        <a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Canvas-Touch-Datasheet-EN.pdf">
                                            <span class="title">Canvas Touch</span><br>
                                            <span class="description">Conference Room System</span>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="langlist">
                                            <li>
                                                Choose Language
                                                <ul>
                                                    <li><a data-event="Jupiter-Canvas-Datasheet" href="//www.infocus.com/resources/documents/InFocus-Canvas-Touch-Datasheet-EN.pdf">English</a></li>
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
