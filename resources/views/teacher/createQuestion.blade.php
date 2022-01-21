@extends('index2')

@section('doc','create')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>Create Question</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 
  </div>
    <form action="{{route('store.question')}}" method="post">
        @csrf
        <div class="form-div">
            <label for="title" class="form-lable">title :</label>
            <input type="text" name="title" class="form-input">
        </div>
        <div class="form-div">
            <label for="txtt" class="form-lable">text :</label>
            <textarea name="text" id="txtt" cols="30" rows="3" class="form-input"></textarea>
        </div>
        <div class="form-div">
        <input type="radio" name="type" id="des" value="descriptive" checked>
        <label for="des">Descriptive</label>
        <input type="radio" name="type" id="tet" value="test">
        <label for="tet">Test</label>
        </div>
        <div class="form-div" class="form-lable">
            <label for="end">score :</label>
            <input type="number" step="0.01" name="score" class="form-input">
        </div>
        <input type="hidden" name="exam" value="{{$exam}}">
        
<body>
    
        
        <input type="button" class="add-row btn2" value="Add Option">

    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Text</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="delete-row btn3">Delete Option</button>
        <div class="btn-div">
            <button class="btn-update1">Create</button>
        </div>
        
    </form>
    

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            // var textOption = $("#textOption").val();
            // var answer = $("#answer").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" +
             "<input type='text' name='textOption[]' class='form-inputjs1'>" + "</td><td>" +
              "<input type='number' min='0' max='1' name='answer[]' class='form-inputjs2'>" + "</td></tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
@endsection