<br />
<% if test %>
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
<% end_if %>

<article id="sponsor" class="alert alert-info">
	$Content
	<br />
	<p class="text-center"><a class="btn btn-default" href="/assets/Mamma-Mia-Sponsorship-Booklet.pdf" ><i class="fa fa-file-pdf-o fa-4x text-danger" aria-hidden="true"> </i> Mamma Mia! Sponsor Info Pack <i class="fa fa-download fa-2x" aria-hidden="true"> </i></a></p>
	<br />
	<a href="/contact/" class="btn btn-action btn-danger">Get in contact</a>
</article>
