
<div class="thumbnail">
	<% if $Photo.Exists %>
		$Photo.pad(300,300,FFFFFF,1).Tag
	<% else %>
		<img class="missing" src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
	<% end_if %>
	<div class="caption">
		<div class="inner">
			<h3>$Name<small>$Title</small></h3>
			<!--
			<% if $Bio %> 
				<div class="bio">$Bio</div>
			<% end_if %>	
			<a href="$Link" data-toggle="modal" data-target="#modal" ><span class="btn btn-action btn-primary">Read more</span></a>
   -->
		</div>
	</div>

</div>