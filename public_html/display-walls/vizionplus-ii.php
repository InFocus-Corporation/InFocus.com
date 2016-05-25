<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | VizionPlus II</title>
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
                    <a href="/display-walls/vizionplus-ii">Jupiter VizionPlus II</a>
                </ol>
            </div>
            <div class="productheader C10 Col_child C6x4_child">
                <div><h1 class="mysqledit h2" id="pagetitle">Jupiter VizionPlus II</h1></div>
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
                    <img src="/resources/static/images/display-walls/169263611.jpg">
                </div>
                <div class="info" style="float:left;">
                    <strong class="tagline mysqledit" id="header">Designed and manufactured for military operations</strong>
                    <div class="mysqledit" id="blurb">
                        <p><strong>VizionPlus II™ Display Wall Processor</strong></p>
                        <p>VizionPlus II™ is the newest version of the go-to display wall processor already deployed in thousands of US military installations worldwide. Ushering in a new era of performance and flexibility for collaborative visualization applications, VizionPlus II employs cutting edge, second generation PCI Express technology that offers up to an astonishing 40 Gbps of bandwidth. That's enough bandwidth to carry multiple ultra-high resolution video signals at a full 60 frames per second, drive ultra-high resolution monitors at a full 32 bits per pixel, and support virtually any configuration requirement. VizionPlus II is also a PC, with an Intel Core 2 Duo CPU, 8 GB of RAM, and a 500 GB hard drive. (256 GB solid state drive available as option.)  Run mission critical apps, access data through the network, engage the information, and collaborate on a wall-sized desktop.</p>
                    </div>
                </div>
            </div>
            <div class="tabs">
                <nav role="navigation" class="C10 transformer-tabs tabs-wrapper">
                    <ul>
                        <li><a href="#overview" class="active">Overview</a></li>
                    </ul>
                </nav>
                <div id="overview" class="active">
                    <div class="C5 alternateDivChildL2" style="float:right;">
                      <div class="info cmsedit">
                          <div class="image-set cmsedit" style="float: right; padding: 1em;">
                              <img src="/resources/static/images/display-walls/Product_VizionPlus.jpg" >
                          </div>
                      </div>
                    </div>
                    <div class="C5 alternateDivChildL2" style="float:left;">
                      <div class="info cmsedit">
                        <h5 class="name">Information When and Where It's Needed</h5>
                        <strong class="tagline"></strong>
                        <p>A VizionPlus II Display Wall Processor incorporates all of the visual data sources found in the operations center environment and displays them in moveable, scalable windows on a virtual display comprised of multiple output devices: LCD flat panels, plasma panels, projectors, or projection cubes. Data sources can include local applications, remote network applications, remote network RGB streams, IP video streams, directly connected SD and HD video, VGA, DVI inputs.  All data sources are accessed from an intuitive and consistent software interface providing complete control of the virtual display surface.</p>
                        <hr/>
                      </div>
                      <div class="info cmsedit">
                        <h5 class="name">Tested, Trusted, Reliable</h5>
                        <strong class="tagline"></strong>
                        <p>VizionPlus II is designed for continuous, 24x7 operation in command and control settings, both tactical and strategic. Jupiter's high performance display wall processors are used in military operations around the world to provide the common operating picture so critical to decision making. Built for a wide range of applications, Jupiter products have been adapted for battlespace requirements on land, sea, and air. To develop situational awareness, you need to be able to see everything available-video, data, images, maps, and more. That's what Jupiter delivers. Jupiter products are used by the US Army, US Navy, US Marine corps, US Air Force, CIA and NSA, as well as in the Pentagon. Jupiter display wall processors are also employed by NATO, in addition to other military organizations on nearly every continent. VizionPlus II is built in Jupiter's ISO 9001:2008 certified factory in Hayward, California.</p>
                        <p>The VizionPlus II is built specifically for the military and its unique applications and is not available to the general commercial market.</p>
                        <p>For more information, please contact your local <a class="contact-us" href="/resources/forms/contactus">Jupiter Systems sales representative</a>.</p><br/>
                        <hr/>
                    </div>
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
