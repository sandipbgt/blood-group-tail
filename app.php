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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
	
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Blood Group Tail | Youth For Blood" />
	<meta property="og:description" content="Youth For Blood is Youth-led organization which take initiative role to Provide Fresh blood. We have saved more than 35 hundreds lives in 2 and half year by donating fresh blood. official facebook page : http://www.facebook.com/youthforblood www.facebook.com/youthforblood" />
	<meta property="og:url" content="http://youthforblood.org/" />
	<meta property="og:site_name" content="Youth for blood" />
	<meta property="og:image" content="http://youthforblood.org/wp-content/uploads/2012/06/youth-for-blood-logo.jpg" />

	<link rel="stylesheet" href="style.css">
		<?php if (!$user): ?>
		<script>
			// if user is not logged in, redirect to home page
			top.location.href = "http://bgt.youthforblood.org/";
		</script>
		<?php endif ?>
  </head>
  <body>

	<?php
		$submitted = false;
		$viewInfo = true;

		if ($user != null) {
			
			$accessToken = $facebook->getAccessToken();
		
			// get the user id of currently logged in user
			$userID =  $user_profile['id'];

			if(isset($_POST['submit']) && (!empty($_POST['blood_group'])) && (!empty($_POST['position']))) {
				
				// blood group
				$blood_group = $_POST['blood_group'];
				
				// position
				$position = $_POST['position'];

				require_once('image_generate.php');
				
				$submitted = true;
				$viewInfo = false;
				
			}

			$url = 'http://www.bgt.youthforblood.org/uploads/' . $userID . 'b.jpg';
		}
		?>

	<div class="cause-heading">
		<h1><a href="http://bgt.youthforblood.org">Blood Group Tail</a></h1>
	</div>
	<div class="cause-description">
	<h2 class="cause-title">Support The Cause !</h2>
	<h4 class="cause-tagline">Change Your Profile Picture For A Week </h4>
		<?php if($viewInfo) { ?>
		<p>
			Have you ever thought your profile picture displayed on your social media can be an inspiration and motivation for several? Yeah, a similar campaign is being initiated on social media from 8th-15th September 2014.  Under this campaign, one just needs to include his/her blood group in one's profile picture and describe the cause in the photo caption. The picture may be a blood group icon or any graphical modification. You can also use Facebook application to do so.
		</p>
	</div>
	<?php } ?>
	
		<?php if(!$submitted) { ?>
		
		<div class="cause-form-wrap well">
			<form action="" method="POST" class="cause-form">

					<label for="blood_group">Blood Group: </label>
					<select class="form-control" name="blood_group">
						<option value="">Select Blood Group</option>
						<option value="A+VE">A+VE</option>
						<option value="A-VE">A-VE</option>
						<option value="B+VE">B+VE</option>
						<option value="B-VE">B-VE</option>
						<option value="O+VE">O+VE</option>
						<option value="O-VE">O-VE</option>
						<option value="AB+VE">AB+VE</option>
						<option value="AB-VE">AB-VE</option>
					</select>
					
					<label for="position">Badge Position: </label>
					<select class="form-control" name="position">
						<option value="">Select Position</option>
						<option value="lt">Top Left</option>
						<option value="rt">Top Right</option>
						<option value="lb">Bottom Left</option>
						<option value="rb">Bottom Right</option>
					</select>
				<button class="btn btn-primary" type="submit" name="submit">NEXT</button>
		
			</form>
		</div>
		
		<div class="cause-description section">
		<h4 class="cause-tagline">How To Use?</h4>
			<p>The process goes as below: </p>
			 <div class="cause-sample-image">
				<img src="image/bgt_site_result.png">
			 </div><br>
		
		</div>
		<?php }
			
		if($submitted) { ?>
		
		<div class="user-image" style="text-align:center;margin-top:60px;margin-bottom:36px;">
			<?php echo '<img style="box-shadow:0 0 35px 0 #000000;" src="uploads/' . $userID . 'b.jpg" >'; ?>
		</div>
		
		<div class="fb-like-page-box">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fyouthforblood&amp;width&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=525419704254994" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:62px;" allowTransparency="true"></iframe>
		</div>
		
		<div class="fb-like-url-box">
			<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fbgt.youthforblood.org%2F&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=525419704254994" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
		</div>
		
		<div class="post-button download-button">
			<?php echo '<a class="btn btn-primary" href="thankyou.php?id=' . $userID . '">Download This Image</a>'; ?>

		</div>
		<?php
		}
	?>	
   </body>
</html>
