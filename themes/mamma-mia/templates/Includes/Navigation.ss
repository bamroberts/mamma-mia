
<div class="ribbon one">

	<div class="bk l">
		<div class="arrow top"></div> 
		<div class="arrow bottom"></div>
	</div>

	<div class="skew l"></div>

	<div class="ribbon-main">
		<div>
			<input type="checkbox" id="menu-toggle" class="hidden" name="menu-toggle" value="0" />
			<ul class="">
				<li class="menu"><label for="menu-toggle">Menu</label></li>
				<% loop $Menu(1) %>
					<li class="menu-item <% if LinkOrSection = section %>active<% end_if %>">
						<a href="$Link" title="$Title.XML">
							$MenuTitle.XML
							<% if LinkOrSection = section %>
								<span class="sr-only">
									(current)
								</span>
							<% end_if %>
						</a>
					</li>
				<% end_loop %>
				<li class="book pull-right"><a href="/tickets" class="btn-danger">BOOK NOW!</a></li>
			</ul> 
		</div>   
	</div>

	<div class="skew r"></div>

	<div class="bk r">
		<div class="arrow top"></div> 
		<div class="arrow bottom"></div>
	</div>

</div>