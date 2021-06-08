

<ul>
    <?php for($i=0;$i<count($data);$i++){ ?>
   <li>{{$data[$i]}}</li>
   <?php } ?>
</ul>


   {{-- with foreach directive--}}

   <ul>
       
       @foreach ($data as $item)

       @if($item=='reactjs')
           <li>{{$item}}</li>
       @endif

       @endforeach
       

   </ul>