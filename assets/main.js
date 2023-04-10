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
      else if(option=="Book"){
        $(".dvd").addClass('d-none')
        $(".book").removeClass('d-none')
        $(".furniture").addClass('d-none')
      }
      else if(option=="Furniture"){
        $(".dvd").addClass('d-none')
        $(".book").addClass('d-none')
        $(".furniture").removeClass('d-none')
      }
      else{
        $(".dvd").addClass('d-none')
        $(".book").addClass('d-none')
        $(".furniture").addClass('d-none')
      }
    })
  console.log("gg")
  });
