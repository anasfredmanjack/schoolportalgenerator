//===================add new member ==================//
       $('#anas_create_board_member_btn').click(function(){

             
        var anasmembername = $("#anasmembername").val();
        var anasmembertitle = $("#anasmembertitle").val();
            
            if(anasmembertitle !='' && anasmembername !=''){
                var $this = $(this);
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Processing...';
                if ($(this).html() !== loadingText) {
                    $this.data('original-text', $(this).html());
                    $this.html(loadingText);
                }
            }


       });
        //=====================end new member==================//
        


//====================edit board member======================//
$('body').on('click','#anasditboardid',function(){
    var anasboardmemberid = $(this).data('id');
    var InstitutionID = <?php echo $InstitutionID;?>;
    $("#anaseditmodalbody").html('<i class="fa fa-circle-o-notch fa-spin"></i>  ...Loading Details');
    $("#anaseditboardmodal").hide();

            $.ajax({
                                        url: '../controller/scripts/website/loadeditboardmember.php',
                                        method:'POST',
                                        data: 'InstitutionID='+InstitutionID+'&anasboardmemberid='+anasboardmemberid,
                                        success: function(anaseditboardmemberoutput) {
                                            $("#anaseditmodalbody").html(anaseditboardmemberoutput);
                                            $("#anaseditboardmodal").show();
                                    
                                        }

                });

                        $('body').on("click","#anas_edit_board_member_btn",function(){
                            $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Updating');
                            var anaseditmembername = $("#anaseditmembername").val();
                            var anaseditmembertitle = $("#anaseditmembertitle").val();

                            var anasformData = new FormData();
                            var anasfilesend = $('#anaseditmemberimage')[0].files[0];
                            anasformData.append('anasfilesend', anasfilesend);
                            anasformData.append('anaseditmembername', anaseditmembername);
                            anasformData.append('anaseditmembertitle', anaseditmembertitle);
                            anasformData.append('anasboardmemberid', anasboardmemberid);


                            $.ajax({
                                        url: '../controller/scripts/website/editboardmember.php',
                                        method:'POST',
                                        data: anasformData,
                                        cache:false,
                                        contentType: false,
                                        processData: false,
                                        success: function(anasupdateboardmemberoutput) {
                                        $("#anasboardresponse").html(anasupdateboardmemberoutput);
                                            $("#anas_edit_board_member_btn").html('Update Details');
                                            location.reload();
                                    
                                        }

                            });
                                                

                        });
});

//=======================edit board member===============//

//============================delete board member==============//
$('body').on('click','#anasdeleteboardid', function(){
    var anasboardmemberid = $(this).data('id');
    var InstitutionID = <?php echo $InstitutionID;?>;

        
                $('body').on('click','#anas_delete_board_member_btn', function(){
                    $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> deleting');

                            $.ajax({
                                                url: '../controller/scripts/website/deleteboardmember.php',
                                                method:'POST',
                                                data: 'anasboardmemberid='+anasboardmemberid+'&InstitutionID='+InstitutionID,
                                               
                                                success: function(anasdeleteboardmemberoutput) {
                                                $("#anasdeleteboardresponse").html(anasdeleteboardmemberoutput);
                                                    $("#anas_delete_board_member_btn").html('Update Details');
                                                    location.reload();
                                            
                                                }

                                    });



                });

});
//===========================delete board member============//