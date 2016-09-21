$("select").change(function(){
  var op = $(this).find("option:selected").attr("class");

  switch (op){
    case "option1":
		$("#bv").show();
		$("#ben").show();
      break;
	case "option2":
      $("#ben").hide();
		$("#bv").show();

      break;
	case "option3":
      $("#bv").hide();
		$("#ben").hide();
      break;
	  
  }
});