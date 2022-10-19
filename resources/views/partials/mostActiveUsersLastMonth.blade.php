
<div class="card mb-3" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title">Most Active Users last month</h5>
        <h6 class="card-subtitle mb-2 text-muted">Users with most posts written last month</h6>
    </div>
    <ul class="list-group list-group-flush">
        @foreach($mostActiveUsersLastMonth as $user)
            <li class="list-group-item">
                {{$user->name}}
            </li>
        @endforeach
    </ul>
</div>

