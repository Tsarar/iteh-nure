// 1
function vendors(e){
    var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/get-vendors-list.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
		localStorage.setItem('first', result.join(","));
		$('#result1').html(result.join(","));
	  }
	});
}

// 2
function missingGoods(e){
    var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/get-missing-goods-list.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
        var output = "";
        result.forEach(item => {
            output += '<tr>'+
            '<td>' + item.name + '</td>' +
            '<td>' + item.price + '</td>' +
            '<td>' + item.amount + '</td>' +
            '<td>' + item.vendor + '</td>' +
            '<td>' + item.category + '</td>' +
            '<td>' + JSON.stringify(item.reviews) + '</td>' +
            '<td>' + item.condition + '</td>' +
            '</tr>';
        });
		localStorage.setItem('second', output);
  		$('#result2 tbody').html(output);
	  }
	});
}


// 3
function itemsByPriceRange(e){
    var currentForm = $(e).parents('form');
    
    if (!Number(document.getElementById("priceFrom").value)) {
        console.warn("Warning! priceFrom is not float! Changing it to 0");
        document.getElementById("priceFrom").value = 0;
    }

    if (!Number(document.getElementById("priceTo").value)) {
        console.warn("Warning! priceTo is not float! Changing it to 10000");
        document.getElementById("priceTo").value = 10000;
	}
	
	const priceFrom = document.getElementById("priceFrom").value;
	const priceTo = document.getElementById("priceTo").value;

	$.ajax({
	  type: "GET",
	  url: "queries/get-items-by-price-range.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
        var output = "";
        result.forEach(item => {
            output += '<tr>'+
            '<td>' + item.name + '</td>' +
            '<td>' + item.price + '</td>' +
            '<td>' + item.amount + '</td>' +
            '<td>' + item.vendor + '</td>' +
            '<td>' + item.category + '</td>' +
            '<td>' + JSON.stringify(item.reviews) + '</td>' +
            '<td>' + item.condition + '</td>' +
            '</tr>';
        });
		localStorage.setItem(`third-${priceFrom}-${priceTo}`, output);
  		$('#result3 tbody').html(output);
	  }
	});
}


// LOCAL STORAGE

// 1
function vendorsLocal(e){
	const result = localStorage.getItem(`first`);

	if (result) {
		$('#result1local').css('display', 'block');
		$('#result1localinternal').html(result);
	}
	else {
		$('#result1local').css('display', 'block');
		$('#result1localinternal').html("Local storage is empty");
	}
}

// 2
function missingGoodsLocal(e){
	const result = localStorage.getItem(`second`);

	if (result) {
		$('#result2local').css('display', 'block');
		$('#result2localinternal').html(result);
	}
	else {
		$('#result2local').css('display', 'block');
		$('#result2localinternal').html("Local storage is empty");
	}
}


// 3

function itemsByPriceRangeLocal(e){
    var currentForm = $(e).parents('form');
    
    if (!Number(document.getElementById("priceFrom").value)) {
        console.warn("Warning! priceFrom is not float! Changing it to 0");
        document.getElementById("priceFrom").value = 0;
    }

    if (!Number(document.getElementById("priceTo").value)) {
        console.warn("Warning! priceTo is not float! Changing it to 10000");
        document.getElementById("priceTo").value = 10000;
    }
	
	const priceFrom = document.getElementById("priceFrom").value;
	const priceTo = document.getElementById("priceTo").value;

	const result = localStorage.getItem(`third-${priceFrom}-${priceTo}`);

	if (result) {
		$('#result3local').css('display', 'block');
		$('#result3localinternal').html(result);
	}
	else {
		$('#result3local').css('display', 'block');
		$('#result3localinternal').html("Local storage is empty");
	}
}