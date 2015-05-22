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
  </head>
  <body>
	<div class="cause-heading">
		<h1><a href="http://bgt.youthforblood.org">Thank You</a></h1>
	</div>
	<div class="cause-description">
	<h2 class="cause-title">Please wait ...One more step left</h2>
	<h4 class="cause-tagline">Copy the text below & use it as photo caption OR status</h4>
		<p>
		</p>
	</div>
	<div class="status-copy">
		<?php
			
			$message = "My profile picture says my Blood Group. ";
			$message .= "I am supporting a special cause initiated by Youth For Blood ";
			$message .= "Lets Support !! http://bgt.youthforblood.org/ ";
			$message .= "\n#BGTYFB";
		?>
		<textarea class="form-control"><?php echo $message; ?></textarea>
	</div>
		
	<div class="thankyou-page fb-like-url-box">
		<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fbgt.youthforblood.org%2F&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=525419704254994" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
	</div>
		
	<h4 class="cause-tagline" style="margin-top: 10px;">Thank you for your support</h4>
		<script>
			top.location.href = "http://bgt.youthforblood.org/dl.php?id=<?php echo $_GET['id']; ?>";
		</script>
   </body>
</html>
