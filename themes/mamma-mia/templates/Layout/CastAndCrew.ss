<% if Content %>
	$Content
<% else %>
<div class="module cast-and-crew">	
	<h2 id="crew">Creative Team</h2>
	<% if $Crew %>
		<div class="row creative">
		<% loop $Creative %>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<% include Thumbnail %>
			</div>	
		<% end_loop %>
		</div>
		<div class="row crew">
		<% loop $Crew %>
			<div class="col-md-3 col-sm-4 col-xs-6">
				<% include Thumbnail %>
			</div>	
		<% end_loop %>
		</div>
	<% end_if %>
	
	<h2 id="cast">Cast</h2>
	<% if $Cast %>
		<div class="row cast">
		<% loop $Cast %>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<% include Thumbnail %>
		</div>	
		<% end_loop %>
		</div>
	<% else %>
	<div class="alert alert-info">
		The production has not been cast yet, watch this space, or you want to be involved sign up for our for an Audition Pack
	</div>	
	<% end_if %>


	<% if $Committee %>
	<h2 id="committee">Committee</h2>
	
		<div class="row committee">
		<% loop $Committee %>
		<div class="col-md-3 col-sm-4 col-xs-6">
			<% include Thumbnail %>
		</div>	
		<% end_loop %>
		</div>
	
	<% end_if %>	
</div>
<% end_if %>

