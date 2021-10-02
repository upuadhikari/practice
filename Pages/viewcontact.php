<?php 

// require('../server.php');
$server=mysqli_connect("localhost","root","","ajaxpractice");


$get="SELECT * from practicetable";
$res=mysqli_query($server, $get);

 ?>
<style type="text/css">
	table tr td span:hover{opacity: 1;}
</style>
 <table class="table table-responsive table-striped">
 	<tr>
 		<th>SN</th>
 		<th>Full Name</th>
 		<th>Address</th>
 		<th>Phone No.</th>
 		<th>Email Add.</th>
 		<th>Edit</th>
 	</tr>

 	<!-- Feteching all data -->
 	<?php 
 		if(!$res){
 			echo "Error in selecting!";
 		}
 		else{
 			if(!empty($res)){
 				$id=1;
	 			while($show=mysqli_fetch_array($res)){
	 				
	 				?>
	 					<tr id="cdata">
	 						<td><?php echo $id; ?> <input type="text" name="" value="<?php echo $show['id']; ?> " class="id_is" hidden> </td>
	 						<td>
	 							<?php echo $show['fullname']; ?>
	 								
	 						</td>
	 						<td><?php echo $show['description']; ?></td>
	 						<td><?php echo $show['phone']; ?></td>
	 						<td><?php echo $show['email']; ?></td>
	 						<td><span style="color:rgba(255,0,0,.7);cursor: pointer;">
	 							<i class="far fa-trash-alt" id="delete"></i>
	 							</span> 
	 							<span style="color: rgba(0,0,255,.7);cursor: pointer;padding-left: 5px;">
	 								<i class="far fa-edit" id="edit"></i>
	 							</span></td>
	 							

	 					</tr>
	 				<?php
	 				$id=$id + 1;
	 			}
	 		}
	 		else{
	 			echo "Nothing to show";
	 		}
 		}
 	 ?>
 </table>