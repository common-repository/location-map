// JavaScript Document

jQuery(document).ready(function($){

}); // End onReady Jquery
var jsPage;

function addLocForm(){
	
	  jsPage = basePath + "/wp-content/plugins/location/_includes/display_forms.php";
	  var string = 'add=ok';	
	  jQuery.ajax({
      type: "GET",
      url: jsPage,
      data: string,
      cache: false,
      success: function(data) {
		     var d = "<h4>Add New Location</h4>\n" + data;
			 jQuery("#content").html(d);          
         }
      });

}

function updLocForm(path, i){
	
	  var id = i;
	  jsPage = path + "/wp-content/plugins/location/_includes/display_forms.php";
	  var string = 'update=ok&id='+id;	
	 
	  jQuery.ajax({
      type: "GET",
      url: jsPage,
      data: string,
      cache: false,
      success: function(data) {
		     var d = "<h4>Update Profile</h4>\n" + data;
			 jQuery("#content").html(d);          
         }
      });
}


function addLocation(){
	  var addPage       = basePath + "/wp-content/plugins/location/_includes/add_update.php";
	  var name 		    = jQuery("#managerName").val();
	  var email         = jQuery("#email").val();
	  var position      = jQuery("#position").val();
	  var branchName    = jQuery("#branchName").val();
	  var address		= jQuery("#address").val();
	  var city		    = jQuery("#city").val();
	  var st			= jQuery("#state").val();
	  var zip 		    = jQuery("#zipCode").val();
	  var phone		    = jQuery("#phone").val();
	  var string        = 'name='+name + '&email='+email +'&position='+position+'&branch='+branchName+'&address='+address+'&city='+city+'&state='+st+'&zip='+zip+'&phone='+phone + '&addLoc=yes';
	
	 
	  jQuery.ajax({
      type: "GET",
      url: addPage,
      data: string,
      cache: false,
      success: function(data) {
		    if(data =="sent"){
				window.location.reload(true);
				jQuery("#content").html("<p>Your new location has been added.</p>"); 

			}
         }
      }); 

}


function updateLocation(id){
      var addPage       = basePath + "/wp-content/plugins/location/_includes/add_update.php";
	  var name 		    = jQuery("#managerName").val();
	  var email         = jQuery("#email").val();
	  var position      = jQuery("#position").val();
	  var branchName    = jQuery("#branchName").val();
	  var address		= jQuery("#address").val();
	  var city		    = jQuery("#city").val();
	  var st			= jQuery("#state").val();
	  var zip 		    = jQuery("#zipCode").val();
	  var phone		    = jQuery("#phone").val();
	  var string        = 'name='+name + '&email='+email +'&position='+position+'&branch='+branchName+'&address='+address+'&city='+city+'&state='+st+'&zip='+zip+'&phone='+phone + '&updateLoc=yes&id='+id;
	
	 
	  jQuery.ajax({
      type: "GET",
      url: addPage,
      data: string,
      cache: false,
      success: function(data) {
		    if(data =="sent"){
				window.location.reload(true);
				jQuery("#content").html("<p>Your location has been updated.</p>"); 

			}
         }
      }); 
}


function deleteLocation(id){
	  var delPage       = basePath + "/wp-content/plugins/location/_includes/add_update.php";
	  var string        = 'deleteLocation=ok&id='+id;
	
	  jQuery.ajax({
      type: "GET",
      url: delPage,
      data: string,
      cache: false,
      success: function(data) {
		    if(data =="sent"){
				window.location.reload(true);
				jQuery("#content").html("<p>Your location has been deleted.</p>"); 

			}
         }
      }); 
}

function setDot(event){
    var city = jQuery("#dotCity").val();
	var left = document.getElementById("map").offsetLeft;
	var top = document.getElementById("map").offsetTop;
	var e = event;
	var x = e.pageX - left;
	var y = e.pageY - top;
	
	var searchString ='xPos='+x + '&yPos='+y+'&city='+city;  
	 jQuery.ajax({
      type: "GET",
      url: basePath + "/wp-content/plugins/location/_includes/dots.php",
      data: searchString,
      cache: false,
         success: function(data) {
           jQuery("#map").html(data);
		 
         }
      });
}



function disp_front_locations(city){
	 jQuery.ajax({
      type: "GET",
      url: basePath + "/wp-content/plugins/location/_includes/main_display.php",
      data: "city="+city,
      cache: false,
         success: function(data) {
		  jQuery("#mainArea").html(data);
         }
      });
	
}

