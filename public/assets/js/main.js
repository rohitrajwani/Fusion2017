(function($){
	$(function(){

		$('.modal-trigger').leanModal();
		
		
		// $('.modal-trigger').leanModal({
  //     dismissible: true, // Modal can be dismissed by clicking outside of the modal
  //     opacity: .7, // Opacity of modal background
  //     in_duration: 300, // Transition in duration
  //     out_duration: 200, // Transition out duration
  //     starting_top: '10%', // Starting top style attribute
  //     ending_top: '10%', // Ending top style attribute
  //     //ready: function() { alert('Ready'); }, // Callback for Modal open
  //     //complete: function() { alert('Closed'); } // Callback for Modal close
  //   }
  // );
  		
		  $('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15, // Creates a dropdown of 15 years to control year
		    format: 'yyyy-mm-dd' 
		  });
		$('.dropdown-button').dropdown({
			inDuration: 300,
			outDuration:225,
			hover:false,
			constrain_width: false,
			belowOrigin:true
			
		});
		$('select').material_select();
		
		$('.dropdown-button2').dropdown({
			inDuration: 300,
			outDuration:225,
			hover:true,
			constrain_width: false,
			gutter:($('.dropdown-content').width()),
			belowOrigin:false
		});
		
		$('.dropdown-button3').dropdown({
			inDuration: 300,
			outDuration:225,
			hover:true,
			constrain_width: false,
			gutter:($('#mobile-demo').width()),
			belowOrigin:true
		});
		
		$('.button-collapse').dropdown({
			inDuration: 300,
			outDuration:225,
			constrain_width: false,
			hover:false,
			belowOrigin:true
		});		
	});

})(jQuery);


