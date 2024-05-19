<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
             <button type="button" class="close removeSelected" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <ul class="list-group" id="cartItemList">
             </ul>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-success" data-dismiss="modal">Add More</button>
             {{-- <button type="button" class="btn btn-secondary removeSelected" data-dismiss="modal">Discard</button> --}}
             <button type="button" class="btn  btn-primary checkoutButton" data-toggle="modal" data-target="#exampleModal">Checkout</button>
          </div>           
          <div class="total-section">
             <span class="total-cart-price"></span>
          </div>
       </div>
    </div>
 </div>
 {{-- For Address Model --}} 
 <style>
    input[type="text"],
    input[type="email"],
    select {
        text-transform: none;
    }
</style>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment & Shipping Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                      <h6>Shipping Information</h6>
                      <hr>
                      <div class="form-row">
                         <div class="form-group col-md-6">
                            <label for="fullName">Full Name:</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter full name" required>
                         </div>
                      <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" autocapitalize="none" required>
                      </div>
                      </div>
                      <div class="form-group">
                         <label for="address">Address:</label>
                         <input type="text" class="form-control" id="address" placeholder="Enter address" autocapitalize="none" required>
                      </div>
                      <div class="form-row">
                         <div class="form-group col-md-6">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" id="state" placeholder="Enter state" required>
                         </div>
                         <div class="form-group col-md-6">
                            <label for="country">Country:</label>
                            <input type="text" class="form-control" id="country" placeholder="Enter country" required>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="zipCode">Pin Code:</label>
                         <input type="text" class="form-control" id="zipCode" placeholder="Enter zip code" required>
                      </div>
                      <div class="form-row">
                         <div class="form-group col-md-6">
                            <label for="paymentAmount">Payment Amount:</label>
                            <input type="text" class="form-control" id="paymentAmount" placeholder="Enter amount">
                         </div>
                         <div class="form-group col-md-6">
                            <label for="paymentType">Payment Type:</label>
                            <select class="form-control" id="paymentType" required>
                                  <option value="">Select Payment Type</option>
                                  {{-- <option value="credit_card">Credit Card</option>
                                  <option value="debit_card">Debit Card</option> --}}
                                  <option value="paypal">PayPal</option>
                                  {{-- <option value="upi">UPI</option> --}}
                                  <option value="cash_on_delivery">Cash On Delivery</option>
                            </select>
                         </div>
                      </div>
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary saveShipingAddress">Confirm</button>
                </div>
             </form>
        </div>
    </div>
</div>  