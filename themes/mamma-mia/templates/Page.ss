<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Mamma Mia Queenstown | 7th - 12th Nov 2017 | Queenstown Events Centre </title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></link>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-zF4BRsG/fLiTGfR9QL82DrilZxrwgY/+du4p/c7J72zZj+FLYq4zY00RylP9ZjiT" crossorigin="anonymous"></link>

		<meta name="viewport" content="initial-scale=1, maximum-scale=1">		
    </head>
    <body>
		<div id="curtain-left" class="curtain"></div>
		<div id="curatin-right" class="curtain curtain-right"></div>
		<div id="wrapper">
			<div class="squeeze pad">
				<% include Header %>	
			</div>
			<% if CurrentMember %>
				<% include Navigation %>
			<% else %>
				<div class="squeeze alert btn-danger">The Mamma Mia Queenstown Microsite isn't quite ready yet. If you are seeing this page though it means its only days away. Check back soon!!!</div>
			<% end_if %>
			<% if $Title = Home %>
				<div class="squeeze alert btn-danger">
					<h2>
						
						Audition registration is now open! 
						<a class="btn btn-primary pull-right" href="/contact/audition#content">Find out more</a>
						<br><small>Download the audition pack now and register to be part of this amazing show!</small>
					</h2>
				</div>
			<% end_if %>
			<div class="squeeze main-block">
				<% if $Title != Home %>
					<div class="module heading"><h2>$Title</h2></div> 
				<% end_if %>
				<div class="pad">
					<% if SubMenu %>
					<div class="row">
						<div class="col-sm-3">
							<% include SubMenu %>
						</div>
						<div class="col-sm-9 content">
							$Layout
						</div>
					</div>	
					<% else %>
						$Layout
					<% end_if %>
				</div>
				<footer class="module footer">
					<div class="row">
						<div class="col-md-4"><b><a href="http://www.showbizqt.co.nz" target="_blank">&copy;Showbiz Queenstown 2017</a></b></div>
						<div class="col-md-4"></div>
						<div class="col-md-4">Design&amp;Build by <a href="http://www.bamroberts.com" target="_blank">BAMRoberts</a></div>
					</div>	
				</footer>
			</div>
		</div>
		
		<div id="modal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">

			    </div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<a class="return-to-top" href="javascript:" id="return-to-top"></a>
		<div id="fb-root"></div>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-97232500-2', 'auto');
			ga('send', 'pageview');
		</script>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=187899894592528";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</body>
</html>
