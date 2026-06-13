<h1> Multiplication Table for{{$nbr}}</h1>
<table border="1">
    <tr>
        <th>Multiplier</th>
        <th>Result</th>
    </tr>
    @for($i=1;$i<=10;$i++)
     <tr>
        <td>{{$i}}</td>
        <td>{{$i*$nbr}}</td>
     </tr>
     @endfor
    </table>
 