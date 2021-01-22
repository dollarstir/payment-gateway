

<html>
    <head><title>Money</title>
    </head>
    <body>
        
        <?php
        
        $fname = $_POST['firt_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $amount = $_POST['amount'];
        $r1 = 'DS';
        $r2= rand(1111111,9999999);
        $myref = $r1.''.$r2;
        
        ?>
        
        <h1><?php echo $fname;?></h1>
        <form id="paymentForm">
          
                <button type="button" onclick="payWithPaystack()"> Pay </button>
           
            <!--<button>Submit</button>-->
        </form>
        
        <script>
            var paymentForm = document.getElementById('paymentForm');

            paymentForm.addEventListener('submit', payWithPaystack, false);

    function payWithPaystack() {
    
      var handler = PaystackPop.setup({
    
        key: 'pk_test_25b3d5f8bfb5621c4569175877020aafe6085a0a', // Replace with your public key
    
        email: '<?php echo $email?>',
    
        amount: <?php echo $amount * 100 ;?>, // the amount value is multiplied by 100 to convert to the lowest currency unit
    
        currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
    
        firstname: '<?php echo $fname?>',
    
        lastname: '<?php echo $lname?>',
    
        ref: '<?php echo $myref ;?>', // Replace with a reference you generated
        metadata: {
            custom_fields : 
                [
                        {
                            display_name: 'Mobile Number',
                            variable_name: 'mobile_number',
                            value:"+233556676471"
                        }
                        
                
                ]
        },
    
        callback: function(response) {
    
          //this happens after the payment is completed successfully
    
          var reference = response.reference;
          var fname  = '<?php echo $fname;?>';
          var lname = '<?php echo $lname;?>';
          var email = '<?php echo $email;?>';
          var amount = '<?php echo $amount;?>';
    
        //   alert('Payment complete! Reference: ' + reference);
        window.location='success.php?ref='+ reference + '&fname=' + fname + '&lname=' + lname + '&email=' + email + '&amount=' + amount ;
    
          // Make an AJAX call to your server with the reference to verify the transaction
    
        },
    
        onClose: function() {
    
          alert('Transaction was not completed, window closed.');
    
        },
    
      });
    
      handler.openIframe();
    
    }
        </script>
        
              <script src="https://js.paystack.co/v1/inline.js"></script> 

    </body>
</html>