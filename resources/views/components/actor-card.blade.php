<div class="mt-8 px-4 py-4 hover:shadow-md">
    <a href="{{ route('actors.show', $actor['id']) }}">
        <img src="https://image.tmdb.org/t/p/w300/{{ $actor['profile_path'] }}" alt="profile" class="hover:opacity-75 transition ease-in-out duration-150" onerror="this.onerror=null;this.src='https://via.placeholder.com/300x450?text=IMAGE+NOT+AVAILABLE';">
    </a>
    <div class="mt-2">
        <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg mt-2 hover:text-black:300">{{ $actor['name'] }}</a>
    </div>
</div>
