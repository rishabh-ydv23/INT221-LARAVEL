// if else foreach vagaira ke liye normal blade use karo
leking jab hume calculations ya variable create karna ho to hum ... @php use karenege 


<?php 
$str="Sukhwinder kaur";
$len=strlen($str);
echo "The length of the string is $len","<br>";
$word=str_word_count($str);
echo "The word length is $word ";
?> 


@php
$colors=["red","black", "yellow","white" ,"pink"];
@endphp
@foreach($colors as $n1)
{{$n1}}
<br>
@endforeach


@if($n%2==0)
<h2>The num is even</h2>
@else
<h2> The num is odd</h2>
@endif 


@for($i=0;$i<=10;$i++)
Number: {{$i}}
<br>
@endfor 


<h1>Hi</h1>
<script>alert('Hi')</script>


@php 
$fruits=["apple","orange","mango"];
@endphp
<ul>
    @foreach($fruits as $n)
    <li> {{$loop->index}}- {{$n}}</li>                      //0 - apple 
    @endforeach 
</ul>


@php 
$i = 1; 
@endphp

@while($i <= 3)
    {{ $i }}
    @php 
    $i++;
    @endphp
@endwhile