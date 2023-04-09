$(document).ready(function(){

    // jQuery methods go here...
    $("#productType").change(function(){
      let option = $('#productType').val()
      console.log(option)
      if(option=="DVD"){
        $(".dvd").removeClass('d-none')
        $(".book").addClass('d-none')
        $(".furniture").addClass('d-none')
      }
      if(option=="Book"){
        $(".dvd").addClass('d-none')
        $(".book").removeClass('d-none')
        $(".furniture").addClass('d-none')
      }
      if(option=="Furniture"){
        $(".dvd").addClass('d-none')
        $(".book").addClass('d-none')
        $(".furniture").removeClass('d-none')
      }
    })
  console.log("gg")
  });
