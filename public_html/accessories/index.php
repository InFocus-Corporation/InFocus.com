<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/accessories/"/>' . PHP_EOL;
?>
<?php echo $pageText['meta'];?>

<script>
(function($){
  $.fn.reveal = function(){
    var args = Array.prototype.slice.call(arguments);
    return this.each(function(){
      var img = $(this),
      src = img.data("src");
      src && img.attr("src", src).load(function(){
        img[args[0]||"show"].apply(img, args.splice(1));
      });
    });
  }
}(jQuery));

var currentTallest = 0,
currentRowStart = 0,
rowDivs = new Array(),
$el,
topPosition = 0;

function resizeRows(){
  $('#categories .floatList').children().each(function() {

    $el = $(this);
    // console.log($el);
    $el.removeAttr('style');
    // $el.attr('style', '');
    if($el.height() == 0){return;}
    topPostion = $el.position().top;

    if (currentRowStart != topPostion) {
      // we just came to a new row.  Set all the heights on the completed row
      for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
        rowDivs[currentDiv].height(currentTallest);
      }
      // set the variables for the new row
      rowDivs.length = 0; // empty the array
      currentRowStart = topPostion;
      currentTallest = $el.height();
      rowDivs.push($el);
    } else {
      // another div on the current row.  Add it to the list and check if it's taller
      rowDivs.push($el);
      currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
    }
    // do the last row
    for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
      rowDivs[currentDiv].height(currentTallest);
    }
  });
}


window.onresize = function(event) {
  resizeRows();
}

</script>
<style>
a:hover{
  cursor:pointer;
}

</style>

