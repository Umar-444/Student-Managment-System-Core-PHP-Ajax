<?php include("./templetes/head.php"); ?>
<body>
<?php include("./templetes/navbar.php"); ?>


	<div class="container">
	<div class="myForm mx-auto text-black bg-white col-md-8">
  	
  		<div class="card-body text-center">
		    <h5 class="card-title">Add Record</h5>
		    </div>
				<form id="addRecordForm">
				  <div class="form-group row">
				    <label  class="col-sm-3 col-form-label">CNIC:</label>
				    <div class="col-sm-9">
				      <input type="text" name="cnic" class="form-control"placeholder="e.g 17301-3780509-9"required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 col-form-label">Name:</label>
				    <div class="col-sm-5">
				      <input type="text" name="firstName" class="form-control" placeholder="Muhammad" required>
				    </div>
				    <div class="col-sm-4">
				      <input type="text" name="lastName" class="form-control" placeholder="Imran" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 col-form-label">DOB:</label>
				    <div class="col-sm-9">
				      <input type="text" name="dob" class="form-control"placeholder="e.g 15-August-1996" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 col-form-label">Address:</label>
				    <div class="col-sm-9">
				      <input type="text" name="address" class="form-control" placeholder="e.g Muhalla Markazi Korla Mohsin Khan" required>
				    </div>
				  </div>
				 <div class="form-group row">
				    <label  class="col-sm-3 col-form-label">City:</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="city" required>
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
				      <select class="form-control" name="degreeProgram" required>
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
  						<input class="form-check-input" type="radio" name="sex" value="Male" required>
  							<label class="form-check-label">Male</label>
						</div>
				    	<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="sex" value="Female" required>
  							<label class="form-check-label">Female</label>
						</div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 col-form-label">Email:</label>
				    <div class="col-sm-9">
				      <input type="Email" name="email" class="form-control" placeholder="e.g x.imran99@yahoo.com (Optional)">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label  class="col-sm-3 col-form-label">Mobile#:</label>
				    <div class="col-sm-9">
				      <input type="text" name="mobile" class="form-control" placeholder="e.g 03152471993 (Optional)">
				    </div>
				  </div>
				  <div class="form-group row">
   					 <div class="col-sm-3">
      				<button type="reset" class="btn btn-primary">Reset</button>
    				</div>
   				 	<div class="col-sm-3">
      				<button type="Submit" class="btn btn-primary">Add Student</button>
    				</div>
   			 		<div class="col-sm-6" id="message">
      				
    				</div>
				  </div>
				</form>
  		
	</div>
</div>
	







<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
        $('#addRecordForm').submit(function(evt) {
			 evt.preventDefault();
			 var recordData = $(this).serialize();

			$.post('process.php', recordData, function(myRecordData) {
            $('#message').html(myRecordData);

           });
        });
          });



</script>
</body>
</html>