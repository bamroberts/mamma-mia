<div class="clearfix bio-page alert alert-info">	
	<div class="row bio">
		<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 module pull-right bio-name">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 class="module-title">$Name <small>$Title</small></h2>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-5 module bio-pic">
			<% if $Photo.Exists %>
				$Photo.pad(300,300,FFFFFF,1).getTag(img-responsive)
			<% else %>
				<img class="missing" src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
			<% end_if %>
		</div>
		
		<article class="pad bio-body">
			<div>$Bio</div>
		</article>
		
	</div>
	
</div>
