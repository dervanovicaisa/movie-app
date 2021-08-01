@foreach ($movie_search as $movie)
<div class="col-lg-4">
    <div style="margin-bottom: 3%;">
        <select name="mark" id="mark">
            <option value="watched">watched</option>
            <option value="not finished">not finished</option>
            <option value="want to watch">want to watch</option>
            <option value="watching">watching</option>
        </select>
    </div>
    <a class="zoom green " href="{{ route('movie.show', $movie->show->id) }}">
        @if($movie->show->image != null)
        <img class="img-responsive"
            src="{{$movie->show->image->original}}" alt="" />
        @endif
        </a>
    <p>{{ $movie->show->name }}</p>
</div>
@endforeach