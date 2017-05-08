
<nav class="ribbon one greedy" id="content">

	<div class="bk l">
		<div class="arrow top"></div> 
		<div class="arrow bottom"></div>
	</div>

	<div class="skew l"></div>

	<div class="ribbon-main">
		<div>
			<% with $SiteConfig %>
			<% if TicketsForSale %>
				<ul class="buy"><li class="book pull-right"><a href="/tickets" class="btn-danger">BOOK NOW!</a></li></ul> 
			<% end_if %>
			<% end_with %>
			<ul class="links">
				<% loop $Menu(1) %>
					<li class="menu-item <% if LinkOrSection = section %>active<% end_if %>">
						<a href="$Link<% if Title != Home %>#content<% end_if %>" title="$Title.XML">
							$MenuTitle.XML
							<% if LinkOrSection = section %>
								<span class="sr-only">
									(current)
								</span>
							<% end_if %>
						</a>
					</li>
				<% end_loop %>
				
			</ul>
			<span count="0" class="hidden greedy-trigger"><label><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;<span class="menu">Menu</label></span>
			<ul class='hidden-links hidden'></ul>
		</div>   
	</div>

	<div class="skew r"></div>

	<div class="bk r">
		<div class="arrow top"></div> 
		<div class="arrow bottom"></div>
	</div>

</nav>