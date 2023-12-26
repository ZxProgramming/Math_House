
<x-default-layout>
<div class="my-2">
    <select class="form-control">
        <option disabled selected>
            Exam Codes
        </option>
        @foreach($exam_codes as $item)
        <option value="{{$item->id}}">
            {{$item->exam_code}}
        </option>
        @endforeach
    </select>
</div>

<div class="my-2">
    <label class="py-2">Enter Exam Code</label>
    <input class="form-control" placeholder="Enter Exam Code" />
</div>
</x-default-layout>