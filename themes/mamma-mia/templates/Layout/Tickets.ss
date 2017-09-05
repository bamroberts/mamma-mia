<div class="tickets module clearfix pull-right">
	
	<div class="key pull-right">
		<ul class="list-unstyled">
			<li class="ticket-price-group-A"><span class="ticket-seat"></span>Premium Seat</li>
			<li class="ticket-price-group-B"><span class="ticket-seat"></span>Standard Seat</li>
			
		</ul>
	</div>
	<h3>Seating Plan</h3>
	<div class="seating-plan">
		<div class="seats">
			$renderSeats
		</div>
		<div class="tickets-stage"></div>
	</div>
	
</div>
<div class="perfomances clearfix">
	<h3>Performances</h3>
	<ul class="list-unstyled">
		<% loop Perfomances %>
		<li><h4>$Time.Nice - $Date.Nice</h4><p>Adult <span title="Adult Standard Seat" data-toggle="tooltip">${$AdultB}</span> - <span title="Adult Premium Seat" data-toggle="tooltip">${$AdultA}</span> | Child <span title="Child Standard Seat" data-toggle="tooltip">${$ChildB}</span> - <span title="Child Premium Seat" data-toggle="tooltip">${$ChildA}</span>
		<% end_loop %>
	</ul>
</div>
<h3>Venue - Queenstown Events Centre</h3>
<div class="row">
	<div class="col-sm-6"><img src="/assets/Alpine-Aqualand1.jpg" class="img-responsive"><br /><img src="/assets/mainviewfinal.jpg" class="img-responsive"></div>
	<div class="col-sm-6">
		<iframe
		width="100%"
		height="450"
		frameborder="0" style="border:0"
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD4rVmXyrPM7ZArA0bkq5wBXqPDNHVkiu8&q=Queenstown Events Centre, Joe O'connell Drive, Queenstown" allowfullscreen>
		</iframe>
	</div>
</div>
