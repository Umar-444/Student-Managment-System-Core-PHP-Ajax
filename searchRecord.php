<?php include("./templetes/head.php"); ?>
<body>
<?php include("./templetes/navbar.php"); ?>


<br>
<div class="col-xl-12 mx-auto">


        <div class="form-group row col-md-6 mx-auto">
            <label  class="col-sm-3 col-form-label">Search Record:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="searchStudent" placeholder="e.g 17301-3780509-9">
            </div>
          </div>

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cnic</th>
      <th scope="col">Name</th>
      <th scope="col">DOB</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Degree Program</th>
      <th scope="col">Sex</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody id="result">

  </tbody>
</table>
</div>





<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript">
	
    $('#searchStudent').keyup(function(){
    var search = $('#searchStudent').val();
          
          $.ajax({

            url : 'searchStudent.php',
            data : {search:search},
            type : 'POST',
            success:function(searchData) {
              if (!searchData.error) {
                $('#result').html(searchData);
              } 
            }
          });

    });
 



</script>
</body>
</html>