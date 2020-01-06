
$(document).ready(function(){
    $("#contact-form").on("submit", function(e){
        e.preventDefault();
        var valid;
        valid =validcontact();
        if(valid){
            jQuery.ajax({
                url: "contact_mail.php",
                data:$(this).serialize(),
                type: "POST",
                success:function(data){
                    $("#mail-status").html(data);
                    $(this).get(0).reset();
                },
                error:function (){}
            });
        }

    });

});

   
 function  validcontact(){
    var valid = true;
        
         var name= $(".name-input").val();
         var email= $(".email-input").val();
         var number= $(".number-input").val();
         var masssage= $(".massage-input").val();
         var address= $(".address-input").val();

        if(name==""){
            $(".empty-name").text("(required)");
            $(".empty-name").css("color","red");
            $(".name-input").css("background-color", "white"); 
            valid = false;
        }else{
            $(".empty-name").text("");
        }
        if(email==""){
            $(".empty-email").text("(required)");
            $(".empty-email").css("color","red");
            valid = false;
        }else{
            $(".empty-email").text("");
        }

        if(number==""){
            $(".empty-number").text("(required)");
            $(".empty-number").css("color","red");
            valid = false;
        }else{
            $(".empty-number").text("");
        }
        if(masssage==""){
            $(".empty-massage").text("(required)");
            $(".empty-massage").css("color","red");
            valid = false;
        }else{
            $(".empty-massage").text("");
        }
        if(address==""){
            $(".empty-address").text("(required)");
            $(".empty-address").css("color","red"); 
            valid = false;
        }else{
            $(".empty-address").text("");
        }
         if(!(name.length >5)){
            
             $("#error-name").text("Name should be greater than 5");
             $("#error-name").css("color","red");
             valid = false;
         }else{
            $("#error-name").text("");
         }

         if(!(email.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))){
           
             $("#error-email").text("write a valid email");
             $("#error-email").css("color","red");
             valid = false;
         }else{
            $("#error-email").text("");
         }

         if(!(address.match(/^[a-zA-Z0-9\s,.'-]{3,}$/))){
           
            $("#error-address").text("write a valid Address");
            $("#error-address").css("color","red");
            valid = false;
        }else{
           $("#error-address").text("");
        }
         
         if(!(number.match(/^\d{10}$/))){
            
             $("#error-number").text("Write a valid Number");
             $("#error-number").css("color","red");
             valid = false;
         }else{
            $("#error-number").text("");
         }
         
        
         return valid;

        }

        $(document).ready(function(){  
            $(".name-input").keydown(function(){  
                $(this).css("background-color", "#e8e8e8");  
            });
            $(".email-input").keydown(function(){  
                $(this).css("background-color", "#e8e8e8");  
            });  
            $(".number-input").keydown(function(){  
                $(this).css("background-color", "#e8e8e8");  
            });  
            $(".address-input ").keydown(function(){  
                $(this).css("background-color", "#e8e8e8");  
            });  
            $(".massage-input ").keydown(function(){  
                $(this).css("background-color", "#e8e8e8");  
            });     
        });

       


//$(document).ajaxSuccess(function() {
    //$( ".deliver-massage" ).text( "Thank You for contacting Us" );
  //});