</head>
<body class="accsr">
  <?php include($homedir . "/resources/html/mainmenu.html"); ?>

  <div class="content">
    <div id="category" class="C9">

      <h2 id="cattitle" class="title" style=""><?= translate('Accessories');?></h2>

      <div class="C10 Col_child C5_child" >
        <div class="image-set" style="float:right;">
          <image id="catimage" src="<?= imagethumb('category-accessories','520');?>"/>
          </div>
          <div class="info">
            <h4 class="tagline" id="cattag">
              <?= $pageText['tagline'] ;?>
            </h4>
            <div id="catdesc">
              <?= $pageText['description'] ;?>
            </div>

            <ul class="action-links Col_child" style="padding:1em;text-align:left;"><li><a class="btn" href="/reseller-locator">
              <?= translate('Where to Buy') ;?>
            </a></li></ul>
          </div></div>
          <a id="categoriesstart"></a>
          <div id="details" class="C10 tabs-wrapper" style="min-height:600px;overflow:hidden;padding-top:50px;">
            <div class="tab-shadow"></div>
            <div id="categories"  style="overflow:hidden;float:left;">
              <ul class="floatList" style="overflow:hidden">
                <li>
                  <div>
                    <a href="/accessories/mondopad-accessories"><section class="stretch-wrap60">
                      <div><img src="<?php echo imagethumb('mpbtaccessories','135');?>" alt="<?php echo translate('Accessories for');?><br>Mondopad <?php echo translate('and');?> BigTouch"/></div></section>
                      <span id="mpbtaccessories" class="title"><?= translate('Accessories for');?><br>Displays</span></a>
                      <div class="description"><?= $pageText['mpbtaccessories'];?></div>
                      <span class="accesories_button_wrapper"><a href="/accessories/mondopad-accessories" class="view-all" ><?= translate('View All');?></a>

                        <?php if($lang != "de"){
                          echo '<a href="https://infocusdirect.com/" >'. translate('Go to Store') . '</a>';
                        }
                        ?>
                      </span>
                    </div>
                  </li>
                  <li>
                    <div>
                      <a href="/accessories/cables"><section class="stretch-wrap60">
                        <div><img src="<?= imagethumb('cables','192');?>" alt="<?= translate('Cables and Adapters');?>"/></div></section>
                        <span id="cables" class="title"><?= translate('Cables and Adapters');?></span></a><div class="description"><?= $pageText['cables'];?></div>
                        <span class="accesories_button_wrapper"><a href="/accessories/cables" class="inbound view-all" ><?= translate('View All');?></a>

                          <?php if($lang != "de"){
                            echo '<a href="https://www.infocusdirect.com/accessories/cables-and-adapters" >'. translate('Go to Store') . '</a>';
                          }
                          ?>
                        </span></div></li><li><div>
                          <a href="/accessories/cases"><section class="stretch-wrap60">
                            <div ><img src="<?= imagethumb('cases','192');?>" alt="<?= translate('Cases');?>"/></div></section>
                            <span id="cases" class="title"><?= translate('Cases');?></span></a>
                            <div class="description"><?= $pageText['cases'];?></div>
                            <span class="accesories_button_wrapper"><a href="/accessories/cases" class="inbound view-all"><?= translate('View All');?></a>

                              <?php if($lang != "de"){
                                echo '<a href="https://www.infocusdirect.com/Accessory/Cases" >'. translate('Go to Store') . '</a>';
                              }
                              ?>
                            </span></div></li><li><div>
                              <a href="/accessories/lamps" ><section class="stretch-wrap60">
                                <div ><img src="<?= imagethumb('lamps','192');?>" alt="<?= translate('Lamps');?>"/></div></section>
                                <span id="lamps" class="title"><?= translate('Lamps');?></span></a>
                                <div class="description"><?= $pageText['lamps'];?></div>
                                <span class="accesories_button_wrapper"><a href="/accessories/lamps" class="view-all"><?= translate('View All');?></a>

                                  <?php if($lang != "de"){
                                    echo '<a href="https://www.infocusdirect.com/Accessory/Lamps" >'. translate('Go to Store') . '</a>';
                                  }
                                  ?>
                                </span></div></li><li><div>
                                  <a href="/accessories/lenses" ><section class="stretch-wrap60">
                                    <div  ><img src="<?= imagethumb('lenses','192');?>" alt="<?= translate('Lenses');?>"/></div></section>
                                    <span id="lenses" class="title"><?= translate('Lenses');?></span></a>
                                    <div class="description"><?= $pageText['lenses'];?></div>
                                    <span class="accesories_button_wrapper"><a href="/accessories/lenses" class="view-all"><?= translate('View All');?></a>

                                      <?php if($lang != "de"){
                                        echo '<a href="https://www.infocusdirect.com/Accessory/Lenses" >'. translate('Go to Store') . '</a>';
                                      }
                                      ?>
                                    </span></div></li><li><div>
                                      <a href="/accessories/misc"><section class="stretch-wrap60">
                                        <div ><img src="<?= imagethumb('misc','192');?>" alt="<?= translate('Miscellaneous');?>"/></div></section>
                                        <span id="misc" class="title"><?= translate('Miscellaneous');?></span></a>
                                        <div class="description"><?= $pageText['misc'];?></div>
                                        <span class="accesories_button_wrapper"><a href="/accessories/misc" class="view-all"><?= translate('View All');?></a>

                                          <?php if($lang != "de"){
                                            echo '<a href="https://www.infocusdirect.com/Accessory/Misc" >'. translate('Go to Store') . '</a>';
                                          }
                                          ?>
                                        </span></div></li><li><div>
                                          <a href="/accessories/mounts" ><section class="stretch-wrap60">
                                            <div ><img src="<?= imagethumb('mounts','192');?>" alt="<?= translate('Mounts and Stands');?>"/></div></section>
                                            <span id="mounts" class="title"><?= translate('Mounts and Stands');?></span></a>
                                            <div class="description"><?= $pageText['mounts'];?></div>
                                            <span class="accesories_button_wrapper"><a href="/accessories/mounts" class="view-all" ><?= translate('View All');?></a>

                                              <?php if($lang != "de"){
                                                echo '<a href="https://www.infocusdirect.com/accessories/mounts-and-stands" >'. translate('Go to Store') . '</a>';
                                              }
                                              ?>
                                            </span></div></li><li><div>
                                              <a href="/accessories/remotes" ><section class="stretch-wrap60">
                                                <div ><img src="<?= imagethumb('remotes','192');?>" alt="<?= translate('Remotes');?>"/></div></section>
                                                <span id="remotes" class="title"><?= translate('Remotes');?></span></a>
                                                <div class="description"><?= $pageText['remotes'];?></div>
                                                <span class="accesories_button_wrapper"><a href="/accessories/remotes" class="view-all"><?= translate('View All');?></a>

                                                  <?php if($lang != "de"){
                                                    echo '<a href="https://www.infocusdirect.com/accessories/remotes" >'. translate('Go to Store') . '</a>';
                                                  }
                                                  echo '</span></div></li>';
                                                  if($lang != "de"){
                                                    echo '
                                                    <li><div>
                                                    <a href="/accessories/screens"><section class="stretch-wrap60">
                                                    <div ><img src="' . imagethumb('screens' , '192') . '" alt="'. translate('Screens') . '"/></div></section>
                                                    <span id="screens" class="title">'. translate('Screens') . '</span></a>
                                                    <div class="description">'. $pageText['screens'] . '</div>
                                                    <span class="accesories_button_wrapper"><a href="/accessories/screens" class="view-all" >'. translate('View All') . '</a><a href="https://www.infocusdirect.com/Accessory/Screens" >'. translate('Go to Store') . '</a></span>
                                                    </div></li>';
                                                  }
                                                  ?>
                                                  <li><div>
                                                    <a href="/accessories/software" ><section class="stretch-wrap60">
                                                      <div ><img src="<?= imagethumb('software','192');?>" alt="<?= translate('Software');?>"/></div></section>
                                                      <span id="software" class="title"><?= translate('Software');?></span></a>
                                                      <div class="description"><?= $pageText['software'];?></div>
                                                      <span class="accesories_button_wrapper"><a href="/accessories/software" class="view-all" ><?= translate('View All');?></a>
                                                        <?php if($lang != "de"){
                                                          echo '<a href="https://www.infocusdirect.com/Accessory/Software" >'. translate('Go to Store') . '</a>';
                                                        }
                                                        ?>
                                                      </span></div></li><li><div>
                                                        <a href="/accessories/services" ><section class="stretch-wrap60">
                                                          <div ><img src="<?= imagethumb('services','192');?>" alt="<?= translate('Warranties and Services');?>"/></div></section>
                                                          <span id="services" class="title"><?= translate('Warranties and Services');?></span></a>
                                                          <div class="description"><?= $pageText['services'];?></div>
                                                          <span class="accesories_button_wrapper"><a href="/accessories/services" class="view-all" ><?php echo translate('View All');?></a>

                                                            <?php if($lang != "de"){
                                                              echo '<a href="https://www.infocusdirect.com/accessories/warranties" >'. translate('Go to Store') . '</a>';
                                                            }
                                                            ?>
                                                          </span></div></li><li><div>
                                                            <a href="/accessories/networking" ><section class="stretch-wrap60">
                                                              <div><img src="<?= imagethumb('networking','192');?>" alt="<?= translate('Wireless and Networking');?>"/></div></section>
                                                              <span id="networking" class="title"><?= translate('Wireless and Networking');?></span></a>
                                                              <div class="description"><?= $pageText['networking'];?></div>
                                                              <span class="accesories_button_wrapper"><a href="/accessories/networking" class="view-all"><?= translate('View All');?></a>

                                                                <?php if($lang != "de"){
                                                                  echo '<a href="https://www.infocusdirect.com/accessories/wireless-and-networking" >'. translate('Go to Store') . '</a>';
                                                                }
                                                                ?>
                                                              </span></div></li>
                                                            </ul>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <script>
                                                    resizeRows();
                                                    </script>
                                                    <footer id="site-info" >
                                                      <?php include($homedir . "/resources/html/footer.html"); ?>
                                                    </footer>
                                                  </body>
                                                  </html>
