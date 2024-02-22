
@include('Visitor.inc.header')
@include('Visitor.inc.menu')

<form action="{{route('v_filter_question')}}" method="POST">
    @csrf
    <div style="padding: 100px 100px 0 100px">
        <div class="d-flex my-2">
            <select class="form-control mx-2" name="year">
                <option disabled selected>
                    Select Year ...
                </option>
                @for ($i = date('Y'); $i > 1950; $i--)
                    <option value="{{$i}}">
                        {{$i}}
                    </option>
                @endfor
            </select>
            <select class="form-control mx-2" name="month">
                <option disabled selected>
                    Select Month ...
                </option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{$i}}">
                        {{date('M', ($i - 1)* 31 * 24 * 60 *60)}}
                    </option>
                @endfor
            </select>
            <input class="form-control mx-2" name="section" placeholder="Section" />
        </div>
        
        <div class="d-flex my-2">
            <input class="form-control mx-2" name="q_code" placeholder="Code" />
            <input class="form-control mx-2" name="q_num" placeholder="Question Number" />

            <button class="btn btn-primary mx-2 px-4">
                Search
            </button>
        </div>
    </div>
</form>

<table class="table">
    @foreach ( $q_items as $item )
    <tr>
        <td class="px-5">
            <a style="font-size: 19px; color:black;font-weight: bold;" 
            href="{{route('q_page', ['id' => $item->id])}}">
                {{date('M', ($item->month - 1)* 31 * 24 * 60 *60)}}
                {{$item->year}}
                Section : {{$item->section}}
                Code : {{$item->q_code}}
                QNumber : {{$item->q_num}}
            </a>
        </td>
    </tr>
    @endforeach
</table>

@include('Visitor.inc.footer')