<script>
    $(document).ready(function() {
       $('.addToCart').on('click', function(e) {
          e.preventDefault();
          var productId = $(this).data('product-id');
          var productName = $(this).data('product-name');
          var productPrice = $(this).data('product-price');
          var $existingProduct = $('.product-id[data-id="' + productId + '"]');
 
          if ($existingProduct.length > 0) {
             var $quantityElement = $existingProduct.closest('.list-group-item').find('.quantity-value');
             var quantity = parseInt($quantityElement.text());
             $quantityElement.text(quantity + 1);
             updateTotalPrice($existingProduct.closest('.list-group-item'));
             calculateTotal();
 
             toastr.info('Added more ' + productName + ' to your cart.', 'Quantity Updated');
          } else {
             var newItem = '<li class="list-group-item">' +
                 '<div class="row align-items-center">' +
                 '<div class="col-md-6">' +
                 '<span class="product-details">' + productName + ' - $' + productPrice + '</span>' +
                 '<span class="product-id" data-id="' + productId + '" style="display:none;"></span>' +
                 '</div>' +
                 '<div class="col-md-6">' +
                 '<div class="quantity" style="float:right;">' +
                 '<button class="btn btn-sm btn-outline-secondary decreaseQuantity" style="margin-right:10px;">-</button>' +
                 '<span class="quantity-value">1</span>' +
                 '<button class="btn btn-sm btn-outline-secondary increaseQuantity" style="margin-left:10px;">+</button>' +
                 '</div>' +
                 '<div class="total-price">' +
                 'Total: $<span class="total-price-value">' + productPrice + '</span>' +
                 '</div>' +
                 '</div>' +
                 '</div>' +
                 '</li>';
 
             $('#cartItemList').append(newItem);
             calculateTotal();
             toastr.success('Added ' + productName + ' to your cart.', 'Item Added');
          }
       });
 
       $(document).on('click', '.increaseQuantity', function() {
          var quantityElement = $(this).siblings('.quantity-value');
          var quantity = parseInt(quantityElement.text());
          quantityElement.text(quantity + 1);
          updateTotalPrice($(this).closest('.list-group-item'));
          toastr.info('Added ' + '1 more'  + ' ' +  ' to your cart.', 'Quantity Updated');
       });
 
       $(document).on('click', '.decreaseQuantity', function() {
          var quantityElement = $(this).siblings('.quantity-value');
          var quantity = parseInt(quantityElement.text());
          if (quantity > 1) {
                quantityElement.text(quantity - 1);
                updateTotalPrice($(this).closest('.list-group-item'));
          }
          toastr.info('Removed ' +' '+ 'quantity' + ' ' +  ' from your cart.', 'Quantity Updated');
       });
 
       function updateTotalPrice(item) {
          var pricePerUnit = parseFloat(item.find('.product-details').text().split(' - $')[1]);
          var quantity = parseInt(item.find('.quantity-value').text());
          var totalPrice = pricePerUnit * quantity;
          item.find('.total-price-value').text(totalPrice.toFixed(2));
 
          calculateTotal();
          toastr.info('Total price has been changed ' + totalPrice + ' ' +  ' to your cart.', 'Price Updated');
 
       }
 
       function calculateTotal() {
          var total = 0;
          $('.total-price-value').each(function() {
             total += parseFloat($(this).text());
          });
          $('.total-cart-price').text('Total: $' + total.toFixed(2));
       }
 
       function handleCartCleanup() {
          toastr.warning('Your cart has been cleared!');
          $('#cartItemList').empty();
          calculateTotal();
          $('#cartModal').modal('hide');
       }
 
       $(document).on('click', '.removeSelected', handleCartCleanup);
    });
 
    var productsData = [];
    var orderTypeData = '';
 
    $(document).ready(function() {
       $('.checkoutButton').on('click', function() {
          var products = [];
          var totalAmount = 0;
 
          var OrderType = $(this).data('order-type');
          if(OrderType === "buynow"){
             totalAmount = $(this).data('product-price');
             productId = $(this).data('product-id');
 
             products = {
                id: productId,
                amount: totalAmount,
          };
          }else{
             $('.list-group-item').each(function() {
                var $cartItem = $(this);
                var productId = $cartItem.find('.product-id').data('id');
                var amount = parseFloat($cartItem.find('.total-price-value').text());
                totalAmount += amount;
                products.push({ id: productId, amount: amount });
          });
          }
          $('#paymentAmount').val(totalAmount.toFixed(2));
 
          /* var products = [];
          var totalAmount = 0;
          $('.list-group-item').each(function() {
                var $cartItem = $(this);
                var productId = $cartItem.find('.product-id').data('id');
                var amount = parseFloat($cartItem.find('.total-price-value').text());
                totalAmount += amount;
                products.push({ id: productId, amount: amount });
          });
          $('#paymentAmount').val(totalAmount.toFixed(2)); */
 
          productsData = products;
          orderTypeData = OrderType;
       });
 
       $('.saveShipingAddress').on('click', function() {
          var name = $('#fullName').val();
          var email = $('#email').val();
          var address = $('#address').val();
          var state = $('#state').val();
          var country = $('#country').val();
          var zipcode = $('#zipCode').val();
          var amount = $('#paymentAmount').val();
          var payment_type = $('#paymentType').val();
 
          var dataToSend = {
                name: name,
                email: email,
                address: address,
                state: state,
                country: country,
                zipcode: zipcode,
                amount: amount,
                payment_type: payment_type,
                products: productsData,
                orderType: orderTypeData
          };
 
          $.ajax({
                url: "{{ route('getAddToCart') }}",
                type: 'POST',
                headers: {
                   'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: dataToSend,
                success: function(response) {
                   if (response.status === true) {
                      toastr.success(response.message);
                   
                      if (response.payment_type === 'paypal') {
                         setTimeout(function() {
                            window.location.replace("{{ route('home') }}");
                         }, 1000);
                      } else if (response.payment_type === 'stripe') {
                         setTimeout(function() {
                            window.location.replace("{{ route('home') }}");
                         }, 1000);
                      } else {
                         setTimeout(function() {
                            window.location.replace("{{ route('home') }}");
                         }, 1000);
                      }
                   } else {
                      toastr.error(response.error);
                   }
                },
          });
       });
    });
 </script>