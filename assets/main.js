$(document).ready(function () {

  // jQuery methods go here...
  $("#productType").change(function () {
    let option = $('#productType').val()
    console.log(option)
    if (option == "DVD") {
      $(".dvd").removeClass('d-none')
      $("#size").attr("required")
      $(".book").addClass('d-none')
      $("#weight").removeAttr("required")
      $(".furniture").addClass('d-none')
      $("#height").removeAttr("required")
      $("#width").removeAttr("required")
      $("#length").removeAttr("required")
    }
    else if (option == "Book") {
      $(".dvd").addClass('d-none')
      $(".book").removeClass('d-none')
      $(".furniture").addClass('d-none')
      $("#size").removeAttr("required")
      $("#weight").attr("required")
      $("#height").removeAttr("required")
      $("#width").removeAttr("required")
      $("#length").removeAttr("required")
    }
    else if (option == "Furniture") {
      $(".dvd").addClass('d-none')
      $(".book").addClass('d-none')
      $(".furniture").removeClass('d-none')
      $("#size").removeAttr("required")
      $("#weight").removeAttr("required")
      $("#height").attr("required")
      $("#width").attr("required")
      $("#length").attr("required")
    }
    else {
      $(".dvd").addClass('d-none')
      $(".book").addClass('d-none')
      $(".furniture").addClass('d-none')
      $("#size").removeAttr("required")
      $("#weight").removeAttr("required")
      $("#height").removeAttr("required")
      $("#width").removeAttr("required")
      $("#length").removeAttr("required")
    }
  })
});
