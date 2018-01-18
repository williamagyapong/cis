$(document).ready(function(){

	$('.bottom3imgp').click(function(){
  

         $("#leftHouse").load("includes/simulatorAjax.php?assetId="+ $(this).attr('data-setid'));
     
  });

  

	$('b').click(function(){
		$('#match').hide();
		$('#inMidCenterDown').show(2000);
	});

	
	$(document).on("click",".Asset",function(){
		// orderOne.push(assetid);
		if (orderOne.length < 1) $('.alert-autocloseable').delay(1000).fadeOut("slow");
		$('.Asset').addClass('animateDisabled');	
		var assetid = $(this).attr("data-setid");
		if(orderOne.includes(assetid)){
			soundEffects('assetClicked');
			$('.alert-autocloseable-danger').show();
			$('.alert-autocloseable-danger').delay(1000).fadeOut("slow");
			$('.Asset').removeClass('animateDisabled');
		}else{
			soundEffects('assetClick');
			var di = (assetid%5);
			switch(di){
				case 1:
					var top = 408;
					break;
				case 2:
					var top = 306;
					break;
				case 3:
					var top = 204;
					break;
				case 4:
					var top = 102;
					break;
				default:
					var top = 0;
			}

			if (order > 4) order = 0;

			
			
			if ($(this).hasClass("left")) {
				$(this).animate({marginLeft:200+order*180+"px"},500,function(){

					$(this).animate({marginTop:top+"px"},1000,function(){

						$(".bottom3img").eq(order++).attr({"src":$(this).attr("src"),"data-setid":assetid});
						$(this).css({marginLeft:"0px",marginTop:"0px"}).animate({opacity:'toggle',height:'toggle'}).animate({opacity:'toggle',height:'toggle'});
						$('.Asset').removeClass('animateDisabled');

						if(orderOne.length == 5) {
							document.getElementById('continuetp').style.display = 'block';
						}

					});
				});
			}else{
				$(this).animate({marginLeft:-(200+(4-order)*180)+"px"},500,function(){

					$(this).animate({marginTop:top+"px"},1000,function(){
						
						$(".bottom3img").eq(order++).attr({"src":$(this).attr("src"),"data-setid":assetid});
						$(this).css({marginLeft:"0px",marginTop:"0px"}).animate({opacity:'toggle',height:'toggle'}).animate({opacity:'toggle',height:'toggle'});
						$('.Asset').removeClass('animateDisabled');

						if(orderOne.length == 5) {
							document.getElementById('continuetp').style.display = 'block'
						}

					});
				});
			}
            // store asset ids to keep track of user's selections
			if (orderOne.length == 5) {
				orderOne[order] = assetid;
				orderOnePics[order] = $(this).attr("src");
			}else{
				orderOne.push(assetid);
				orderOnePics.push($(this).attr("src"));
			}

			// alert user when done selecting asserts
			

		}
		
	});

	function soundEffects(elem){
		var sound = document.getElementById(elem);
		sound.play();
	}
	
	var x = 0;
	var y = 0;
	/*reference to the banner div*/
	var banner = $('#banner');
	/*initial banner background position*/
	banner.css('backgroundPosition', x + 'px' +' '+y+'px');
	/*scroll up background position every 90 millisecond*/
	window.setInterval(function(){

	banner.css('backgroundPosition', x + 'px' +' '+y+'px');
	x--;
	/*if you want to scroll image vertically use y--*/
	},90)

});