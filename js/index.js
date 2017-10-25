 $('.burger_icon').click(function () {
            var e = document.getElementById('navigation_menu');
            if (e.style.display === 'none') {
                e.style.display = 'block';
            } else {
                e.style.display = 'none';
            }
            //     $('.navigation_menu').toggle("active");
        });
        
  $('.cart_icon').click(function () {
            var b = document.getElementById('cart_drop_down');
            if (b.style.display === 'none') {
                b.style.display = 'block';
            } else {
                b.style.display = 'none';
            }
        });
        
          $(".add_to_cart_button").click(function () {
                 var parent = $(this).parent();
                 var imgSrc = parent.find('.product_name').attr('imgSrc');
                 var name = parent.find('.product_name').attr('name');
                 var price = parent.find('.product_price').attr('price');
                 var discount_price = parent.find('.product_price').attr('discount_price');
                 var array_data = getDataFromStorage();
                $.ajax({
                    type: 'POST',
                    url: 'ajax/add_item_ajax.php',
                     data: { 'imgSrc': imgSrc, 'name': name, 'price': price, 'discount_price': discount_price, 'array_data':array_data},
                    dataType: 'html',
                      success: function(data){$(".ajax").html(data);}
                });
            });
            
               $(".subscribe_button").click(function () {
                 var parent = $(this).parent();
                 var subscribe_text = parent.find('.subscribe_input_text').val();
                  
                $.ajax({
                    type: 'POST',
                    url: 'newsletter/subscribe/subscribe.php',
                     data: { 'subscribe_text': subscribe_text},
                    dataType: 'html',
                      success: function(data){$(".ajax").html(data);}
                });
            });
            
            function getDataFromStorage() {
            var json_data = sessionStorage.getItem("json_data");

                      console.log(json_data);
            if (json_data !== null) {
                if (JSON.parse(json_data)) {
                    var array_data = JSON.parse(json_data);
                } else {
                    sessionStorage.clear();
                    var array_data = null;
                }
            } else {
                var array_data = null;
            }
            return array_data;
        }     
        