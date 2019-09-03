<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
  $('document').ready(function() {

    const URL = "http://ec2-3-14-6-238.us-east-2.compute.amazonaws.com:3000";

    $('#btn').click(function() {
      $.ajax({
        url: URL + "/api/products/get/all",
        type: "GET",
        success: function(result) {
          console.log(result.data);

          var temp = "<table><tr><th>id</th><th>name</th><th>price</th><th>picture</th ></tr>";

          // show product here. You can do the table but I will show only simple way.
          for (var i = 0; i < result.data.length; i++) {
            temp += "<tr><td >" + result.data[i].id + "</td> <td>" + result.data[i].name + "</td> <td>" + result.data[i].price + "</td><td><" + result.data[i].pictureName + "</td></tr>";
          } 
          temp += "</table>";

          console.log(temp);
          $('#productItem').html(temp);

        },
        error: function(error) {
          console.log('Error ${error}');
        }
      })
    })
  });
</script>

</head>

<body>
  <div id="productItem">

  </div>
  <button id="btn">
    Get all product
  </button>


</body>


</html>