var controlHTML = '<div class="removeafter" style="height:90px;width:120px;position:absolute;top:0;right:100px;z-index:1007;"> \<div style="margin:auto;width:65px;height:30px;background: url(/resources/images/slider-arrow-up.png) no-repeat scroll center center #808080;" \ onclick="$($(this).parent().parent()).insertBefore($(this).parent().parent().prev());"></div> \<div style="margin:auto;width:65px;height:30px;background: url(/resources/images/slider-arrow-down.png) no-repeat scroll center center #808080;" \ onclick="$($(this).parent().parent()).insertAfter($(this).parent().parent().next());"> </div> \<button style="width:120px" onclick="addBox(this);">Add Link Box</button> \<button style="width:120px" onclick="lastobject.remove();" title="Removes the last link-box that was either moved or resized">Remove Last</button> \<button style="width:120px" onclick="$(this).parent().parent().remove();">Remove Slide</button> \</div>';

for (i = 0; i < $(".swiper-slide.sedit").length; i++) { $(".swiper-slide.sedit")[i].innerHTML = $(".swiper-slide.sedit")[i].innerHTML + controlHTML;}
 var lastobject;$('.linkspan')
.resizable({ handles: "se", create: setContainerResizer, stop:resizeStop})
.draggable({ stop:dragStop});

  $('#resizeDiv')
.resizable({containment: 'parent', handles: "se", create: setContainerResizer, stop:resizeStop})
.draggable({containment: 'parent', stop:dragStop});

$(".linkspan").click(function(mouseEvent){mouseEvent.preventDefault();});
$(".linkspan").dblclick(function(mouseEvent){
var box = prompt("enter the link destination \n exclude http://www.infocus.com.de.info.etc if it is not an external link", mouseEvent.target.parentNode.href);
if(box != null){

if(box.substring(0,19) == "http://www.infocus."){
box = box.replace("http://","");
box = box.substring(box.indexOf("/"));
}

mouseEvent.target.parentNode.href = box;}

});

function resizeStop(event, ui){
lastobject = $(this).parent();
    convert_to_percentage($(this));
}

function dragStop(event, ui){
lastobject = $(this).parent();
    convert_to_percentage($(this));
}

function setContainerResizer(event, ui) {
    $($(this)[0]).children('.ui-resizable-handle').mouseover(setContainerSize);
    $($(this)[0]).children('.ui-resizable-handle').mouseout(resetContainerSize);
}

function convert_to_percentage(el){
    var parent = el.parent().parent();
    el.css({
        left:parseInt(el.css('left'))/parent.width()*100+"%",
        top: parseInt(el.css('top'))/parent.height()*100+"%",
        width: el.width()/parent.width()*100+"%",
        height: el.height()/parent.height()*100+"%"
    });
}

function setContainerSize(el) {
    var parent = $(el.target).parent().parent();
    parent.css('height', parent.height() + "px");
}

function resetContainerSize(el) {
    parent.css('height', 'auto');
}



function addBox(el){
var box = prompt("enter the link destination \n exclude http://www.infocus.com.de.info.etc if it is not an external link", "ie. /support");

if(box == null){return;}


var parent = el.parentNode.parentNode;

parent.innerHTML = parent.innerHTML + '<a href="' + box + '"><span class="linkspan" style=" \ position: absolute; \ top: 0%; \ width: 8.97%; \ height: 5%; \ left: 20%; \ opacity: 0;"></span></a>';
 $('.linkspan')
.resizable({ handles: "se", create: setContainerResizer, stop:resizeStop})
.draggable({ stop:dragStop});

$(".linkspan").click(function(mouseEvent){mouseEvent.preventDefault();});
$(".linkspan").dblclick(function(mouseEvent){
var box = prompt("enter the link destination \n exclude http://www.infocus.com.de.info.etc if it is not an external link", mouseEvent.target.parentNode.href);
if(box != null){

if(box.substring(0,19) == "http://www.infocus."){
box = box.replace("http://","");
box = box.substring(box.indexOf("/"));
}

mouseEvent.target.parentNode.href = box;}

});

}


function addSlider(el){

$(".swiper-wrapper")[0].innerHTML = $(".swiper-wrapper")[0].innerHTML.replace("<!-- EndSwipeGenerated -->","") + '<div class="swiper-slide sedit" style="position:relative"> <div  class="crop cmsedit" contenteditable="true"><img style="" src="/resources/images/no-image"></div>' + controlHTML+ '</div> \<!-- EndSwipeGenerated -->';
refreshInstances();

}


function refreshInstances(){
$('div[contenteditable="true"]').each(function(i, editableElement)
{
  try{  CKEDITOR.inline(editableElement);}
  catch(e){}
});
}

function submitCode(){
for(name in CKEDITOR.instances)
{
    CKEDITOR.instances[name].destroy()
}

$('.linkspan')
.resizable("destroy")
.draggable("destroy");

document.getElementById("swiperwrap").innerHTML = document.getElementById("swiperwrap").innerHTML.replace(/ contenteditable="true"/g,'');

$('.removeafter').remove();
var updateBody = document.getElementById("swiperwrap").innerHTML.replace(/cke_\w*/g,"");
updateBody = updateBody.substr(updateBody.indexOf("<!-- SwipeGenerated -->"));
updateBody = updateBody.substr(0,updateBody.indexOf("<!-- EndSwipeGenerated -->")+26);
var updateCTA = document.getElementById("category").innerHTML.replace(/cke_\w*/g,"");
updateCTA = updateCTA.substr(updateCTA.indexOf("<!-- CTAGenerated -->"));
updateCTA = updateCTA.substr(0,updateCTA.indexOf("<!-- EndCTAGenerated -->")+24);
	  		 	jQuery.post("/resources/php/homepageupdate.php",
			{swiper: updateBody,
			ptype: pagetype,
			CTA: updateCTA.replace("<ul>","").replace("</ul>","")
			},
			function(response){
			   alert(response);
			});

}

function RestoreBackup(){
	  		 	jQuery.post("/resources/php/homepageupdate.php",
			{restore: true,
			ptype: pagetype
			},
			function(response){
			   alert(response);
			});

}