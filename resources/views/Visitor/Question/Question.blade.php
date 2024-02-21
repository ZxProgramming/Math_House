
@include('Visitor.inc.header')
@include('Visitor.inc.menu')

<form action="{{route('filter_exam')}}" method="POST">
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


@include('Visitor.inc.footer')