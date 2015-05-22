<?php

require 'src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => 'yout_facebook_app_id',
  'secret' => 'your_facebook_app_secret',
  'fileUpload' => true
));

// Get User ID
$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	
  } catch (FacebookApiException $e) {
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array('scope'=>'publish_actions'));
}

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Blood Group Tail | Youth For Blood</title>
	
	<!-- jquery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		
	<!-- Google web font -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
	
	<!-- facebook meta property -->
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Blood Group Tail | Youth For Blood" />
	<meta property="og:description" content="Youth For Blood is Youth-led organization which take initiative role to Provide Fresh blood. We have saved more than 35 hundreds lives in 2 and half year by donating fresh blood. official facebook page : http://www.facebook.com/youthforblood www.facebook.com/youthforblood" />
	<meta property="og:url" content="http://youthforblood.org/" />
	<meta property="og:site_name" content="Youth for blood" />
	<meta property="og:image" content="http://youthforblood.org/wp-content/uploads/2012/06/youth-for-blood-logo.jpg" />
	
	<!-- main stylesheet -->
	<link rel="stylesheet" href="style.css">
	
		<?php 
			if ($user) { ?>
			<script>
				// if user is logged in , redirect to app page
				top.location.href = "http://bgt.youthforblood.org/app.php";
			</script>
		<?php } ?>
		
  </head>
  <body>
	<div class="cause-heading">
		<h1><a href="http://bgt.youthforblood.org">Blood Group Tail</a></h1>
			<h4 class="cause-subheading">Include your blood group in your social profile</h4>
	</div>
	<div class="cause-description">
		<h2 class="cause-title">Support The Cause !</h2>
		<p>
			&ldquo;Blood Group Tail&rdquo; is a campaign to aware people about &ldquo;blood group&rdquo; through
			Social networking sites. Educating and encouraging people to donate blood has been a matter of serious
			concern for us. We still have a condition where friends within our circle are still unaware about their 
			blood group.
		</p>
	</div>
	
	<div class="cause-description section"></div>

	<h4 class="cause-tagline">Add blood group badge on your profile picture</h4>
	<?php 
		// if user is not logged in, show facebook login button
		if (!$user) { ?>
			<div class="fb-login-area" style="font-size:30px;">
				<a class="facebook_button" href="<?php echo $loginUrl; ?>">Login with Facebook</a>
			</div>
		<?php } ?>
		
	<div class="cause-description section"></div>
		
	<div class="cause-description section">
		
		<h4 class="cause-tagline">How To ?</h4>
		
		<!-- embed youtube video --> 
		<div class="video-tutorial" style="text-align:center;">
			<iframe width="560" height="315" src="//www.youtube.com/embed/sK-cSGIk8K0?rel=0" frameborder="0" allowfullscreen></iframe>
		 </div>

		 <p>
			To support this campaign, you have to include your blood group in your social media 
			identity: profile name on Facebook, Twitter or any other social networking sites. SAMPLE:
		 </p>

		 <div class="cause-sample-image">
			<img src="image/tagline_blood_group.png">
		 </div>

		 <br>

		 <div class="cause-sample-image">
			<img src="image/tagline_blood_group_sandip.png">
		 </div>
		 
		 <p class="cause-quote">
			<span class="quote-symbol">&ldquo;</span>We believe this will motivate and encourage people 
			in our circle to check their blood group. Sooner, everyone in your circle will know each 
			other's blood group and will make easier to find a blood donor in case required. Starting 
			from volunteers of YFB, we believe every responsible social media user will too support the 
			campaign.<span class="quote-symbol">&rdquo;</span>
		</p>

		<p class="cause-quote-source">
			- Ankit Das, BGT Team (Youth For Blood)
		</p>
	</div>

		<div class="cause-description section">
			<h4 class="cause-tagline quote-tagline">
				<span class="quote-symbol">&ldquo; </span> Be an inspiration supporting a social 
				media campaign <span class="quote-symbol">&rdquo;</span>
			</h4>
			 <p>
				Have you ever thought your profile picture displayed on your social media can be an inspiration and motivation for several? Yeah, a similar campaign is being initiated on social media.  Under this campaign, one just needs to include his/her blood group in one's profile picture that is displayed on different social site like Facebook, Whatsapp, Twitter and so on and describe the cause in the photo caption. The picture may be a blood group icon or any graphical modification. You can also use Facebook application from below to do so (please login to add blood group badge on your profile picture). 
			 </p>
		</div>
		
		<h4 class="cause-tagline">Add blood group badge on your profile picture</h4>

		<?php if (!$user) { ?>
		<div class="fb-login-area" style="font-size:30px;">
			<a class="facebook_button" href="<?php echo $loginUrl; ?>">Login with Facebook</a>
		</div>
		<?php } ?>
		
		<div class="cause-description section">
		</div>
		
		<div class="cause-description section">
			<h4 class="cause-tagline">How To Use?</h4>
			<p>The process goes as below: </p>
			 <div class="cause-sample-image">
				<img src="image/bgt_site_result.png">
			 </div><br>
		
			<p>		
				The campaign will go on for about 1 month and in this interval you will have to 
				keep the profile picture for at least one week. While keeping the picture please 
				share the link among your circle and put a photo caption writing the reason behind 
				(See the demo caption). We are expecting for positive responses from you and hope this 
				will be a successful one.
			 </p>
		</div>
		
		<div class="cause-description section">
			<h4 class="cause-tagline">Story Behind The Campaign</h4>
			 <p>
				On 9th September 2014, Secretary of Youth For Blood, Kathmandu, Mr. Bishnu Dhamala  changed 
				his Facebook profile picture displaying his blood group and  asked others to do the same. 
				Within short period, it went viral. Being influenced from this, Youth For Blood officially 
				initiated this campaign on social media. And sooner the campaign is getting a remarkable 
				response from social media users.
				Educating and encouraging people to donate blood using any stuff is a significant issue for us. 
				We still have circumstances where friends within our circle are still unaware about their 
				blood group.
			 </p>
		</div>
   </body>
</html>