<div class="module row spaced">
	<div class="col-md-8">
		<div class="row">
			<% include Slideshow %>
<!--			<div class="col-xs-12">
				<div class="thumbnail"><img class="img-responsive" src="/assets/showpic.jpg" alt="..." /></div>
			</div>-->
		</div>
	</div>
	<div class="col-md-4">
		<% loop $Sections %>
		<article class="actions">
			<h2>$Title</h2>
			$Body
		</article>	
		<% end_loop %>
	</div>
</div>
<div class="row">
	<div class="col-md-6 module spaced">
		<h3 class="module-title">
			<i class="fa fa-facebook fa-fw"> </i> Facebook
		</h3>
		<div class="fb-page"  data-href="https://www.facebook.com/showbizqt/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/showbizqt/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/showbizqt/">Showbiz Queenstown</a></blockquote></div>
	</div>
	<div class="col-md-6 module spaced">
		<h3 class="module-title">
			<i class="fa fa-twitter fa-fw"> </i> Twitter
		</h3>
		<a class="twitter-timeline" href="https://twitter.com/ShowbizQT" data-height="500">Tweets by ShobizQT</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
<!--	<div class="col-md-4 module spaced">
		<h3 class="module-title">
			Righty
		</h3>
		<p class="module-inner">
			Stuff!!!
		</p>
	</div>-->
</div>
