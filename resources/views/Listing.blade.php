<h1>{{$heading}}</h1>

@unless(!$listing)

<h2> {{$listing['title']}} </h2>
<p> {{$listing['description']}} </p>


@else
<p>no listing with such id</p>
@endunless