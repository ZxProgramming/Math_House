
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
            <div style="font-size: 19px; color:black;font-weight: bold;" type="button" class="btn btn-primary wallet_btn" data-bs-toggle="modal" data-bs-target="#modalCenter">
                {{date('M', ($item->month - 1)* 31 * 24 * 60 *60)}}
                {{$item->year}}
                Section : {{$item->section}}
                Code : {{$item->q_code}}
                QNumber : {{$item->q_num}}
            </div> 

            <div class="modal show_wallet fade show d-none" id="modalCenter" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Start Question ??

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary close_wallet_btn" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a class="btn btn-success"  href="{{route('q_page', ['id' => $item->id])}}">
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