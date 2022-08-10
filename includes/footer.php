 <?php
 
  
  
  $ServiceProvidersName = 'School Portal Generator';
  $ServiceProvidersUrl = 'https://www.schoolportalgenerator.com';
  
  
  
  $ServiceProvidernameMain = $ConsultantName;
  $serviceProviderUrlMain = $ConsultantWebsite;
  
  $AccountType = $ConsultantType;
 ?>
 
 
 
 
 
 <?php
        if($AccountType =='demo'){
 ?>
  <footer style="position: fixed;" class="footer">
                © <?php echo $PrimaryName.' '.$SecondaryName; ?>
                <br>
                Powered by <a href="<?php echo $ServiceProvidersUrl; ?>"><span style="color:#C6C6FF; font-size: 15px;"><?php echo  $ServiceProvidersName; ?></span></a>-<a style="color:#F2F2F2;" href="<?php echo $ServiceProvidersUrl ?>" target="_blank" ><span>(Get Yours Now)</span></a>
            </footer>
<?php
}
else
{
?>

<footer style="position: fixed;" class="footer">
                © <?php echo $PrimaryName.' '.$SecondaryName; ?>
                <br>
                Powered by <a target="_blank" href="<?php echo $serviceProviderUrlMain; ?>"><span style="color:#C6C6FF; font-size: 12px;"><?php echo  $ServiceProvidernameMain; ?></span></a>
            </footer>
<?php
 }
?>
