@foreach($data as $key => $elements)
    @if($key == 'full1')
        <b>For what purpose do you purchase pens and markers? :</b> {{$elements}}<br>
    @elseif($key == 'full2')
        <b>What influences your purchase of pens and markers? :</b> {{$elements}}<br>
    @elseif($key == 'full3')
        <b>Where do you usually purchase pens and markers? :</b> {{$elements}}<br>
    @else
        @if($key !== 'agree')
            <b>{{$key}} :</b> {{$elements}}<br>
        @endif
    @endif
@endforeach