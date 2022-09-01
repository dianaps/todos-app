<div>
    <div class="container border">
        <input wire:model='search' class="form-control me-2" type="search" placeholder="Search todos" aria-label="Search title">
        <ul>
            @foreach ($todos as $todo)
                <li>{{$todo->title}}</li>
            @endforeach
        </ul>
    </div>
</div>
