function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var img = document.createElement("img");
      img.src = e.target.result;
      alert(img);
      $('#imagePreview').appendChild(img);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function () {
  alert(this);
  readURL(this);
});

