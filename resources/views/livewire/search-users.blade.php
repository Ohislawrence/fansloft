<div>
    <input wire:model="search" type="text" placeholder="Search users..."/>

    <ul>
        @foreach($users as $user)
            <li>{{ $user->brandname }}</li>
        @endforeach
    </ul>
</div>