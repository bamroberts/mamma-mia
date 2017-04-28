<article>
	<h4>$Heading</h4>
	<div class="row">
		<div class="col-sm-7">$TheShow</div>

		<div class="col-sm-5 module">
			<% loop Quotes %>
				<blockquote <% if Even %>class="blockquote-reverse"<% end_if %>>
					<% if $Star %>
						<div class="h2 text-center">$renderStar</div>
					<% end_if %>
					<h3>&ldquo;$Quote&rdquo;</h3>
					<footer>$Author</footer>
				</blockquote>
			<% end_loop %>
		</div>
	</div>	
</article>

<article>

	<h4>About Showbiz Queenstown</h4>
	<div class="row">
		<div class="col-xs-9 col-md-7">$Showbiz</div>

		<div class="col-xs-3 col-md-5">
			<img class="img-responsive" src="/showbiz-large.png" />
		</div>
	</div>	
	
</article>
