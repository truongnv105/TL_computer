setTimeout(alert_message, 3000);

function alert_message(){
    $(".alert").remove();
}

$(document).ready(function(){
  $("#filter-products").change(function(){
    var status_product = $("#filter-products").val();

    $.ajax({
      method: 'get',
      url: '/products/ajax',
      data: {status: status_product},

      success: function(response){
        console.log(response);
        var quantity_products = Object.keys(response['products']).length;
        var quantity_categories = Object.keys(response['categories']).length;

        $(".table").remove();
        $(".filter").after("<table class='table'>");
        $('.table').append("<tr>");
        $('.table').append("<th>" + "STT" + "</th>");
        $('.table').append("<th>" + "Name" + "</th>");
        $('.table').append("<th>" + "Category" + "</th>");
        $('.table').append("<th>" + "Price" + "</th>");
        $('.table').append("<th>" + "Image" + "</th>");
        $('.table').append("<th>" + "Promotion" + "</th>");
        $('.table').append("<th>" + "Description" + "</th>")
        $('.table').append("<th>" + "Status" + "</th>");
        $('.table').append("</tr>");

        for(var i=0; i<quantity_products; i++){
          $('.table').append("<tr>");
          $('.table').append("<td>"  + response['products'][i]['id'] + "</td>");
          $('.table').append("<td>" + '<a href="/admins/products/' + response['products'][i]['id'] + '"' + "</a>" + response['products'][i]['name'] + "</td>");

          for(var j=0; j<quantity_categories; j++){
            if(response['products'][i]['category_id'] == response['categories'][j]['id']){
              $('.table').append("<td>" + response['categories'][j]['name'] + "</td>");
            }
          }

          $('.table').append("<td>" + response['products'][i]['price'] + "</td>");
          $('.table').append("<td>" + '<img src="http://127.0.0.1:8000/storage/image/' + response['products'][i]['image'] + '" with="60" height="60"/>' + "</td>");
          $('.table').append("<td>" + response['products'][i]['promotion'] + "%" + "</td>");
          $('.table').append("<td>" + response['products'][i]['description'].substr(0,35) + "</td>")
          $('.table').append("<td>" + check_status(response['products'][i]['status']) + "</td>");
          $('.table').append("</tr>");

        }
        $(".table").append("</table>");
      }
    });
  });

  function check_status(status){
    if(status==1){
      return "Stocking";
    }else{
      return "Out of stock";
    }
  }

  $(".fa-edit").click(function(){
    var category_id = $(this).nextAll("input#category_id").val();
    var category_name = $(this).nextAll("input#category_name").val();
    $("#modal-category").find("input#name").val(category_name);
    $("#edit-category").click();
    var url = "/admins/categories/" + category_id;
    $("form#edit-category").attr("action", url);
  });

  $(".edit-product").click(function(){
    var product_id = $("table.products").find("input#product_id").val();
    var product_name = $("table.products").find("input#product_name").val();
    var category_id = $("table.products").find("input#category_id").val();
    var product_color = $("table.products").find("input#product_color").val();
    var product_price = $("table.products").find("input#product_price").val();
    var product_status = $("table.products").find("input#product_status").val();
    var product_item = $("table.products").find("input#product_item").val();
    var product_promotion = $("table.products").find("input#product_promotion").val();
    var product_condition = $("table.products").find("input#product_condition").val();
    var product_warranty = $("table.products").find("input#product_warranty").val();
    var product_featured = $("table.products").find("input#product_featured").val();
    var product_description = $("table.products").find("input#product_description").val();
    var url = "/admins/products/" + product_id;
    var option_category = $("select#category_id").find("option");
    option_category.each(function(){
      if($(this).val() == category_id){
        $(this).attr("selected", "true");
      };
    });
    var status = $("input[type='radio']");
    status.each(function(){
      if($(this).val() == product_status){
        $(this).val(product_status);
        $(this).attr("checked", "true");
      }
    })

    $("form#product-form").find("input#name").val(product_name);
    $("form#product-form").find("input#price").val(product_price);
    $("form#product-form").find("input#promotion").val(product_promotion);
    $("form#product-form").find("textarea#description").val(product_description);
    $("form#product-form").find("input#item").val(product_item);
    $("form#product-form").find("input#warranty").val(product_warranty);
    $("form#product-form").find("input#featured").val(product_featured);
    $("form#product-form").find("input#condition").val(product_condition);
    $("form#product-form").find("input#color").val(product_color);
    $("form#product-form").attr("action", url);
  });
});
