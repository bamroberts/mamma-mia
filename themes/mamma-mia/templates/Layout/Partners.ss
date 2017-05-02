<br />
<div class="jumbotron">
  <h1>Headline Sponsor</h1>
  <p>Why we love these guys!</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
<div class="alert btn-warning">
	<h4>We still have sponsorship oportinites avaialble. <a href="#sponsor" class="btn btn-default pull-right">Find out more</a></h4>
</div>

<div class="partners sponsors module">
<h2>Key Partners</h2>
	<div class="row platinum">
	<% loop $Platinum %>
		<div class="col-md-4">
			<% include Thumbnail %>
		</div>	
	<% end_loop %>	
	</div>
</div>

<div class="sponsors main">
	<div class="module"><h2>Sponsors</h2></div>
	<% if Gold %>
	<div class="row gold">
		<% loop Gold %>
		<div class="col-md-3 col-sm-4 col-xs-6 ">
			<% include Thumbnail %>
		</div>	
		<% end_loop %>
	</div>
	<% end_if %>
	
	
	<% if Silver %>
	<div class="row silver">
		<% loop Silver %>
		<div class="col-md-2 col-sm-3 col-xs-4">
			<% include Thumbnail %>
		</div>	<% end_loop %>
	</div>
	<% end_if %>
	
	<% if Bronze %>
	<div class="row bronze">
		<% loop Bronze %>
		<div class="col-md-1 col-sm-2 col-xs-3">
			<% include Thumbnail %>
		</div>
		<% end_loop %>
	</div>
	<% end_if %>	
</div>	
<br />
<article id="sponsor" class="alert alert-info">
	$Content
	<br />
	<a href="/contact/" class="btn btn-action btn-danger">Get in contact</a>
</article>
