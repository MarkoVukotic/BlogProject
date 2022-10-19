
    <div class="card mb-3" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">Most Active Users</h5>
                <h6 class="card-subtitle mb-2 text-muted">Users with most posts written</h6>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($mostActiveUsers as $user)
                <li class="list-group-item">
                        {{$user->name}}
                </li>
            @endforeach
        </ul>
    </div>

