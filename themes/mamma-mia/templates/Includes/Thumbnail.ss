
<div class="thumbnail">
	<% if $Photo.Exists %>
		$Photo.Fill(300,300).Tag
	<% else %>
		<img class="missing" src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
	<% end_if %>
	<div class="caption">
		<div class="inner">
			<h3>$Name<small>$Title</small></h3>
			<% if $Bio %> 
				<div class="bio">$Bio</div>
			<% end_if %>	
		</div>
	</div>

</div>