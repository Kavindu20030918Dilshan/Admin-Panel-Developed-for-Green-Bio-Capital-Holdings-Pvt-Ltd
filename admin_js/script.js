var av;
function adminVerification() {
  var email = document.getElementById("e");
  // alert(email.value);

  var f = new FormData();
  f.append("e", email.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "Success") {
        email.value = "";
        Swal.fire({
          position: "top-center",
          icon: "success",
          title:
            "Please take a look at your email to find the Verification Code.",
          showConfirmButton: false,
          timer: 3000,
        });

        var adminVerificationModal =
          document.getElementById("verificationModal");
        av = new bootstrap.Modal(adminVerificationModal);
        av.show();
      } else {
        email.value = "";
        Swal.fire({
          icon: "error",
          title: response,
        });
      }
    }
  };

  request.open("POST", "adminVerificationProcess.php", true);
  request.send(f);
}

function verify() {
  var code = document.getElementById("vcode");
  var email = document.getElementById("e");
  var form = new FormData();
  form.append("c", code.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      if (response == "success") {
        av.hide();
        email.value = "";
        window.location = "adminDashboard.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "codeVerificationProcess.php", true);
  request.send(form);
}




var av;
var productID;
function openModal(id) {
  // alert(id);
  productID = id;

  var oM = document.getElementById("openModalnew");
  av = new bootstrap.Modal(oM);
  av.show();

}













if (!/^[a-zA-Z0-9]+$/.test(qty.value)) {
  // alert("Please Enter Valid Characters");
  Swal.fire({
    icon: "error",
    title: "Please Enter Valid Characters",
   
    
  });
} else if (!/^[a-zA-Z0-9]+$/.test(up.value)) {
  // alert("Please Enter Valid Characters");
  Swal.fire({
    icon: "error",
    title: "Please Enter Valid Characters",
   
    
  });
} else {
  var f = new FormData();
  f.append("pname", pname.value);
  f.append("qty", qty.value);
  f.append("up", up.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "New Stock Added Successfull" || response == "Stock Updated Successfull") {
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: response,
          showConfirmButton: false,
          timer: 2000
        });

        pname.value = "";
      qty.value = "";
      up.value = "";
      } else {
        loadReg();
        Swal.fire({
          icon: "error",
          title: response,
         
          
        });
      }
      
     
    }
  };

  request.open("POST", "updateStockProccess.php", true);
  request.send(f);
}




























function update(){
  productID;
  
  // var pname = document.getElementById("pname");
  var pqty = document.getElementById("pqty");
  // var pweight = document.getElementById("pweight");



  if (!/^[a-zA-Z0-9]+$/.test(pqty.value)) {
    // alert("Please Enter Valid Characters");
    Swal.fire({
      icon: "error",
      title: "Please Enter Valid Characters",
     
      
    });
  }else{

  var f = new FormData();
  f.append("ppid", productID);
  f.append("pqty", pqty.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
     
      if (response == "Success") {
        // window.location.reload();
       
        pqty.value = "";
        

        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Product Update Successfully Completed.",
          showConfirmButton: false,
          timer: 2500,
        });
        
        setTimeout(function(){window.location.reload(true) = "adminDashboard.php"},2000);
        //  window.location = "adminDashboard.php";
      } else{
        
        Swal.fire({
          icon: "error",
          title: response,
        });
        
        
      }
      
    }

  };

  request.open("POST", "updateQtyProcess.php", true);
  request.send(f);
}




}




// function loadData(id){

  // var f = new FormData();
  // f.append("id",id);
  // var request = new XMLHttpRequest();
  // request.onreadystatechange = function(){
  //   if (request.readyState == 4 & request.status == 200) {
  //      var respose =  request.responseText;
  //      alert(respose);
  //   }
  // };

  // request.open("POST","loadModelDataProccess.php",true);
  // request.send(f);

  // var mysql = require('mysqli');
  // var connection = mysql.createConnection({
  //   host: "localhost",
  //   user: "root",
  //   password: "Kavindu@dilshan",
  //   database: "bio_db"

  // });

  // connection.connect(function(err){
  //   if(err) throw err;
  //   connection.query("SELECT * FROM `products`  ",function (err,result){
  //     if (err) throw err;
  //   console.log(result); 
  //   });
    
      
    
  // });
// }




// function getProductId(id){

// pid =  id;
// var f = new FormData();
// f.append("pid",pid);

// var request = new XMLHttpRequest();
// request.onreadystatechange = function(){
//   if (request.readyState == 4 && request.status == 200) {
//        var response = request.responseText;
//       //  alert(response);
       
//           openModal(response);
       
//   }
// };

// request.open("POST","SetProductSessionProccess.php",true);
// request.send(f);

// }



function adminLogOut(){
  
  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        if (response = "Success") {
            window.location = "adminSignin.php";
        }
        
        
    }
};

request.open("POST","adminSignOutProccess.php",true);
request.send();
}


var av2;
var productID2;
function openModal2(id){
  // alert(id);
  productID2 = id;

  var oM = document.getElementById("openModalnew2");
  av2 = new bootstrap.Modal(oM);
  av2.show();
}


function changeStatus(){
  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        
        
        
    }
};

request.open("POST","changeStatusfeedback.php",true);
request.send();
}


