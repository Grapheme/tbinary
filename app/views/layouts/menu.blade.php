<ul class="nav-list clearfix">

	@foreach($menu as $url => $name)

		<li class="nav-item"><a href="{{slink::to($url)}}">{{$name}}</a></li>

	@endforeach

</ul>