<div class="col-sm-6" style="float: right;">
    <ul class="pagination">
        @if($current <= 1)
            <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
                <a href="#">Previous</a>
            </li>
        @else
            <li class="paginate_button previous" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
                <a href="{{$home . ($current -1) }}">Previous</a>
            </li>
        @endif
        @php
            $start = $current < ($total - 4 ) ? $current : ($total -4 > 0 ? $total - 4 : 1);
            $end = $current + 4 > $total ? $total : ($current + 4);
        @endphp
        @if(($start - 1) > 1)
                <li class="paginate_button" aria-controls="dataTables-example" tabindex="0">
                    <a href="{{$home}}1">1</a>
                </li>
            <li class="paginate_button" aria-controls="dataTables-example" tabindex="0">
                <a href="#">...</a>
            </li>
        @endif
        @for($i=$start ; $i <= $end; $i++)
            @if($current == $i)
                <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
                    <a href="#">{{$i}}</a>
                </li>
            @else
                <li class="paginate_button" aria-controls="dataTables-example" tabindex="0">
                    <a href="{{$home . $i}}">{{$i}}</a>
                </li>
            @endif
        @endfor
        @if(($end + 1) < $total)
            <li class="paginate_button" aria-controls="dataTables-example" tabindex="0">
                <a href="#">...</a>
            </li>
        @endif
        @if($end < $total)
            <li class="paginate_button" aria-controls="dataTables-example" tabindex="0">
                <a href="{{$home . $total}}">{{$total}}</a>
            </li>
        @endif

        @if($current >= $total)
            <li class="paginate_button next disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
                <a href="#">Next</a>
            </li>
        @else
            <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
                <a href="{{$home . ($current  + 1)}}">Next</a>
            </li>
        @endif
    </ul>
</div>
