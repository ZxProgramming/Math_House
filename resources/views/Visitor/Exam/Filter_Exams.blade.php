
@include('Visitor.inc.header')
@include('Visitor.inc.menu')

<form action="{{route('filter_exam')}}" method="POST">
    @csrf
    <div style="padding: 100px 100px 0 100px">
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
        </div>
        
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

            <button class="btn btn-primary mx-2 px-4">
                Search
            </button>
        </div>
    </div>
</form>

<table class="table">
    @foreach ( $exam_items as $item )
    <tr>
        <td class="px-5">
            <div style="font-size: 19px; color:black;font-weight: bold;" type="button" class="btn btn-primary wallet_btn" data-bs-toggle="modal" data-bs-target="#modalCenter">
                {{date('M', ($item->month - 1)* 31 * 24 * 60 *60)}}
                {{$item->year}}
            </div> 

            <div class="modal show_wallet fade show d-none" id="modalCenter" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Exam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Start Exam ??

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary close_wallet_btn" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a class="btn btn-success" href="{{route('exam_page', ['id' => $item->id])}}">
                        Start
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
</table>

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

<script>
    let wallet_btn = document.querySelectorAll('.wallet_btn');
    let show_wallet = document.querySelectorAll('.show_wallet');
    let btn_close = document.querySelectorAll('.btn-close');
    let close_wallet_btn = document.querySelectorAll('.close_wallet_btn');

    for (let i = 0, end = wallet_btn.length; i < end; i++) {
        wallet_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == wallet_btn[j] ) {
                    show_wallet[j].classList.remove('d-none');
                }
            }
        })
        btn_close[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == show_wallet[j] ) {
                    show_wallet[j].classList.add('d-none');
                }
            }
        })
        close_wallet_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == close_wallet_btn[j] ) {
                    show_wallet[j].classList.add('d-none');
                }
            }
        })
    }
</script>

@include('Visitor.inc.footer')