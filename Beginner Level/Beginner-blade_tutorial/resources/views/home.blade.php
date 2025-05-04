@include('pages.header')
<h2>Home Page</h2>




@php
    $user = 'Yahoo Baba';
    $names = ['Salman Khan', 'John Abraham', 'Sahid kapoor'];
    $userName = 'Yahoo Baba';
@endphp



<ul>
    @foreach ($names as $name)
        @if ($loop->first)
            <li style="color: red">{{ $name }}</li>
        @elseif($loop->last)
            <li style="color:green">{{ $name }}</li>
        @else
            <li style="color:blue">{{ $name }}</li>
        @endif
    @endforeach
</ul>

<ul>
    @foreach ($names as $name)
        @if ($loop->even)
            <li style="color: red">{{ $name }}</li>
        @elseif ($loop->odd)
            <li style="color:green">{{ $name }}</li>
        @endif
    @endforeach
</ul>

{{$userName}}


{!!'<script>
        alert("Welcome");
    </script>'!!}


@include('pages.footer')

