@foreach($filter_category as $data)
@if(!empty($data['parent']))
<li class="dropdown">
    <a href="{{ url('products').'/'.$data['parent']['category_row_id'] }}" class="dropdown-toggle  hyper" data-toggle="dropdown" >
        <span>{{ $data['parent']['category_name'] }}<b class="caret"></b></span>
    </a>
    @if(!empty($data['child']))
       @php
            $total_child = count($data['child']);
           $total_cell = ceil($total_child/4);
            $child_row_id = array();
        @endphp
        <ul class="dropdown-menu multi">
            <div class="row">
                @for ($i = 0; $i < $total_cell; $i++)
                    <div class="col-sm-3">
                        <ul class="multi-column-dropdown">
                                   @php
                                    $itemcount = 0; 
                            @endphp
                          @foreach($data['child'] as $childitems)
                                    @if(!in_array($childitems['category_row_id'], $child_row_id) && ($itemcount <= 3))
                                        <li>
                                            <a href="{{ url('products').'/'.$childitems['category_row_id'] }}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $childitems['category_name'] }}</a>
                                        </li>
                                        @php 
                                            array_push($child_row_id, $childitems['category_row_id']);
                                            $itemcount++;
                                        @endphp
                                    @endif
                                @endforeach
                        </ul>
                    </div>
                @endfor
                <div class="col-sm-3 w3l">
                    <a href="#">
                        <img src="{{ asset('uploads/category/thumbnail').'/'.$data['parent']['category_image'] }}" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </ul>
@endif

</li>
@endif
@endforeach