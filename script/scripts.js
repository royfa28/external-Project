
$('document').ready(function() {
    const URL = "http://ec2-3-14-6-238.us-east-2.compute.amazonaws.com:3000";

        $.ajax({
            url: URL + "/api/products/get/all",
            type: "GET",
            success: function(result) {
                console.log(result.data);
                var temp="";
                // show product here. You can do the table but I will show only simple way.
                for (var i = 0; i < result.data.length; i++) {

                    temp += '<div class="card-deck" style="float:left; width:25%; padding:5px; height:400px;">'
                    + '<div class="card"> <img class="card-img-top" style="width:200px; margin: 0 auto;"; src="images/' + result.data[i].pictureName + '"> <div class="card-body">'
                    + '<h5 class="card-title" style="font-weight:bold;">' + result.data[i].name + '</h5>'
                    + '<p class="card-text">' + result.data[i].description + '</p> </div>'
                    + '<div class="card-footer"> <small class="text-muted"> Add to Cart </small> </div> </div> </div>';

                    
                    /*
                    temp += '<div class="col-md-3"> <img class="img-fluid img-thumbnail" src="images/' + result.data[i].pictureName +
                        '"><h5 class="product-name">' 
                        + result.data[i].name + '</h5> <h6 class="product-price"> $' 
                        + result.data[i].price 
                        + '</h6> <p class="product-description">' + result.data[i].description 
                        + '</p><button> Add to cart </button></div>';
                        */
                } 
                //temp += "</table>";
                console.log(temp);
                $('#root').html(temp);
            },
            error: function(error) {
                console.log('Error ${error}');
            }
        })
    
});