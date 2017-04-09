<div class="row">
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#cast">Cast</a></li>
			<li><a href="#crew">Crew</a></li>
			<li><a href="#committee">Committee</a></li>
		</ul>
	</div>	
	<div class="col-md-10">
		$Content
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
				<% loop $Crew %>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<% include Thumbnail %>
				</div>	
				<% end_loop %>
				</div>
			<% else %>
				The production has not been cast yet, watch this space, or you want to be involved sign up for our for an Audition Pack
			<% end_if %>
			
			<h2>Committee<a name="committee"></a></h2>
			<% if $Committee %>
				<div class="row">
				<% loop $Committee %>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<% include Thumbnail %>
				</div>	
				<% end_loop %>
				</div>
			<% else %>
				$crewform
			<% end_if %>	
		</div>
	</div>
</div>