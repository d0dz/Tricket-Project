$(document).ready(function(){

	// Transfers Search Event 
	$('#search-button').click(function(){
			
		// Clear Result
		$('#results').html('');

		// Get Text
		var searchBox = $('input#search-keyword');
		var searchText = searchBox.val();

		// Check if empty
		if (searchText.length == 0) {
			searchBox.attr('placeholder','Please type your keyword');
			return;
		};

		// Start Ajax to get intercourse by Search Text
		$.post('./api/searchcourse', { keyword: searchText}, function(data) {

			console.log(data);

			var ul = $('<ul>');

			$('#results').append(ul);

			// Loop to show result
			for (var i = 0; i < data.length; i++) {
				


				// Get one course
				var course = data[i];
				var universitie = course.universitie;

				// create list
				var li = $('<li>');
				var link = $('<a>').attr('href','./transfers/detail/' + course['id']);

				// combine text
				var text = course['code'] + ' - ' + course['title'] + ' | ' + universitie['name'];
				link.text(text);
				li.append(link);

				ul.append(li);
			};

			
		});

	});



	// Intercourse save event

	$('#local-search-btn').click(function(e){

		// Clear Result
		$('#local-search-results').html('');

		// Get Text
		var searchBox = $('input#local-search-text');
		var searchText = searchBox.val();

		// Check if empty
		if (searchText.length == 0) {
			searchBox.attr('placeholder','Please type your keyword');
			return;
		};

		// Start Ajax to get intercourse by Search Text
		$.post('../api/searchlocalcourse', { keyword: searchText}, function(data) {

			console.log(data);

			var ul = $('<ul>');

			$('#local-search-results').append(ul);

			// Loop to show result
			for (var i = 0; i < data.length; i++) {
				


				// Get one course
				var course = data[i];

				// create list
				var li = $('<li>');
				var link = $('<a>').attr('href','#');
				link.attr('courseid',course['id']);
				link.addClass('course-result');

				link.bind('click',function(e){

					var courselink = $(this);
					var courseid = courselink.attr('courseid');

					var courseel = $('#course-selection li a[courseid=' + courseid +']');

					if (courseel.length == 0) {
						($('<li>').append($(this).clone())).appendTo('#course-selection');
					}

					


					$('#myModal').modal('hide');
					clearModal();
					return false;
				});

				// combine text
				var text = course['code'] + ' - ' + course['title'];
				link.text(text);
				li.append(link);

				ul.append(li);
			};

			
		});

		return false;

	});

	var clearModal = function(){
		$('#local-search-results').html('');
		var searchBox = $('input#local-search-text');
		searchBox.val('');
	};


	$('form#new-intercourse').submit(function(e){

		$('#course-selection li a').each(function(index){
			var courseid = $(this).attr('courseid');
			var inputForId = $('<input>').attr('type','hidden').attr('name','mapid[]').val(courseid);
			

			$('form#new-intercourse').append(inputForId);

		});


	});

	
});