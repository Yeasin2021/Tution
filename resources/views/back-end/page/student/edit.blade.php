@extends('back-end.index')

@section('content')
<div class="container">
<form action="{{ route('student-update',$edit->id) }}" method="POST" enctype="multipart/form-data">@csrf
<div class="row">

      <div class="col-6 pt-2" style="margin-left: 20px">
        <div class="card">
            <div class="card-body ml-2">
              <h5 class="card-title">Edit Student </h5>

                <div class="form-group">
                  <label for="formGroupExampleInput">Student's Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1"  name="student_name" value="{{ $edit->student_name }}">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Student's Class</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2"  name="student_class" value="{{ $edit->student_class }}">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Student's Group</label>
                  {{-- <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Class" name="student_group"> --}}
                  <select name="group" id="group" class="form-control">
                    <option value="science">Science</option>
                    <option value="commerce">Commerce</option>
                    <option value="arts">Arts</option>
                    <option value="none">None</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">School Or College</label>
                  <input type="text" class="form-control" id="formGroupExampleInput4" name="institute" value="{{ $edit->institute }}">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Gardian's Phone</label>
                  <input type="tel" class="form-control" id="formGroupExampleInput5"  name="phone" value="{{ $edit->phone }}">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Tution Fee</label>
                  <input type="text" class="form-control" id="formGroupExampleInput5"  name="tution_fee" value="{{ $edit->tution_fee }}">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Tution day per week</label>
                  <input type="number" class="form-control" id="formGroupExampleInput5"  name="tution_day" value="{{ $edit->tution_day }}">
                </div>
                <div class="form-group mt-1">
                  <label for="formGroupExampleInput2" style="margin-right: 10px">Gender</label>
                  <input type="radio"  name="gender" value="male" {{ $edit->gender == 'male' ? 'checked' : ''}}>Male
                  <input type="radio"  name="gender" value="female" {{ $edit->gender == 'female' ? 'checked' : ''}}>Female
                  <input type="radio"  name="gender" value="other"  {{ $edit->gender == 'other' ? 'checked' : ''}}>Trans
                </div>

            </div>
          </div>
      </div>
      <div class="col-lg-4 pt-2">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="formGroupExampleInput2">Student Email</label>
                    <input type="email" class="form-control" id="formGroupExampleInput5" name="email" value="{{ $edit->email }}" >
                  </div>
                <div class="form-group pt-1">
                    <input type="file" name="image" id="file-input" accept="image/png, image/jpeg" onchange="preview()"  value="click" id="pik"/>
                    <label for="file-input" class="upload-f-img"> <i class="fas fa-upload"></i> &nbsp; Choose A Photo </label>
                    <p id="num-of-files">No Files Chosen</p>
                    {{-- {{ $edit->image =!onchange="preview()"?  '<img src="{{ asset($edit->image) }}": onchange="preview()"'}} --}}
                    {{-- <div id="images" class="img-rounded"></div> --}}
                    <img src="{{ asset($edit->image) }}" height="300px" width="500px" id="images">
                </div>
            </div>
        </div>

    </div>

    <div style="margin-left: 21px; margin-buttom: 10px;">
        <button class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>

   </div>
  </form>
  </div>

@endsection

@push('js')

<script>
    let fileInput = document.getElementById("file-input");
    let imageContainer = document.getElementById("images");
    let numOfFiles = document.getElementById("num-of-files");

    function preview() {
        imageContainer.innerHTML = "";
        numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

        for (i of fileInput.files) {
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload = () => {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                figure.insertBefore(img, figCap);
            };
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }
</script>

<script>
    let roll = document.getElementByClass("student_id");
    roll.innerHTML += Math.floor(Math.random() * 10000) + 1000;
    document.getElementByClass("student_id").value = Math.floor(Math.random() * 10000) + 1000;
</script>

@endpush
