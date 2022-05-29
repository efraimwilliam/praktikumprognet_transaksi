$( document ).ready(function() {
	document.querySelectorAll('#star_review').forEach(function(element) {
		element.addEventListener("mouseenter", function(event) {
			$('#stars_confirm').html('');
			var stars = event.target.dataset.number;
			$('#star_input').val(stars);
			var count = 0;
			document.querySelectorAll('#star_review').forEach(function(el) {
				if (count < stars) {
					$(el).removeClass('fa-star-o');
					$(el).addClass('fa-star');
					$('#stars_confirm').append('<i class="fa fa-star" aria-hidden="true" style="color:#212529 !important"></i>');
				} else {
					$(el).removeClass('fa-star');
					$(el).addClass('fa-star-o');
				}
				count = count+1;
			});
		});
		element.addEventListener("click", function(event) {
			console.log('clicked')
			$('.star-area').hide();
			$('.review-area').fadeIn();
		});
		element.addEventListener("mouseleave", function(event) {
			document.querySelectorAll('#star_review').forEach(function(el) {
				$(el).removeClass('fa-star');
				$(el).addClass('fa-star-o');
			});
		});
	});
});