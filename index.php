<?php
include('db.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>FORM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<h4><center><b>SAMAGRA SIKSHA TELANGANA</b></center></h4>
<?php
  include 'db.php';
  $query = "SELECT * FROM dist Order by d_name";
  $result = $conn->query($query);
?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
  <form action="createpdf2.php"  method="post" enctype="multipart/form-data">
<div class="form-group">
          <label for="email">District :</label>
          <select name="dist" id="dist" class="form-control" onchange="FetchState(this.value)" required>
            <option value="" selected>select district </option>
          <?php
            if ($result->num_rows > 0 ):?> 
            <?php
               while ($row = $result->fetch_assoc()):?> 
                <option value="<?php echo $row['id']?>"><?php 

                echo $row['d_name']?></option>;
               
               <?php endwhile;?>
               <?php endif;?>
           
          </select>
        </div>

        <div class="form-group">
          <label for="pwd">Mandal:</label>
          <select name="mandal" id="mandal" class="form-control" value="mandal-val"   onchange="Fetch(this.value)" required>
            <option>Select mandal</option>
          </select>
        </div>
         <div class="form-group">
 <label>FIRST NAME :</label>
  <input type="text" id="a1" name='name' value='' required />
</div>
<div class="form-group">
 <label> LAST NAME :</label>
  <input type="text" id="a2" name='lname' value='' required />
</div>
<div class="form-group">
<label> AT : </label>  
<input type="text" id="a3" name='office' value='' required />
</div>
<div class="form-group">
 <label for=""><b> FROM:   </b></label>  
 <input type="date" id="a4" name='from' value='' required />
</div>
<div class="form-group">
<label for=""><b>TO :</b></label> 
<input type="date" id="a5" name='to' value='' required />
</div>

  <label>DESIGNATION:</label>
  <div class="form-group">
  <select class="form-control" id="a6" name="designation" required>
    <option value="" >SELECT DESIGNATION </option>
      <option value="MIS Coordinator">MIS Coordinator</option>
      <option value="IERP">IERP</option>
      <option value="Data Entry operator">Data Entry operator</option>
      <option value="Cluster Resource Person">Cluster Resource Person</option>
    <option value="Part Time Instructor(Comp)">Part Time Instructor(Computer)</option>
      <option value="Part Time Instructor(Work)">Part Time Instructor (Work)</option>
     <option value="Part Time Instructor(Art)">Part Time Instructor (Art)</option>
    <option value="Part Time Instructor(PET)">Part Time Instructor (PET)</option>
    <option value="Messenger">Messenger</option>
    <option value="CGV">CGV</option>
   </select>

      </div>

<label>BANK NAME:</label>
 <div class="form-group">  
  <select class="form-control" id="a7" name="bank" required>
                         <option value="" >SELECT BANK NAME</option>
                                              <option value="State Bank Of India">State Bank Of India</option>
                                              <option value="Canara Bank">Canara Bank</option>
                                              <option value="Andhra Bank">Andhra Bank</option>
</select>
</div>
<label>MONTH OF:</label>
<div class="form-group">                                                                                   
 <select class="form-control" id="a8" name="month" required>
              <option value="" >SELECT MONTH :</option>
              <option value="April 2020">April 2020</option>
              <option value="May 2020">May 2020</option>
             <option value="June 2020">June 2020 </option>   
             <option value="July 2020">July 2020 </option>     
             <option value="August 2020">August 2020 </option>     
             <option value="September 2020">September 2020 </option>     
             <option value="October 2020">October 2020 </option>     
             <option value="November 2020">November 2020 </option>     
             <option value="December 2020">December 2020 </option>                
    </select>
  </div>

  <div class="form-group">
  <label>BANK ACCOUNT NO: </label>
  : <input type="text" id="a9" name='accountnum' value='' required/>
  </div>
  <div class="form-group">
  <label for=""><b>BRANCH: </b> </label>
  <input type="text" id="a10" name='branch' value='' required/>
  </div>
  <div class="form-group">
  <label for=""><b>IFSC/RTGS CODE: </b></label>
  <input type="text" id="a11" name='ifsc' value='' required/>
  </div>
  <div class="form-group">
  <label for=""><b>No of CL's Availed this Month: </b> </label>
  <input type="number" id="a12" name='no' value='' required/>
  </div>
  <div class="form-group">
  <label for=""><b>Total No of CL's Availed: </b></label>
  <input type="number" id="a13" name='total' value='' required/>
  </div>
  <label>SIGNATURE OF: </label>
<div class="form-group">                                                                                   
 <select class="form-control"  id="a14" name="sign" required>
 <option value="" >Signature of</option>
              <option value="MEO">MEO</option>
              <option value="CHM">CHM</option>
             <option value="HM">HM</option>         
    </select>
  </div>
<button  class="btn btn-success" name="submit">SUBMIT</button>
  </form>
  </div>
  </div>
</div>
<script type="text/javascript">
  function FetchState(id){
    $('#mandal').html('');
    $.ajax({
      type:'post',
      url: 'nxt.php',
      data : { d_id : id},
      success : function(data){
         $('#mandal').html(data);
      }

    })
  }
  </script>
  <script>
  
  window.onload = function() {
    var selItem = localStorage.getItem("SelItem");
    var setItem = localStorage.getItem("SetItem"); 
    var a1 = localStorage.getItem("a1");
    var a2 = localStorage.getItem("a2");
    var a3 = localStorage.getItem("a3");
    var a6 = localStorage.getItem("a6");
    var a7 = localStorage.getItem("a7");
    var a9 = localStorage.getItem("a9");
    var a10 = localStorage.getItem("a10");
    var a11 = localStorage.getItem("a11");
    var a14 = localStorage.getItem("a14");
    if (selItem!=null){
    $('#dist').val(selItem);
    $.ajax({
      type:'post',
      url: 'nxt.php',
      data : { d_id : selItem},
      success : function(data){
         $('#mandal').html(data);
         if (setItem!=null){
    $('#mandal').val(setItem);
    } 
    if (a1!=null){
    $('#a1').val(a1);
    } 
    if (a2!=null){
    $('#a2').val(a2);
    } 
    if (a3!=null){
    $('#a3').val(a3);
    }
    if (a6!=null){
    $('#a6').val(a6);
    } 
    if (a7!=null){
    $('#a7').val(a7);
    }
    if (a9!=null){
    $('#a9').val(a9);
    }
    if (a10!=null){
    $('#a10').val(a10);
    }
    if (a11!=null){
    $('#a11').val(a11);
    }
    if (a14!=null){
    $('#a14').val(a14);
    }
 

      }

    })
    }
    }
 
    $('#dist').change(function() { 
        var selVal = $(this).val();
        localStorage.setItem("SelItem", selVal);
    });
    $('#mandal').change(function() { 
        var setVal = $(this).val();
        localStorage.setItem("SetItem", setVal);
    });
    $('#a1').change(function() { 
        var a1 = $(this).val();
        localStorage.setItem("a1", a1);
    });
    $('#a2').change(function() { 
        var a2 = $(this).val();
        localStorage.setItem("a2", a2);
    });
    $('#a3').change(function() { 
        var a3 = $(this).val();
        localStorage.setItem("a3", a3);
    });
    $('#a6').change(function() { 
        var a6 = $(this).val();
        localStorage.setItem("a6", a6);
    });
    $('#a7').change(function() { 
        var a7 = $(this).val();
        localStorage.setItem("a7", a7);
    });
    $('#a9').change(function() { 
        var a9 = $(this).val();
        localStorage.setItem("a9", a9);
    });
    $('#a10').change(function() { 
        var a10 = $(this).val();
        localStorage.setItem("a10", a10);
    });
    $('#a11').change(function() { 
        var a11 = $(this).val();
        localStorage.setItem("a11", a11);
    });
    $('#a14').change(function() { 
        var a14 = $(this).val();
        localStorage.setItem("a14", a14);
    });
    $('#a10').change(function() { 
        var a10 = $(this).val();
        localStorage.setItem("a10", a10);
    });
  
  </script>
</body>
</html>