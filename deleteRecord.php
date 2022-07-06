<?php include("./templetes/head.php"); ?>
<body>
<?php include("./templetes/navbar.php"); ?>


<br>
<div class="col-xl-12 mx-auto">
  <div class="card-body text-center">
        <h5 class="card-title">Delete Records</h5>
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
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody id="studentRecordTable">

  </tbody>
</table>

<div class="mx-auto col-md-6" id="message"></div>
</div>





<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript">
	

    setInterval(function(){
    updateRecordTable();
  },1000);

  function updateRecordTable() {
    $.ajax({

        url: 'deleteStudent.php',
        type: 'POST',
        success:function(tabledata){

        if(!tabledata.error) {
          $('#studentRecordTable').html(tabledata);
        }

      }


    });
}




</script>
</body>
</html>

<script type="text/javascript">


  function deleteStudent(id){

         var deleteRecord = 'deleteRecord';
  
        alert("Are You Sure?");

        $.post('process.php', {id: id, deleteRecord: deleteRecord}, function(deleteStudent) {
            $('#message').html(deleteStudent);

        });
}

</script>