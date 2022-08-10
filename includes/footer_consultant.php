 <?php
 
  
  
  $ServiceProvidersName = 'School Portal Generator';
  $ServiceProvidersUrl = 'https://www.schoolportalgenerator.com';
  
  $ServiceProvidernameMain = $PrimaryName.' '.$SecondaryName;
  $serviceProviderUrlMain = $serviceProviderUrlMain;
  
  $AccountType;
 ?>
 
 <?php
        if($AccountType =='demo'){
 ?>
 <form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
</form>
          <footer style="position: fixed;" class="footer">
                © <?php echo $PrimaryName.' '.$SecondaryName; ?>
                <br>
                Powered by <a href="<?php echo $ServiceProvidersUrl; ?>"><span style="color:#C6C6FF; font-size: 15px;"><?php echo  $ServiceProvidersName; ?></span></a>-<a onClick="makePayment()" style="color:#F2F2F2;" href="#"><span>(Remove TradeMark)</span></a>
            </footer>
<?php
}
else
{
?>

<footer style="position: fixed;" class="footer">
                © <?php echo $PrimaryName.' '.$SecondaryName; ?>
                <br>
                Powered by <a href="<?php echo $serviceProviderUrlMain; ?>"><span style="color:#C6C6FF; font-size: 12px;"><?php echo  $ServiceProvidernameMain; ?></span></a>
            </footer>
<?php
 }
?>


<script>
  function makePayment(){
      
     var SignUpDate = '<?php echo date("d-m-Y"); ?>';
     var NextDueDate = '<?php echo date("d-m-Y", strtotime('+1 year')); ?>';
     var ConsultantID = "<?php echo $ConsultantID; ?>";
     var SubscriptionPrice = "<?php echo $SubscriptionPrice; ?>";
     
     
     var d = new Date();
     var n = d.getTime();
     var p = Math.floor((Math.random() * 100) + 1);
     var referencenumber = "RX" + n + "-" + p;
      
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-39273a4cb9c3b96a4307ffea31898b95-X",
      tx_ref: referencenumber,
      amount: SubscriptionPrice,
      currency: "NGN",
      country: "NG",
      payment_options: " ",
      
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: "<?php echo $Email; ?>",
        phone_number: "<?php echo $Phone; ?>",
        name: "<?php echo $PrimaryName.' '.$SecondaryName; ?>",
      },
      callback: function (data) {
          
             $.ajax({
                    url: '../controller/scripts/consultant/updateConsultantStatus.php',
                    method:'POST',
                    data: 'SignUpDate=' + SignUpDate +'&NextDueDate=' + NextDueDate + '&ConsultantID='+ ConsultantID,
                    success: function(maindata) {
                       location.replace("consultantPaymentSuccess.php");
                    
                    }
                 });
          
        console.log(data);
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "School Portal Generator (By Chov LLC)",
        description: "Consultant Premium Subscription",
        logo: "https://www.linkpicture.com/q/chov-logo-icon-New.png",
      },
    });
  }
</script>