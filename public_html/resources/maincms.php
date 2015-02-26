<!DOCTYPE html>
<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


$pn = $_GET['pn'];
if(!empty($_GET['lang'])){$lang = $_GET['lang'];}

?>

    <div id="layout">
   <section id="content">
   
<div id="accordion" style="padding:50px">
  <h3>Welcome</h3>
  <div>
    <p>
	
This is the home for the custom CMS for the InFocus websites. If you see something that you think could be made easier/more efficient please email me your suggestions at <a href="mailto:daniel.boggs@infocus.com">daniel.boggs@infocus.com</a>.
    </p> <p>The sections below will guide you through the usage of this CMS.</p>
  </div>
  <h3>Website Navigation</h3>
  <div>
    <p>Pure HTML menu.  Changes are made to the CURRENT site.  So make sure if you want edits to the .de site (for example) that you are on www.infocus.de</p>
  </div>
  <h3>Creating/Updating Products</h3>
  <div>
    <p>Each main product category (Projectors, Displays, Accessories(and Peripherals), etc) can be found in the nav bar above under both Guided processes and Specs.  Specifications links will take you to a page to enter/edit specifications for that category.  The Guided process links walk you through creating a new product from start to finish.
    </p>
 <p>The fastest way to create specification for a product is to copy specifications from a similar product.  At the top of most of the product pages you will find an input box called "Wildcard Search".  Type the part number, or a portion of the part number in this box and click search to populate the table with results.  Once you find the product you would like to copy from click the "->" button to the left of that row or click and drag to select multiple cells/rows.  Copy (CTRL^c).  Select the empty row at the bottom of the table and paste (CTRL^v).</p>
 <p>Once you have completed the changes click "Submit changes" at the bottom of the table.  It will notify you of how many rows have been changed/created.  If this number does not match the number you added or edited then you likely typed or removed something unintentionally.
  </div>
  <h3>Product Series</h3>
  <div>
    <p>This is where you enter series associations and series bullet lists. Although unusual, a part number CAN be included in multiple series if needed.  Be sure to include the correct language when creating new entries.</p>


  </div>  
  <h3>Text &  Translations -> Product Text</h3>
  <div>
    <p>Product Text contains all text related to a product, excluding specifications and the "Overview" section.  This includes titles, list titles, descriptions, special features, Firmware notes, etc.  Basically anything that is not part of the Overview, but is language dependent resides in the product text table.  This page is a basic HTML form.  You can search for a product to update, or create a new product from scratch.  </p>
 <p>Products are represented by their part number, Series/Families are represented by their "zero" part number appended with "-Series".  Examples would be: "IN2120-Series", "IN1110-Series", "IN124ST-Series", etc.</p>
  </div>
  <h3>Text &  Translations -> Site Text</h3>
  <div>
    <p>Site text is page specific text translations.  This encompasses many pages through the site where there is too much text for it to be in a "label text" translation (see below).  Each of these fields has a page name, a Text Key, the translated text, and associated language.  You will rarely be creating new entries here as they have to be specifically accounted for in the PHP of the site.  Generally this will be used for updating text, or adding translations if there is new content added.</p>
  </div>
  <h3>Text &  Translations -> Label Text</h3>
  <div>
    <p>Label text encompasses all short translation text that is used throughout the site.  Generally under 5 words, it is used in links, buttons, and tables.  If you are translating the site and you see a word or phrase in english.  Copy the text you want translated and paste it in a new row in the "Transkey" field.  Enter the translated text, and the appropriate language and submit your changes.  In most cases there will already be at least one version of the text already present so you can search for the text in the field at the top of the page.</p>
  </div>
  <h3>Text &  Translations -> Custom Pages</h3>
  <div>
    <p>Custom pages encompass almost all non-product pages.  If you want to create a special page with any html content you can create it here.  The page name will be the link location once it is saved.  For example if you create a page called "SuperAwesomePage" then the location of that page once it is saved will be www.infocus.com/SuperAwesomePage.  The design uses simple WYSIWYG or html coding</p>
  </div>
  <h3>Text &  Translations -> Overviews</h3>
  <div>
    <p>Overview sections are easiest to create by copying something similar, however you can create from scratch by dragging down sections from the top.  The grey bar at the top of each overview block can be dragged to change the order.  You can also click the little "-" symbol to minimize a section if screen space is limited.  These sections are WYSIWYG, however there is a "source" button in the upper left corner of the WYSIWYG box that allows you to change the html directly.

    </p>
    <p>

    </p>
  </div>
  <h3>Downloads</h3>
  <div>
    <p>Downloads are documents, zip files, exe's, etc that will be listed under the "Downloads" tab of products and product families.  Files uploaded MUST contain a 2 (or 3 if ZHS or ZHT) letter language abbreviation at the end of the filename.  You can upload multiple files at a time by holding shift or alt and selecting multiple.  The "Filename" field is the CORE file name that will be used.  So if you upload test1EN.pdf, testtestDE.pdf, testmenl.pdf, and weeeeesp.pdf and enter a filename of Test-File, the resulting files saved to the server will be Test-File-EN.pdf, Test-File-DE.pdf, Test-File-NL.pdf, and Test-File-SP.pdf.  Fill out the Title and descriptions to detail what the file is.  Be sure to include all languages (comma delimited).  Related products is semicolon delimited list of products where the file will be listed.  File Type is pretty self explanitory and it determines what folder the file will be placed in.  Sub-folder should be used for ANY series based document.  So documents for the IN110a-Series should be in the IN110a folder.  The subfolder field is both a dropdown AND a free entry.  If the folder does not already exist in the dropdown, type the subfolder and it will be created.  Finally Category.  This will be used in a future "filter" dropdown.  There are no requirements for categories, but check with Ross Burdick before creating anything new.
    </p>
    <p>

    </p>
  </div>
  <h3>Optional Accessories</h3>
  <div>
    <p><strong>Accessories by Accessory:</strong>This section allows you to enter an accessory, then select all product models that have that accessory as an optional purchase.  This would be most commonly used when a new ACCESSORY is added, as opposed to a new product.
    </p>
    <p><Strong>Accessory by Product:</strong>This section allows you to enter a product, then select all its optional accessories.  This makes the most sense for adding a new product.

    </p>
  </div>
  <h3>Other -> Redirects</h3>
  <div>
    <p>Instructions coming soon.

    </p>
  </div>
  <h3>Other -> News/Event Articles</h3>
  <div>
    <p>Instructions coming soon.

    </p>
  </div>
  <h3>Other -> Videos</h3>
  <div>
    <p>Instructions coming soon.

    </p>
  </div>
  <h3>Other -> Resellers</h3>
  <div>
    <p>Instructions coming soon.

    </p>
  </div>
  <h3>Other -> Form Assignments</h3>
  <div>
    <p>Instructions coming soon.

    </p>
  </div>
  <h3>Other -> Product Review</h3>
  <div>
    <p>Instructions coming soon.

    </p>
  </div>
  <h3>Other -> Search Terms</h3>
  <div>
    <p>Instructions coming soon.

    </p>
  </div>
</div>   
   
</section>
</div>
<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
 </html>