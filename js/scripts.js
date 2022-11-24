$(document).ready(function () {
  //Editor which is CK Editor
  ClassicEditor.create(document.querySelector("#body")).catch((error) => {
    console.error(error);
  });

  //Selecting All checkboxes

  $("#chechboxAll").click(function () {
    if (this.checked) {
      $(".checkboxes").each(function () {
        this.checked = true;
      });
    } else {
      $(".checkboxes").each(function () {
        this.checked = false;
      });
    }
  });

  // Screen Loadding
  var divBox = "<div id='loadScreen'><div id='loading'></div></div>";
  $("body").prepend(divBox);
  $("#loadScreen")
    .delay(1000)
    .fadeOut(10, function () {
      this.remove();
    });
});
