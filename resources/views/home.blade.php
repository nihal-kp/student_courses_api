@foreach ($students as $student)
    {{$student->First_name}} <br>
    {{$student->course->Course_name}} <br><br>
@endforeach