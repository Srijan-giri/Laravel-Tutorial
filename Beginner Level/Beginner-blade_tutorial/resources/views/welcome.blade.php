{{-- normal print --}}

{{ "Hello" }}

<br>

@php
 $name = 'Srijan Giri';
@endphp

{{$name}}

<br>


{{-- print html element --}}

{!!'<h1>Hello Everyone</h1>'!!}


{!!'<pre>
        Hello Everyone
        This is a preformatted text
    </pre>'
!!}

@php
  $name = 'Srijan Giri';
  $age = 20;
@endphp

@if($name == 'Srijan Giri')
    {!!'<h1>Hello Srijan</h1>'!!}
@elseif($name == 'John Doe')
    {!!'<h1>Hello John</h1>'!!}
@else
    {!!'<h1>Hello Everyone</h1>'!!}
@endif


<br>

@switch($age)
 @case(18)
    {!!'<h1>You are 18</h1>'!!}
    @break
 @case(20)
    {!!'<h1>You are 20</h1>'!!}
    @break
 @default
    {!!'<h1>You are not 18 or 20</h1>'!!}
@endswitch


{{-- isset and empty --}}
@php
    $name = null;
@endphp

@if(isset($name))
    {{ $name }}
@else
    {{'John Doe'}}
@endif

<br/>

@if(empty($name))
    {{'Name is empty'}}
@else
    {{'Name is not empty'}}
@endif


{{-- loop is same --}}
@for($i = 0; $i < 10; $i++)
    {{ $i }}
@endfor

@php
    $fruits = array('apple', 'banana', 'orange');
@endphp

@foreach($fruits as $f)
  {{ $f}}
@endforeach

@php
 $collection = collect(['apple', 'banana', 'orange']);
@endphp

@forelse ($collection as $item)
    @if($loop->first)
      {!!"<p style=\" color: red\">".$item."</p>"!!}
    @elseif($loop->last)
      {!!"<p style=\" color: blue\">".$item."</p>"!!}
    @else
      {!!"<p style=\" color: green\">".$item."</p>"!!}
    @endif

@empty

    <p>No items found</p>

@endforelse


{{-- @continue , @break --}}
