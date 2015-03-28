function send_req() {
var city_name = document.getElementById("select_city").value; 
var area_name = document.getElementById("select_area").value;
var hobby_name = document.getElementById("select_hobby").value;
console.log(city_name);
console.log(area_name);
console.log(hobby_name);
    

    $.ajax({
      url: 'php/getdetails.php',
      type: 'post',
      data: {'selected_city': city_name, 'selected_area': area_name, 'selected_hobby': hobby_name},
      success: function(data) {
     //   if(data == "ok") {
        //  $('#followbtncontainer').html('<p><em>Following!</em></p>');
        //  var numfollowers = parseInt($('#followercnt').html()) + 1;
        //  $('#followercnt').html(numfollowers);
            alert(data);
          
          window.location.href = "aftersearch.html";
        
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    });
    
}