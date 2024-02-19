@php
    $page_name = 'Quizze';
    // $quizze->question;
    // "Mcq" => $item->mcq
    // "Grid" => $item->g_ans
@endphp
@section('title', 'Quizze')
<style>
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
        left: 15%;
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
        background: rgb(160, 127, 69);
    }

    main .main-wrapper {
        width: 100%;
        padding: 0 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        background: red;
    }

    main .main-wrapper .question {
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
        background: #8df9ff;
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
        background: #20e690;
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

    main .main-wrapper .question .answer-side .sup-question p {
        font-size: 1.2rem;
        font-weight: 500;
        width: 100%;
        text-align: start;
    }

    main .main-wrapper .question .answer-side .answer-chosen div {
        display: flex;
        flex-direction: column;
        row-gap: 10px;
        align-items: center;
    }

    main .main-wrapper .question .answer-side .answer-setValue {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        background: red;
    }

    main .main-wrapper .question .answer-side .answer-setValue .input_val {
        border: 1px solid #000;
    }
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
            <div class="question">
                <div class="question-side">
                    <div class="text-question">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptates id nesciunt
                            rerum commodi mollitia impedit culpa assumenda in numquam! Provident laborum, deleniti error
                            officiis atque commodi praesentium. Accusantium, suscipit.</p>
                    </div>
                    <div class="img-question">
                        <span>Examples</span>
                        <img src="https://i.ytimg.com/vi/eVB1T7PamoY/maxresdefault.jpg" width="200px" alt="question">
                    </div>
                </div>
                <div class="answer-side">
                    {{-- Supp Question --}}
                    <div class="sup-question">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ut, fuga a perspiciatis labore
                            aspernatur, quasi quaerat illo?</p>
                    </div>
                    {{-- Input to set and send value about answer question to array --}}
                    <input type="hidden" value="">
                    {{-- Answer chosen --}}
                    <div class="answer-chosen">
                        <div class="">A</div>
                        <div class="">B</div>
                        <div class="">C</div>
                        <div class="">D</div>
                    </div>
                    {{-- Answer Set Value --}}
                    <div class="answer-setValue">
                        <div class="input_val">Set value input</div>
                        <div class="">
                            <span>Answer Preview:</span>
                            Set value in input
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    });
</script>
