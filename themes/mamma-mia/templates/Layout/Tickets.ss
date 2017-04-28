
<div class="tickets module clearfix pull-right">
	
	<div class="key pull-right">
		<ul class="list-unstyled">
			<li class="ticket-price-group-A"><span class="ticket-seat"></span>Premium Seat</li>
			<li class="ticket-price-group-B"><span class="ticket-seat"></span>Standard Seat</li>
			
		</ul>
	</div>
	<h3>Seating Plan</h3>
	$renderSeats
	<div class="tickets-stage"></div>
	
</div>
<div class="perfomances">
	<h3>Performances</h3>
	<ul class="list-unstyled">
		<% loop Perfomances %>
		<li><h4>$Time.Nice - $Date.Nice</h4><p>Adult <span title="Adult Standard Seat" data-toggle="tooltip">${$AdultB}</span>-<span title="Adult Premium Seat" data-toggle="tooltip">${$AdultA}</span> | Child <span title="Child Standard Seat" data-toggle="tooltip">${$ChildB}</span>-<span title="Child Premium Seat" data-toggle="tooltip">${$ChildA}</span>
		<% end_loop %>
	</ul>
</div>