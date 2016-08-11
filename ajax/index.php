<!DOCTYPE html>
<html>
<head>
<script src="jquery-2.2.1.min.js"></script>
<script src="http://codetrash.com/assets/js/jquery-1.10.2.min.js"></script>

  <meta charset="utf-8">
  <title>Contoh ajax</title>
</head>
<script>
  $(function(){
         
    //ketika submit button d click
    $("#submit-form").click(function(){
         
         //do ajax proses
         $.ajax({
           
           url : "respon.php", 
           type: "post", //form method
           data: $("#contoh-form").serialize(),
           dataType:"json", //misal kita ingin format datanya brupa json
           beforeSend:function(){
             //lakukan apasaja sambil menunggu proses selesai disini
             //misal tampilkan loading
             
             $(".loading").html("Please wait....");
             
           },
           success:function(result){
             
             if(result.status){
               
               alert("Selamat, resgistari sukses");
               window.location.href = "http://localhost/index.php";
               
             }else{
               
               alert("harap isi smw inputan");
             }
             
           },
           error: function(xhr, Status, err) {
             
             $("Terjadi error : "+Status);
           }
           
         });
              
       return false;
     })
  
  });
 </script>
<body>
 
  <div>
    <h2>Register</h2>
     <form id="contoh-form">
       <p>Nama</p>
          <input type="text" name="nama">
       <p>Email</p>
          <input type="text" name="email">
       <p>Password</p>
          <input type="password" name="password">
       <p>
         <input type="button" value="submit" id="submit-form">
      </p>
    </form>
    <br>
    <span class="loading"></span>
  </div>
    
</body>
</html>