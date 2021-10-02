<!DOCTYPE html>
<html>
<head>
	<title>Index Page</title>

	<!-- Links -->
	<link rel="stylesheet" type="text/css" href="source/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/css/all.css">
	<link rel="stylesheet" type="text/css" href="source/webfonts/">



	<!-- Sources -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- 	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</head>
<body>

	<div class="container">
		<h3 class="mt-1 mb-2 text-center text-light bg-success">Checking Jquery in single Page!</h3>
		<div class="row">
			<div class="col-lg-4 col-md-4 bg-light">
				
				<?php include('Pages/contactform.php'); ?>


			</div>
			<div class="col-auto" id="viewcontact">
				<?php include 'Pages/viewcontact.php'; ?>
			</div>
		</div>

		<div class="row px-5">
			<div class="col-auto" id="editform">
				This is edit form
			</div>
			
		</div>
	</div>


<!-- ######## AJAX/Jquery Part ######## -->

<script type="text/javascript">
	
	$(document).ready(function(){

		// Insert Data

		$('#addnow').click(function(){

			

			var fullname = $('#fullname').val();
			var description= $('#description').val();
			var phone= $('#phone').val();
			var email=$('#email').val();

			$.ajax({

				url: "Pages/addnew.php",
				type: "POST",
				data:{name:fullname, description:description, phone:phone, email:email},
				success: function(){

					confirm("New Data is Added!!");
					location.reload();
				}

			});


					// alert(fullname + description + phone + email);

			
		});

		//Delete Data

		$(document).on('click','#delete',function(e){

			e.stopPropagation();
			e.stopImmediatePropagation();

			var id=$(this).closest('tr').find('.id_is').val();
			var sel = $(this).closest('tr');

			// alert(name);

			$.ajax({
				url: "Pages/delete.php",
				type: "POST",
				data:{id_is:id},
				success: function(){
					alert('Data is deleted!');
					// location.reload();
					sel.hide();

				}

				
			});


		});

		// Push id to Modal

		$(document).on('click','#edit',function(e){

			e.stopPropagation();
			e.stopImmediatePropagation();

			var id_is=$(this).closest('tr').find('.id_is').val();
		
			$.ajax({
				// url: url,
				type: "POST",
				data:{id:id_is},
				success: function(){

					$("#edit-form").modal("show");
					$("#jpt").val(id_is); //Inserting value to input id="jpt"

				}

				
			});


		});


		// Update Data

		$(document).on('click','#update',function(e){

			var id_is=$("#jpt").val();
			var fullname = $('#fullname').val();
			var description= $('#description').val();
			var phone= $('#phone').val();
			var email=$('#email').val();

			$.ajax({

				url: "Pages/update.php",
				type: "POST",
				data:{id:id_is,name:fullname, description:description, phone:phone, email:email},
				success: function(){

					confirm("Data is updated!!");
					location.reload();
				}

			});

		});
		

	});

</script>

<div class="modal fade" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="edit-formLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-formLabel">You are Editing <script type="text/javascript"> ;</script></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<!-- Form -->
        <form method="POST" id="cform">

					<!-- Fullname -->
					<div class="input-group mt-1">
						<label class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Full Name</span>
  </label>
						
						<input type="text" name="fullname" id="fullname" class="form-control">
					</div>

					<!-- description -->
					<div class="input-group mt-1">
						<label class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">T. description</span>
  </label>
						
						<input type="text" name="description" id="description" class="form-control">
					</div>

					<!-- Phone Number -->

					<div class="input-group mt-1">
						<label class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Phone No.</span>
  </label>
						
						<input type="phone" name="phone" id="phone" class="form-control">
					</div>

					<!-- Email description -->
					<div class="input-group mt-1">
						<label class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"> Email Add.</span>
  </label>
						
						<input type="email" name="email" id="email" class="form-control">

						<input type="text" name="" id="jpt" value="">
					</div>

					<!-- Buttons -->

					<div class="d-flex justify-content-end">
						<button type="button" class="btn btn-secondary mt-1" data-dismiss="modal">Close</button>

						<input type="reset" name="" id="cancel" class="btn-sm btn-danger text-center text-light mt-1 mr-2 ml-2" value="Cancel">

					<button  type="button" id="update" class="btn-sm btn-success text-center text-light mt-1">Add Now </button>
					</div>
					
					
				</form>
      </div>
        </div>
  </div>
</div>

</body>
</html>