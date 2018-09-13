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
        var quantity_product = Object.keys(response).length;
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

        for(var i=0; i<quantity_product; i++){
          $('.table').append("<tr>");
          $('.table').append("<td>"  + response[i]['id'] + "</td>");
          $('.table').append("<td>" + '<a href="/admins/products/' + response[i]['id'] + '"' + "</a>" + response[i]['name'] + "</td>");
          $('.table').append("<td>" + response[i]['category_id'] + "</td>");
          $('.table').append("<td>" + response[i]['price'] + "</td>");
          $('.table').append("<td>" + '<img src="http://127.0.0.1:8000/storage/image/' + response[i]['image'] + '" with="60" height="60"/>' + "</td>");
          $('.table').append("<td>" + response[i]['promotion'] + "%" + "</td>");
          $('.table').append("<td>" + response[i]['description'].substr(0,35) + "</td>")
          $('.table').append("<td>" + check_status(response[i]['status']) + "</td>");
          $('.table').append("</tr>");

        }
        $(".table").append("</table>");
      },
      error: function(data){
        alert("fail");
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
    $("#button-update-category").click(function(){
    $("form#form-edit").attr('action', '/admins/categories/');
    $("form#form-edit").attr('method', 'post');

    });
  });
});
