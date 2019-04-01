<?php
 session_start();

//require 'header.php';
include "../core/PanierC.php";

?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post" action="cart.php">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
              
                  <tr>
                    
                    <td class="product-thumbnail">
                      <img src="images/<?php echo $p['ID_PRO']; ?>.jpg" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $p['nom']; ?></h2>
                    </td>
                    <td><a id="prix" >1000</a> DT</td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 150px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" style="width: 50%"  name="qte<?php echo $p['ID_PRO'] ?>" id="qteC" class="form-control text-center" value="500" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <!-- <td ><?php echo $p['prix']*$p['QTE']; ?> DT</td> -->
                    <td ><a id="total1"></a></td>
                    <script type="text/javascript">
                      var qte = document.getElementById("qteC").value;
                      var total1 = document.getElementById("total1");

                      var prix = document.getElementById("prix").innerHTML;
                      alert(prix);
                      if(parseInt(qte)>=500)
                      {
                        var tot =parseInt(prix-prix*(80/100));
                        alert(tot);

                        total1.innerHTML=total1+tot+"DT";
                      }else{
                         total1.innerHTML="0DT";
                      }
                    </script>
                </div>
                    <td><a href="cart.php?del=<?php echo $p['ID_PRO']; ?>" class="btn btn-primary btn-sm">X</a></td>
                  </tr>
              
                </tbody>
              </table>
            </div>
          
        </div>
     
        
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button type="submit" class="btn btn-primary btn-sm btn-block">Update Cart</button>
</form>
              </div>
              <div class="col-md-6">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>
          </div>
           
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
               
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><a id="total">2000</a>DT</strong>
                   
                  </div>
                  <span class="text-black">Total Avec remise</span>
                   <strong class="text-black"><a id="totalR"></a></strong>
                    <script type="text/javascript">
                      var total = document.getElementById("total").innerHTML;
                      var totalR = document.getElementById("totalR");
                      if(parseInt(total)>=2000)
                      {
                        var tot =parseInt(total-(total*(80/100)));
                        totalR.innerHTML=totalR+tot+"DT";
                        
                      }else{
                         totalR.innerHTML="0DT";
                      }
                    </script>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

