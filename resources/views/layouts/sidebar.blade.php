
<div class="card border-success">
	<div class="card-header border-success">
		Menu
	</div>
	<ul class="list-group list-group-flush">
		@if(Auth::user()->role_id == 1)
		<li class="list-group-item">
			<a href="{{ route('users.index') }}">All Users</a>
		</li>
		@endif
		<li class="list-group-item">
			<a href="{{ route('allowed_voters.index') }}">Allowed voters</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('candidates.index') }}">Candidates</a>
		</li>
		<li class="list-group-item">
			<a href="{{ route('registered_voters.index') }}">Registered voters</a>
		</li>
	</ul>
</div>