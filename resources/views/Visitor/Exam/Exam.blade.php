
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
            <select class="form-control mx-2" name="code_id">
                <option disabled selected>
                    Select Exam Code ...
                </option>
                @foreach ( $exam_code as $item )
                    <option value="{{$item->id}}">
                        {{$item->exam_code}}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="d-flex my-2">
            <select class="form-control mx-2 cate_sel">
                <option disabled selected>
                    Select Category ...
                </option>
                @foreach ( $categories as $item )
                    <option value="{{$item->id}}">
                        {{$item->cate_name}}
                    </option>
                @endforeach
            </select>
            
            <input type="hidden" class="courses_data" value="{{$courses}}" />

            <select class="form-control mx-2 course_sel" name="course_id">
                <option disabled selected>
                    Select Course ...
                </option>
            </select>


            <button class="btn btn-primary mx-2 px-4">
                Search
            </button>
        </div>
    </div>
</form>


<script>
    let cate_sel = document.querySelector('.cate_sel');
    let course_sel = document.querySelector('.course_sel');
    let courses_data = document.querySelector('.courses_data');
    courses_data = courses_data.value;
    courses_data = JSON.parse(courses_data);

    cate_sel.addEventListener('change', () => {
            course_sel.innerHTML = `
            <option disabled selected>
                Select Course ...
            </option>
            `;
        courses_data.forEach( item => {
            if ( cate_sel.value == item.category_id ) {
                course_sel.innerHTML += `
                <option value="${item.id}">
                    ${item.course_name}
                </option>
                `;
            }
        });
    });
</script>
@include('Visitor.inc.footer')