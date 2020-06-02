// HTML
function itemsByVendor(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "queries/items-by-vendor.php",
	  data: currentForm.serialize(),
	  success: function(result){
	  	$('#result1').html(result);
	  }
	});
}

// XML
function itemsByCategory(e){
	var currentForm = $(e).parents('form');
	$.ajax({
	  type: "GET",
	  url: "queries/items-by-category.php",
	  data: currentForm.serialize(),
	  dataType: "xml",
	  success: function(result){
	  	var output = "";
	  	$(result).find('shopItem').each(function(){
			output += '<tr>'+
  			'<td>' + $(this).find('id_items').text() + '</td>' +
  			'<td>' + $(this).find('name').text() + '</td>' +
  			'<td>' + $(this).find('price').text() + '</td>' +
  			'<td>' + $(this).find('quantity').text() + '</td>' +
  			'<td>' + $(this).find('quality').text() + '</td>' +
  			'<td>' + $(this).find('FID_Vendor').text() + '</td>' +
  			'<td>' + $(this).find('FID_Category').text() + '</td>' +
  			'<td>' + $(this).find('vendor_name').text() + '</td>' +
  			'<td>' + $(this).find('category_name').text() + '</td>' +
  			'</tr>';
	  	});
	  	$('#result2 tbody').html(output);
  		
	  },
	  error: function(data){
	  	console.log(data);
	  }
	});
}


// JSON
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

	$.ajax({
	  type: "GET",
	  url: "queries/items-by-price-range.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
        var output = "";
        // var items = JSON.parse(result);
        result.forEach(item => {
            output += '<tr>'+
            '<td>' + item.id_items + '</td>' +
            '<td>' + item.name + '</td>' +
            '<td>' + item.price + '</td>' +
            '<td>' + item.quantity + '</td>' +
            '<td>' + item.quality + '</td>' +
            '<td>' + item.FID_Vendor + '</td>' +
            '<td>' + item.FID_Category + '</td>' +
            '<td>' + item.vendor_name + '</td>' +
            '<td>' + item.category_name + '</td>' +
            '</tr>';
        });
  		$('#result3 tbody').html(output);
	  }
	});
}