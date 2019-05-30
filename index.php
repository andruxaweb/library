<?php
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="css/stile.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<!--<link rel="stylesheet" href="ie7/ie7.css">-->
  <title>Page Title</title>
  <script>
  //scroll to page
  
	window.smoothScroll = function(target) { 
    var scrollContainer = target; 
    do { //find scroll container 
     scrollContainer = scrollContainer.parentNode; 
     if (!scrollContainer) return; 
     scrollContainer.scrollTop += 1; 
    } while (scrollContainer.scrollTop == 0); 

    var targetY = 0; 
    do { //find the top of target relatively to the container 
     if (target == scrollContainer) break; 
     targetY += target.offsetTop; 
    } while (target = target.offsetParent); 

    scroll = function(c, a, b, i) { 
     i++; if (i > 30) return; 
     c.scrollTop = a + (b - a)/30 * i; 
     setTimeout(function(){ scroll(c, a, b, i); }, 20); 
    } 
    // start scrolling 
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0); 
} 
</script>
</head>

<body>
<?php 
include 'header.php'; 
//include 'search_header.php'; 
?>

<div class="slider-body">


<div class="slider">
<div class="slider_write">
<h2>LIBRARY</h2>
<h3>=== ALL IN ONE ===</h3>
</div>
<div class="slider_login">
	<ul>
	<li><a href="/signin.php">sign in </a></li>
	<li><a href="/signup.php">registration</a> </li>
	</ul>
	
</div>


</div>

<div class ="row">
<div class ="left-flow about-us">
<h1>About us</h1> 
<p>1 Stronger unpacked felicity to of mistaken.</p>
<p>Opinions learning likewise daughter now age outweigh.<br>
<p>Discourse otherwise disposing as it of strangers forfeited deficient.</p>
<a style="border-radius: 25px; padding: 0 3px;" href "#">More about us &#8594;</a></li>
</div>
<div class="right-flow">
<div class="small-block-container">
<div class="text">
<div class="border-corner"></div>
<h1>About us</h1>
<p>2 Stronger unpacked felicity</br>
Opinions learning likewise daughter </br>
Discourse otherwise disposing as </p>
</div>
</div>
<div class="small-block-container">
<div class="text">
<div class="border-corner"></div>
<h1>About us</h1>
<p>3 Stronger unpacked felicity </br>
Opinions learning likewise daughter </br>
Discourse otherwise disposing as</p>
</div>
</div>
</div>	
</div>
<div class="row">
<div class="expression">
<div class="border-corner2"></div>
	<h2>Design is everything we make, but it's aslso between those things.</br> It's make a mix of of craft,
	science, storytelling, propaganda, and philosophy</h2>
	<h1>-Erik Adigard</h1>
</div>
<div class="latest-updates">
<h1> Latest Updates</h1>
<div class="text_a">
<h5>Information is a source of learning. But it's organized,processed </br>
 available to the right people in a format for decision making it is burden, not a benefit.</h5>
</div>
</div>
</div>
<div class ="picture_description">
<div class="pic">
<div style="position: relative;">
<div class="border-corner2"></div>
<img src="img/2-d_pic.png" alt="1_stpicture_description">
</div>
</br>
<p1>January update</p1>
</br>
<div class="textn textn1">
<span class="icon ti-user"></span><span class="icon-name"> By Autor</span>
<span class="icon ti-calendar"></span><span class="icon-name"> 24 January 2018</span>
<span class="icon ti-comments"></span><span class="icon-name"> 3</span>
<p>Two assure edward whence the was. Who worthy yet ten boy denote wonder. Weeks views her sight old tears sorry.
 Additions can suspected its concealed put furnished. Met the why particular devonshire decisively considered partiality.
 Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view.</p>
 </br>
 <a style="border-radius: 25px; padding: 0 10px;" href="#">read more </a>
</div>
</div>
<div class="pic">
<div style="position: relative;">
<div class="border-corner2"></div>
<img src="img/1_t_pic.png" alt="2d_picture_description">
</div>
</br><p1>December update</p1>
</br>
<div class="textn textn2">
<span class="icon ti-user"></span><span class="icon-name"> By Autor</span>
<span class="icon ti-calendar"></span><span class="icon-name"> 24 December 2018</span>
<span class="icon ti-comments"></span><span class="icon-name"> 3</span>
<p>Two assure edward whence the was. Who worthy yet ten boy denote wonder. Weeks views her sight old tears sorry.
 Additions can suspected its concealed put furnished. Met the why particular devonshire decisively considered partiality.
 Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view.</p>
 </br>
 <a style="border-radius: 25px; padding: 0 10px;" href="#">read more </a>
</div>
</div>
<div class="pic">
<div style="position: relative;">
<div class="border-corner2"></div>
<img src="img/3-d_pic.png" alt="3d_picture_description">
</div>
</br><p1>October update</p1>
</br>
<div class="textn textn3">
<span class="icon ti-user"></span><span class="icon-name"> By Autor</span>
<span class="icon ti-calendar"></span><span class="icon-name"> 24 October 2018</span>
<span class="icon ti-comments"></span><span class="icon-name"> 3</span>
<p>Two assure edward whence the was. Who worthy yet ten boy denote wonder. Weeks views her sight old tears sorry.
 Additions can suspected its concealed put furnished. Met the why particular devonshire decisively considered partiality.
 Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view.</p>
 </br>
 <a style="border-radius: 25px; padding: 0 10px;" href="#">read more</a>
</div>
</div>
</div>
</div>
<div class="footer">
<div class="footer-inf">
<div class="border-corner2 wider"></div>
<div class="f-text-top" >
<span class="ficon ti-user"></span> <span class="icon-name">1000+</span>
<span class="ficon ti-shopping-cart"></span><span class="icon-name">200</span> 
<span class="ficon ti-comments"></span><span class="icon-name">5632</span>
<span class="ficon ti-files"></span><span class="icon-name"> 25000+</span>
</div>
<div class="f-desc">
<a>Happy users</a>
<a>Sold products</a>
<a class="a-desc">Comments</a>
<a class="a-descc" >Lines of code</a>
</div>
<div class="border-corner-left-wrapper"><div class="border-corner-left"></div></div>
</div>
</br>
</br>
</br>
<div class="feed-back">
<h1 style="margin-left: 4%;">Get to know us better</h1>
<div style="display: inline-block; width:45%; vertical-align: top; margin-left: 4%;">
<p>Contact us and we will contact you back.Whant to chat? We can do that too.</p>
</div>
<div style="display: inline-block; width:49%;">
<div class="text-us">
	<form id="text-us" method="post" action="contact-us.php">
	<input name="name"  type="text"  class="form-control"  placeholder="Your Name"  required> </br>
	<input name="email" type="text" class="form-control"  placeholder="Your Email" required> </br>
	<input name="subject" type="text" class=" form-control"  placeholder="Subject" required> </br>
	<textarea name="message" class="message-control"  placeholder="Message" required> </textarea> </br>
	<button type="submit" name="submit" class="button-send-mail" >Send Mail</button>
	
	</form>
	</div>
	</div>
	<div class= "icons-and-text">
		<span class="location-czestochowa ti-location-pin"></span><span class="icon-name"> Czestochowa</span>
		</br>
		<span class="email-admin ti-email"></span><span class="icon-name"> librarytestczest@gmail.com</span>
		</br>
		<span class="tmobile-libr ti-mobile"></span><span class="icon-name"> +4853595816</span>
	</div>
	
</div>
</div>
</div>
</body>

</html>