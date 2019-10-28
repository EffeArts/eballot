
<div class="card border-success">
	<div class="card-header border-success">
		Menu
	</div>
	<ul class="list-group list-group-flush">

		<li class="list-group-item">
			<a href="{{ route('live_status') }}">Live Elections</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('elections') }}">Candidates</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('elections/positions') }}">Positions</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('vote') }}">Vote</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('results') }}">Results</a>
		</li>
		<!-- <li class="list-group-item">
			<a href="{{ route('terms') }}">Terms & Conditions</a>
		</li> -->
	</ul>
</div>