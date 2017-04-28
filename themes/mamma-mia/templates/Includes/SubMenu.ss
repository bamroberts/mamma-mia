<div class="sub-menu ribbon"> 
	<ul>
<% loop $SubMenu %>
		<li class="$Class">
			<div class="ribbon-main">
				<a href="$HREF">$Title</a>
			</div>
		</li>
<% end_loop %>
	</ul>
</div>
