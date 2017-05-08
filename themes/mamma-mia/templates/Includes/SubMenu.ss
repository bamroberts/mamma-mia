<div class="sub-menu ribbon"> 
	<ul>
<% loop $SubMenu %>
		<li class="$Class">
			<div class="ribbon-main">
				<a href="$HREF#<% if Hash %>$Hash<% else %>content<% end_if %>">$Title</a>
			</div>
		</li>
<% end_loop %>
	</ul>
</div>
