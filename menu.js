function showMenu (event) {
    if (menu.is(":visible")) {
//        menu.slideUp({complete:function(){$(this).css('display','')}});
        menu.slideUp();
	$("#siteTagline").slideDown();
	$("#siteTitle").slideDown();
    }
    else {
	$("#siteTagline").slideUp();
	$("#siteTitle").slideUp();
        menu.slideDown();
    }
}

var header = undefined;
var menu = undefined;
var menuButton = undefined;
$(document).ready(function(){
    header = $("#masthead");
    headerMenu= $("nav.sitemenu");
    menu = $(".sitemenu ol");
    menuButton = $("<div class='menu-button'><a href='#'>Menu</a></div>");
    menuButton.click(showMenu);
    header.prepend(menuButton);
});
