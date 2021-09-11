$(".loginusingemail a").click(function(){
	$(".loginusingotp").show();
	$(".loginusingemail").hide();
})

$(".loginusingotp a").click(function(){
	$(".loginusingemail").show();
	$(".loginusingotp").hide();
})

var apiendpoint = 'http://localhost/hospital/api/'; 
var siteurl = 'http://localhost/hospital/'; 

function storeData(data,url){
	$.ajax({
            url: apiendpoint+url,
            type: "post",
            headers: {
                        'Accept': 'application/json',
            },
            data:data,
            async:false,
          }).done(function(res) {
          	console.log(res.token.plainTextToken);
          	localStorage.setItem("token", res.token.plainTextToken);
          	// if(res.status = 'success'){
          	// 	location.href = siteurl+'customer/dashboard';
          	// }
          })
}

$(".customersignup").click(function(){

	var data = $('form').serialize();
	storeData(data,'customer/signup')
	
})
$(".customerlogin").click(function(){

	var data = $('form').serialize();
	storeData(data,'customer/login')
	
})

$(".doctorsignup").click(function(){
	alert();
	var data = $('form').serialize();
	storeData(data,'doctor/signup')
	
})