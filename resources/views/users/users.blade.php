<ul>
    @foreach ($users as $key=>$user)
        <li>{{$user}}</li>
        <li>
            <a href="details/{{$key}}">details</a>
        </li>
    @endforeach
</ul>