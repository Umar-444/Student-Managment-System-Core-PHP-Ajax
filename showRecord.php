<?php include("./templetes/head.php"); ?>
<body>
<?php include("./templetes/navbar.php"); ?>


<br>
<div class="col-xl-12 mx-auto">
      <div class="card-body text-center">
        <h5 class="card-title">All Records</h5>
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
                  <th scope="col">Action</th>
                </tr>
              </thead>
             <tbody id="studentRecordTable">
            </tbody>
          </table>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="dataModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Student Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="updateRecordForm">
          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">CNIC:</label>
            <div class="col-sm-9">
              <input type="text" name="upcnic" id="cnic" class="form-control"placeholder="e.g 17301-3780509-9"required>
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Name:</label>
            <div class="col-sm-5">
              <input type="text" name="upfirstName" id="firstName" class="form-control" placeholder="Muhammad" required>
            </div>
            <div class="col-sm-4">
              <input type="text" name="uplastName" id="lastName" class="form-control" placeholder="Imran" required>
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">DOB:</label>
            <div class="col-sm-9">
              <input type="text" name="updob" id="dob" class="form-control"placeholder="e.g 15-August-1996" required>
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Address:</label>
            <div class="col-sm-9">
              <input type="text" name="upaddress" id="address" class="form-control" placeholder="e.g Muhalla Markazi Korla Mohsin Khan" required>
            </div>
          </div>
         <div class="form-group row">
            <label  class="col-sm-3 col-form-label">City:</label>
            <div class="col-sm-9">
              <select class="form-control" name="upcity" id="city" required>
                <option value="">Select</option>
                <option value="Peshawar">Peshawar</option>
                <option value="Islamabad">Islamabad</option>
                <option value="Lahore">Lahore</option>
                <option value="Karachi">Karachi</option>
                <option value="Quetta">Quetta</option>
              </select>
            </div>
          </div>
         <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Degree Program:</label>
            <div class="col-sm-9">
              <select class="form-control" name="updegreeProgram" id="degreeProgram" required>
                <option value="">Select</option>
                <option value="BS Computer Science">BS Computer Science</option>
                <option value="MS Computer Science">MS Computer Science</option>
                <option value="BS BioTechnology">BS BioTechnology</option>
                <option value="BS English">BS English</option>
                <option value="Bechlor In Commerce">Bechlor In Commerce</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Sex:</label>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="upsex" id="male" value="Male" required>
                <label class="form-check-label">Male</label>
            </div>
              <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="upsex" id="female" value="Female" required>
                <label class="form-check-label">Female</label>
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-9">
              <input type="email" name="upemail" id="email" class="form-control" placeholder="e.g x.imran99@yahoo.com (Optional)">
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Mobile#:</label>
            <div class="col-sm-9">
              <input type="text" name="upmobile" id="mobile" class="form-control" placeholder="e.g 03152471993 (Optional)">
            </div>
          </div>
          <div class="form-group row">
             <div class="col-sm-3">
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
            <div class="col-sm-3">
              <input type="hidden" name="updateGetId" id="updateGetId" class="form-control">
              <button type="Submit" class="btn btn-primary" id="updateButton" >Update Record</button>
            </div>
            <div class="col-sm-6" id="message">
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>





<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript">
	

    setInterval(function(){
    updateRecordTable();
  },1000);

  function updateRecordTable() {
    $.ajax({

        url: 'showStudents.php',
        type: 'POST',
        success:function(tabledata){

        if(!tabledata.error) {
          $('#studentRecordTable').html(tabledata);
        }

      }


    });
}



 function deleteStudent(id){

         var deleteRecord = 'deleteRecord';
  
        alert("Are You Sure?");

        $.post('process.php', {id: id, deleteRecord: deleteRecord}, function(deleteStudent) {
            $('#message').html(deleteStudent);

        });
}



    $(document).ready(function() {
      
      $(document).on('click', '.editData', function(){
          var updateId = $(this).attr('id');
          $.ajax({
            url: 'fetchData.php',
            method: 'POST',
            data: {updateId:updateId},
            dataType: 'json',
            success:function(getData){
              // alert(getData);
                $('#cnic').val(getData.CNIC);
                $('#firstName').val(getData.FName);
                $('#lastName').val(getData.LName);
                $('#dob').val(getData.DOB);
                $('#address').val(getData.Address);
                $('#city').val(getData.City);
                $('#degreeProgram').val(getData.DProgram);
                $('#email').val(getData.Email);
                var Sex = getData.Sex;
                if (studentSex = 'Male'){
                  $('#male').prop("checked", true);
                }else{
                  $('#female').prop("checked", true);
                }
                $('#mobile').val(getData.Mobile);
                $('#updateGetId').val(getData.ID);
              $('#dataModal').modal('show');
            }
          })
      });
    });


    
      $('#updateRecordForm').submit(function(evt) {
       evt.preventDefault();
       var updateData = $(this).serialize();
             $.post('process.php', updateData, function(myUpdateData) {
            $('#message').html(myUpdateData);

        });
      });


</script>
</body>
</html>