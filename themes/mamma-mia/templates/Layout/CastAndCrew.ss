<% if Content %>
	$Content
<% else %>
<div class="module">
	<h2>Cast<a name="cast"></a></h2>
	<% if $Cast %>
		<div class="row">
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

	<h2>Crew<a name="crew"></a></h2>
	<% if $Crew %>
		<div class="row">
		<% loop $Creative %>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<% include Thumbnail %>
			</div>	
		<% end_loop %>
		</div>
		<div class="row">
		<% loop $Crew %>
			<div class="col-md-3 col-sm-4 col-xs-6">
				<% include Thumbnail %>
			</div>	
		<% end_loop %>
		</div>
	<% end_if %>

	<h2>Committee<a name="committee"></a></h2>
	<% if $Committee %>
		<div class="row">
		<% loop $Committee %>
		<div class="col-md-3 col-sm-4 col-xs-6">
			<% include Thumbnail %>
		</div>	
		<% end_loop %>
		</div>
	
	<% end_if %>	
</div>
<% end_if %>

