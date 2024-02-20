@php
    $page_name = 'Quizze';
    // $quizze->question;
    // "Mcq" => $item->mcq
    // "Grid" => $item->g_ans
    // api_quizze
@endphp
@section('title', 'Quizze')
@include('success')
<style>
    body {
        background: #fff !important;
    }

    .quizzes-page {
        width: 100%;
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .quizzes-page>header {
        width: 100%;
        padding: 0 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 3px solid #c9c9c9;
        padding-bottom: 10px;
        /* background: #000; */
    }

    .quizzes-page .type-quizzes {
        position: relative;
        width: calc(100% / 3);
        /* background: orange; */
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        font-size: 1.5rem;
    }

    .quizzes-page .type-quizzes>span:nth-child(1) {
        font-weight: 500;
    }

    .quizzes-page .type-quizzes span>.angle-show-disc {
        margin-left: 5px;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .rotateEle {
        transform: rotate(180deg);
    }

    .quizzes-page .type-quizzes .disc-ruels-quizzes {
        position: absolute;
        top: 100%;
        left: 25%;
        max-width: 150%;
        background: #dedede;
        font-size: 1.1rem;
        padding: 10px;
        border-radius: 10px;
        z-index: 100;
    }

    .quizzes-page .timer-quizzes {
        width: calc(100% / 3);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quizzes-page .timer-quizzes>div {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* row-gap: 10px */
    }

    .quizzes-page .timer-quizzes div:nth-child(1) {
        font-size: 1.5rem;
        font-weight: 600;
        text-align: center;
    }

    .quizzes-page .timer-quizzes button {
        font-size: 1.2rem;
        font-weight: 500;
        border: 1px solid #000;
        border-radius: 8px;
        padding: 3px 34px;
        transition: all 0.3s ease-in-out;
        background: #fff;
        color: #000;
    }

    .quizzes-page .timer-quizzes button:hover {
        background: #000;
        color: #fff;
    }


    .quizzes-page .options {
        position: relative;
        width: calc(100% / 3);
        display: flex;
        align-items: center;
        justify-content: flex-end;
        /* margin-right: 100px; */
    }

    /* style drop down */

    .btn-dropdown {
        position: relative;
        font-size: 1.6rem;
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        cursor: pointer;
        background: none;
        border: none;
        margin-right: 100px;
    }

    .options-list {
        position: absolute;
        top: 100%;
        left: -5%;
        width: 80%;
        margin: 0;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        list-style-type: none;
        background: #dedede;
        border: 1px solid #ccc;
        z-index: 100;
    }

    .options-list .options-tx {
        width: 100%;
        display: flex;
        flex-direction: column;
        row-gap: 10px;
    }

    .options-list .options-tx li {
        padding: 5px;
        text-align: center;
        cursor: pointer;
        font-size: 1.1rem;
    }

    .options-list .options-tx li:hover {
        background-color: #f5f5f5;
        border-radius: 1.1rem;
    }

    /* Main */
    main {
        width: 100%;
        min-height: 80vh;
        margin-top: 10px;
        padding-top: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    main .main-wrapper {
        width: 100%;
        padding: 0 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        row-gap: 10px;
        border-bottom: 3px dashed #e2e2e2;
    }

    main .main-wrapper .question {
        position: relative;
        width: 100%;
        background: #fff;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        column-gap: 10px;
        padding: 10px;
    }

    /* Question Side */
    main .main-wrapper .question .question-side {
        width: 50%;
        height: 550px;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow-y: scroll
    }

    /* width */
    main .main-wrapper .question .question-side::-webkit-scrollbar {
        width: 8px;
        border-radius: 10px;
    }

    /* Track */
    main .main-wrapper .question .question-side::-webkit-scrollbar-track {
        background: grey;
        border-radius: 10px;
    }

    /* Handle */
    main .main-wrapper .question .question-side::-webkit-scrollbar-thumb {
        background: rgb(226, 226, 226);
        border-radius: 10px;
    }

    main .main-wrapper .question .question-side .text-question {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        column-gap: 10px;
    }

    main .main-wrapper .question .question-side .text-question p {
        font-size: 1.2rem;
        font-weight: 500;
        width: 100%;
        text-align: start;
    }

    main .main-wrapper .question .question-side .img-question {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        row-gap: 10px;
        margin-bottom: 20px;
    }

    main .main-wrapper .question .question-side .img-question span {
        border-bottom: 2px solid #000;
        font-size: 1.2rem;
        font-weight: 600;
    }

    main .main-wrapper .question .question-side .img-question img {
        min-width: 80%;
        max-width: 80%;
        height: auto;
        object-fit: cover;
        object-position: center;
        border: 2px solid #000;
        border-radius: 10px;
    }

    /* Answer Side */
    main .main-wrapper .question .answer-side {
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* background: #20e690; */
        /* overflow-y: scroll */
    }

    /* width */
    /* main .main-wrapper .question .question-side::-webkit-scrollbar {
        width: 8px;
        border-radius: 10px;
    } */

    /* Track */
    /* main .main-wrapper .question .question-side::-webkit-scrollbar-track {
        background: grey;
        border-radius: 10px;
    } */

    /* Handle */
    /* main .main-wrapper .question .question-side::-webkit-scrollbar-thumb {
        background: rgb(226, 226, 226);
        border-radius: 10px;
    } */

    main .main-wrapper .question .answer-side .sup-question {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        column-gap: 10px;
    }

    .question-num {
        font-size: 1.3rem;
        font-weight: 600;
        background: #000;
        padding: 0 5px;
        border-radius: 50%;
        text-align: center;
        color: #fff;
        width: 40px;
    }

    main .main-wrapper .question .answer-side .sup-question p {
        width: 100%;
        color: #000;
        font-size: 1.2rem;
        font-weight: 500;
        text-align: start;
    }


    main .main-wrapper .question .answer-side .answer-chosen {
        width: 100%;
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        row-gap: 30px;
        align-items: center;
        padding: 5px;
    }


    main .main-wrapper .question .answer-side .answer-chosen .chosen {
        width: 80%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        background: #fefefe;
        border-radius: 20px;
        column-gap: 20px;
        padding: 5px 12px;
        cursor: pointer;
        transition: border 0.3s ease-in;
        box-shadow: 0px 0px 8px 3px rgb(4 4 4 / 18%);
    }

    main .main-wrapper .question .answer-side .answer-chosen .chosen:hover {
        outline: 3px solid #000;
        /* background: red; */
    }

    main .main-wrapper .question .answer-side .answer-chosen .chosen button {
        background: none;
        border-radius: 50%;
        padding: 0px 10px;
        text-align: center;
        font-weight: 500;
        font-size: 1.3rem;
    }

    main .main-wrapper .question .answer-side .answer-chosen .chosen input {
        border: none;
        font-size: 1.3rem;
        font-weight: 500;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 500px;
        background: none;
        cursor: pointer;
    }


    main .main-wrapper .question .answer-side .answer-setValue {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        row-gap: 80px;
        margin-top: 60px;
        /* background: red; */

    }

    main .main-wrapper .question .answer-side .answer-setValue .section-setValue {
        display: flex;
        align-items: center;
        column-gap: 10px;
    }

    main .main-wrapper .question .answer-side .answer-setValue .section-setValue span {
        font-size: 1.2rem;
        font-weight: 500;
    }

    main .main-wrapper .question .answer-side .answer-setValue .input_val {
        width: 35%;
        padding: 10px;
        border-radius: 10px;
        border: 2px solid #cdcdcd;
        border-radius: 20px;
        padding-bottom: 15px;
    }

    main .main-wrapper .question .answer-side .answer-setValue .input_val>input {
        width: 100%;
        border: none;
        font-size: 1.2rem;
        text-align: center;
        background: transparent;
        border-bottom: 2px dashed #c2c2c2;
    }

    main .main-wrapper .question .answer-side .answer-setValue .section-value {
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: flex-start;
        column-gap: 10px;
    }

    main .main-wrapper .question .answer-side .answer-setValue .section-value span {
        font-size: 1.2rem;
        font-weight: 500;
    }

    main .main-wrapper .question .answer-side .answer-setValue .section-value input {
        width: 50%;
        border: none;
        padding: 10px;
        background: none;
        font-size: 1.2rem;
        text-align: center;
        border-radius: 20px;
        border: 2px solid #cdcdcd;
    }

    /* Section Pagination  */
    main .paginationn {
        display: flex;
        text-align: center;
        margin-top: 15px;
        user-select: none;
    }

    main .paginationn>li {
        display: inline-block;
        margin: 5px;
        box-shadow: 0 5px 25px rgb(1 1 1 / 10%)
    }

    main .paginationn>li a {
        color: #fff;
        text-decoration: none;
        font-size: 1.2em;
        line-height: 45px;
    }

    main .paginationn>.currentt-page:hover {
        background: #0ab1ce;
    }

    main .paginationn>li:hover a {
        color: #fff !important;
    }

    .previouss-page,
    .nextt-page {
        background: #0ab1ce;
        width: 80px;
        border-radius: 45px;
        cursor: pointer;
        transition: 0.3s ease
    }

    main .previouss-page:hover {
        transform: translateX(-5px);
    }

    .nextt-page:hover {
        transform: translateX(5px);
    }

    .currentt-page,
    .dotss {
        background: #ccc;
        width: 45px;
        border-radius: 50%;
        cursor: pointer;
    }

    .activee {
        background: #0ab1ce;
    }

    .disablee {
        background: #ccc;
    }

    /* ///Section Pagination  */
</style>
@include('Student.inc.header')


<div class="quizzes-page">
    <header>
        {{-- Type section --}}
        <div class="type-quizzes">
            <span>Math</span>
            <span>Directions<i class="fa-solid fa-angle-up angle-show-disc rotateEle"></i></span>
            <p class="disc-ruels-quizzes d-none">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos hic necessitatibus consectetur sit
                nisi, similique distinctio non fugiat magni nam, sequi, qui libero earum praesentium rem! Atque, minus
                nesciunt.
            </p>
        </div>
        {{-- Timer section --}}
        <div class="timer-quizzes">
            {{-- show section --}}
            <div class="show-timer">
                <div class="timer">02:50</div>
                <button class="hide-btn">Hide</button>
            </div>
            {{-- hide section --}}
            <div class="hide-timer d-none">
                <div class="icon-timer"><i class="fa-regular fa-clock" style="padding-bottom: 5px;margin-top: 5px;"></i>
                </div>
                <button class="show-btn">Show</button>
            </div>
        </div>
        {{-- Options section --}}
        <div class="options">
            <i class="fa-solid fa-ellipsis-vertical btn-dropdown"></i>
            <div class="options-list d-none">
                <ul class="options-tx">
                    <li>option list</li>
                    <li>option list</li>
                    <li>option list</li>
                    <li>option list</li>
                    <li>option list</li>
                    <li>option list</li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper">
            @foreach ( $quizze->question as $question )
                
            <div class="question">
                <div class="question-side">
                    <div class="text-question">
                        <span class="question-num">
                            {{$loop->iteration}}
                        </span>
                        <p>
                            {{$question->question}}
                        </p>
                    </div>
                    <div class="img-question">
                        <span>Examples</span>
                        @if ( !empty($question->q_url) )
                        <img src="{{asset('images/questions/' . $question->q_url)}}" alt="question">
                        @endif
                    </div>
                </div>
                <div class="answer-side">

                    {{-- Supp Question --}}

                    {{-- Input to set and send value about answer question to array --}}
                    <input type="hidden" value="">

                    {{-- Answer chosen --}}

                    @php
                        $arr = ['A', 'B', 'C', 'D'];
                    @endphp
                    @if ( $question->ans_type == 'MCQ' )
                    <div class="answer-chosen">
                        @foreach ( $question->mcq as $mcq )
                            <div class="chosen">
                                <button>{{@$arr[$loop->iteration - 1]}}</button>
                                <input type="text" value="{{$mcq->mcq_ans}}" readonly>
                            </div>
                        @endforeach
                    </div>
                    @else
                    {{-- Answer Set Value --}}
                    <div class="answer-setValue">
                        <div class="section-setValue">
                            <span>Answer:</span>
                            <div class="input_val">

                                <input type="number" value="0">
                            </div>
                        </div>
                        <div class="section-value">
                            <span>Answer Preview:</span>
                            <input type="number" value="00000" readonly>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            @endforeach       
        </div>
        {{-- end Section Question --}}
        <ul class="paginationn">
            {{--             <li class="page-item previouss-page disablee">
                <a href="#" class="page-link">prev</a>
            </li>
            <li class="page-item currentt-page activee">
                <a href="#" class="page-link">1</a>
            </li>
            <li class="page-item dotss">
                <a href="#" class="page-link">...</a>
            </li>
            <li class="page-item currentt-page">
                <a href="#" class="page-link">5</a>
            </li>
            <li class="page-item currentt-page">
                <a href="#" class="page-link">6</a>
            </li>
            <li class="page-item dotss">
                <a href="#" class="page-link">...</a>
            </li>
            <li class="page-item currentt-page">
                <a href="#" class="page-link">10</a>
            </li>
            <li class="page-item nextt-page">
                <a href="#" class="page-link">Next</a>
            </li> --}}
        </ul>
    </main>
</div>



@include('Student.inc.footer')
<script>
    $(document).ready(function() {
        /* Show Discraption */
        $(".angle-show-disc").click(function() {
            $('.disc-ruels-quizzes').toggleClass("d-none");
            $('.angle-show-disc').toggleClass("rotateEle");
        });
        /* Hide Timer */
        $(".hide-btn").click(function() {
            $(".show-timer").addClass("d-none");
            $(".hide-timer").removeClass("d-none");
        });
        /* Show Timer */
        $(".show-btn").click(function() {
            $(".hide-timer").addClass("d-none");
            $(".show-timer").removeClass("d-none");
        });
        /* Show dropDown */
        $(".btn-dropdown").click(function() {
            $('.options-list').toggleClass("d-none");
        });
        /* Hide dropDown */
        $(".options-list li").click(function() {
            $(".options-list").toggleClass("d-none");
        });

        /* /////////////// */
        /* Handel Data question */
        /* /////////////// */






        /* /////////////// */
        /* Handel pagination question */
        /* /////////////// */
        function getPageList(totalPages, page, maxLength) {
            function range(start, end) {
                // return Array.form(Array(end - start + 1), (_, 1) => i + start);
                return result = $.map(Array(end - start + 1), function(_, i) {
                    return i + start;
                });
                console.log("start", start)
                console.log("end", end)
            }


            var sideWidth = maxLength < 9 ? 1 : 2;
            var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
            var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;
            console.log("maxLength", maxLength);
            console.log("sideWidth", sideWidth);
            console.log("rightWidth", rightWidth);
            console.log("leftWidth", leftWidth);
            console.log("totalpages", totalPages);
            console.log("page", page);

            if (totalPages <= maxLength) {
                return range(1, totalPages)
            }

            if (page <= maxLength - sideWidth - 1 - rightWidth) {
                return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1,
                    totalPages));
            }
            /* Customize list question tap and bots between list   */
            if (page >= totalPages - sideWidth - 1 - rightWidth) {
                return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth,
                    totalPages));
            }

            return range(1, sideWidth).concat(0, range(page - sideWidth, page + rightWidth), 0, range(
                totalPages - sideWidth + 1, totalPages));
        }

        $(function() {
            var numberOfItems = $(".question").length;
            var limitPerPage = 1; //How many question show in this page pagination
            var totalPages = Math.ceil(numberOfItems / limitPerPage);
            var paginationSize = Math.ceil(numberOfItems /
                3); //How many question visible show in this page pagination
            var currentPage;

            console.log("paginationSize", paginationSize)

            function showPage(whichPage) {
                if (whichPage < 1 || whichPage > totalPages) return false;
                console.log("totalPages", totalPages)
                console.log("whichPage", whichPage)

                currentPage = whichPage;

                $(".question").hide().slice((currentPage - 1) * limitPerPage,
                    currentPage * limitPerPage).show();
                $(".paginationn li").slice(1, -1).remove();

                getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                    $("<li>").addClass("page-item").addClass("currentt-page")
                        .toggleClass("activee", item === currentPage).append($("<a>").addClass(
                            "page-link").attr({
                            href: "javascript:void(0)"
                        }).text(item || "...")).insertBefore(".nextt-page");
                    // $(".currentt-page").css("background", "red")
                    // console.log($(".value-question").val())
                    // $(".currentt-page").css("background", "red")
                    // console.log($(".value-question").val())
                });

                $(".previouss-page").toggleClass("disablee", currentPage === 1);
                $(".nextt-page").toggleClass("disablee", currentPage === totalPages);
                return true;
            }

            $(".paginationn").append(

                $("<li>").addClass("page-item").addClass("previouss-page").append($("<a>").addClass(
                    "page-link").attr({
                    href: "javascript:void(0)"
                }).text("Prev")),
                $("<li>").addClass("page-item").addClass("nextt-page").append($("<a>").addClass(
                    "page-link").attr({
                    href: "javascript:void(0)"
                }).text("Next"))
            );

            $(".main_wrapper").show();
            showPage(1);

            $(document).on("click", ".paginationn li.currentt-page:not(.activee)", function() {
                return showPage(+$(this).text());
            })
            /* Go to next question */
            $(".nextt-page").on("click", () => {
                return showPage(currentPage + 1)
            });
            /* Go to pre question */
            $(".previouss-page").on("click", () => {
                return showPage(currentPage - 1)
            });
        });
    });
</script>
