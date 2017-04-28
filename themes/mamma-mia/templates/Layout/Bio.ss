<div class="clearfix bio-page alert alert-info">
	<div class="module pull-right bio-heading">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h2 class="module-title">$Name <small>$Title</small></h2>
	</div>
	<div class="module pull-left bio-photo">
		<% if $Photo.Exists %>
			$Photo.pad(300,300,FFFFFF,1).getTag(img-responsive)
		<% else %>
			<img class="missing" src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
		<% end_if %>
	</div>
	<div class="bio-content">
		
		<article class="pad">
			<div>$Bio</div>
		</article>
	</div>
</div>
