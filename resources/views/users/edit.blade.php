@extends('layouts.app')

@section('content')
<div class="mdb-page-content text-center page-intro">
  <div class="text-center">
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="card mb-4">
            <form class="login-form" method="POST" action="{{ route('users.update', $user->id)}}" enctype="multipart/form-data">
              @method('PATCH')
              @include('users.partials.general_form')
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
//Image Reviewer
let uploadButton = document.getElementById("profile_picture");
let chosenImage = document.getElementById("chosen-image");

uploadButton.onchange = () => {
  let reader = new FileReader();
  reader.readAsDataURL(uploadButton.files[0]);
  reader.onload = () => {
      chosenImage.setAttribute("src", reader.result);
  }
  console.log(chosenImage);
}
</script>
@endsection
