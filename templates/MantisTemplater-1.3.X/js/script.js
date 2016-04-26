// MSIE version
function msieversion()
{
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
        return true;
    else
        return false;
}

$(document).ready(function()
{
    // Global var
    var templatesPath = 'templates/MantisTemplater-1.3.X/';  // templates path
    var copyrightEmail = 'me@devdiamond.com';                // Copyright email
    var copyrightName = 'DevDiamond';                        // Copyright name

	// rss-icons
	$("img[src*='rss.png']").attr("src", templatesPath + "img/rss.png");
	
	// plus and minus icons
	$("img[src*='plus.png']").attr("src", templatesPath + "img/plus.png");
	$("img[src*='minus.png']").attr("src", templatesPath + "img/minus.png");
	
	// sort (up/down) icons
	$("img[src*='up.gif']").attr("src", templatesPath + "img/up.png");
	$("img[src*='down.gif']").attr("src", templatesPath + "img/down.png");
	$("img[src*='up.png']").css("padding","0 0 0 5px");
	$("img[src*='down.png']").css("padding","0 0 0 5px");
	
	// status icons
	$("#buglist tr:not(.row-category) td:not([colspan])").each(function(){										
		if($.trim($(this).html()) == '&nbsp;')
			$(this).html("<img src=\"../../"+ templatesPath +"img/priority_1.png\">");
	});
	$("img[src*='priority_normal.gif']").attr("src", templatesPath +"img/priority_3.png");
	$("img[src*='priority_low_1.gif']").attr("src", templatesPath +"img/priority_2.png");
	$("img[src*='priority_1.gif']").attr("src", templatesPath +"img/priority_4.png");
	$("img[src*='priority_2.gif']").attr("src", templatesPath +"img/priority_5.png");
	$("img[src*='priority_3.gif']").attr("src", templatesPath +"img/priority_6.png");
	
	// update icons
	$("img[src*='update.png']").attr("src", templatesPath +"img/update.png");

	// remove the underscore from the anchor
	$("a:not([href])").css("text-decoration","none").css("color", "black");
	
	// add style to specific pages
	if (window.location.pathname == "/bug_report_page.php")
		$("#report-bug-div").addClass("bug-report-page");
	
	if (window.location.pathname == "/view.php")
		$("#content").addClass("bug-view-page");
	
	if (window.location.pathname == "/billing_page.php")
		$("table.width100").addClass("bug-billing-page");
	
	if (window.location.pathname == "/login_page.php")
    {
		$("label").css("background-color","white");
		$("span").css("background-color","white");
		$(".field-container").css("background-color","white").css("margin","15px 0 0 0 ").css("background-color","transparent");
		$("legend span").html("&nbsp;");
		$("#login-div").addClass("login-page");
		$(".field-container label span").addClass("login-page-category").css("margin","0 0 5px 5px");
		$(".field-container label").css("float","none").css("z-index","0").css("background-color","transparent");
		$(".field-container .input").css("float","none").css("z-index","110");
		$(".field-container .label-style").css("display","none");
		$(".field-container input[type='text']").addClass("form-control").css("width","90%");
		$(".field-container input[type='password']").addClass("form-control").css("width","90%");
		$("#login-form input[type='submit']").addClass("btn btn-default btn-right").css("padding","5px 12px").css("margin-top", "-12px").css("margin-right","0px");
	}
	
	if (window.location.pathname == "/summary_page.php")
		$(".section-container").css("margin-top","0");
	
	if (window.location.pathname == "/login_page.php")
    {
		var loginLincs = $("#login-links").html();
		$("#login-links").remove();
		var submitSpanHtml = $(".submit-button").html();
		$(".submit-button").html("<ul id=\"login-links\">" + loginLincs + "</ul>" + submitSpanHtml);
	}
	
	// top menu
	if (window.location.pathname == "/my_view_page.php")
		$("a[href*='my_view_page']").addClass("selected-menu");
	
	if (window.location.pathname == "/view_all_bug_page.php" || window.location.pathname == "/view.php")
		$("a[href*='view_all_bug_page']").addClass("selected-menu");
	
	if (window.location.pathname == "/bug_report_page.php")
		$("a[href*='bug_report_page']").addClass("selected-menu");
	
	if (window.location.pathname == "/changelog_page.php" )
		$("a[href*='changelog_page']").addClass("selected-menu");
	
	if (window.location.pathname == "/roadmap_page.php")
		$("a[href*='roadmap_page']").addClass("selected-menu");
	
	if (window.location.pathname == "/summary_page.php")
		$("a[href*='summary_page']").addClass("selected-menu");
	
	if (window.location.pathname.match(/\/manage_.*/) ||
        window.location.pathname.match(/\/adm_.*/) ||
        window.location.pathname == "/plugin.php")
    {
        $("a[href*='manage_overview_page']").addClass("selected-menu");
    }

	if (window.location.pathname == "/account_page.php")
		$("a[href*='account_page']").addClass("selected-menu");
	
	if (window.location.pathname == "/billing_page.php")
		$("a[href*='billing_page']").addClass("selected-menu");

    // Design by - author
    var html1 = $("address").eq(0).html();
    var html2 = '<span style="margin-left: 10px; font-style: normal;">Design by <a href="mailto:'+ copyrightEmail +'">'+ copyrightName +'</a></span>';
    $("address").eq(0).html(html1 + html2);

    // menu fix for IE
	if ( !msieversion() )
		$("#menu-items a").css("transition","0.2s");
});