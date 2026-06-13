<h1>Multiplication table of {{ $num }}</h1>

<table border="1">
    <tr>
        <th>Multiplier</th>
        <th>Result</th>
    </tr>
    @for($i=1;$i<=10;$i++)
    <tr>
        <td>{{ $i }}</td>
        <td>{{ $i*$num }}</td>
    </tr>
    @endfor
</table>