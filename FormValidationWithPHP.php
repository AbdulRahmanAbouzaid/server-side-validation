<!DOCTYPE html>
<html>
<head>
	<title>Server-Side Validation</title>
</head>

<?php
	$error = array('name'=>false,'mail'=>false,'time'=>false,'classes'=>false,'gender'=>false);
	$agree = false;
	$checked = "";
	$isMale ="";
	$isFemale = "";
	$gender = "";
	$data = "";

	if(isset($_GET['submit'])){

		$name = $_GET['name'];
		$mail = $_GET['mail'];
		$time = $_GET['time'];
		$classes = $_GET['classes'];

		if(empty($name)){
			$error['name'] = true;
		}
		if(empty($mail)){
			$error['mail'] = true;
		}
		if(empty($time)){
			$error['time'] = true;
		}
		if(empty($classes)){
			$error['classes'] = true;
		}
		if(!isset($_GET['agree'])){
			$agree= true;
		}
		if(isset($_GET['gender']) && $_GET['gender']=="male"){
			$isMale = "checked";
			$gender = "male";
		}
		else if(isset($_GET['gender']) && $_GET['gender']=="female"){
			$isFemale = "checked";
			$gender = "female";
		}else{
			$error['gender'] = true;
		}
		if(!$error['name'] && !$error['mail'] && !$error['time'] && !$error['classes'] && !$error['gender'] && !$agree) { 
			$data = "<h1> Your Data Is : </h1>";
			$data .= "<ul>";
			$data .="<li> Name : {$name} </li>";
			$data .= "<li> E-mail :{$mail} </li>";
			$data .= "<li> Time : {$time} </li>";
			$data .= "<li>Classes : { $classes }</li>";
			$data .= "<li> Gender :{$gender} </li>";
			$data .= "</ul>";
		}

	}else {
		$name = "";
		$mail = "";
		$time="";
		$classes = "";
	}

?>
<body>
	<?php 
		if($error['name'] || $error['mail'] || $error['time'] || $error['classes'] || $error['gender']){
			echo "<p style='color:red' >Feilds with * are Required </p>" ;
		}
		if($agree){
			echo "<p style='color:red' >You Must Agree Terms</p> ";
		}else if(!$agree){
			$checked = "checked";
		}
		
		
	?>
	
	<form action="#" method="GET">
		<table>
			<tr> 
				<td>Name </td>
				<td><input type="text" name="name" value=<?php echo $name; ?> >
					<span style="color: red"><?php if($error['name']){echo "*";} ?></span>
				</td>
			</tr>
			<tr> 
				<td>E-mail </td>
				<td><input type="text" name="mail" value=<?php echo $mail; ?> >
				 	<span style="color: red"><?php if($error['mail']){echo "*";} ?></span>
				 </td>
			</tr>
			<tr> 
				<td> Time </td>
				<td><input type="text" name="time" value=<?php echo $time ;?> >
				 	<span style="color: red"><?php if($error['time']){echo "*";} ?></span>
				 </td>
			</tr>

			<tr> 
				<td> Classes </td>
				<td> <textarea name="classes"><?php echo $classes ?></textarea>
					<span style="color: red"><?php if($error['classes']){echo "*";} ?></span>
				</td>
			</tr>
			
			<tr> 
				<td> Gender </td>
				<td> <input type="radio" name="gender" value="male" <?php echo $isMale; ?> > Male
					 <input type="radio" name="gender" value="female" <?php echo $isFemale; ?> > Female
					 <span style="color: red"><?php if($error['gender']){echo "*";} ?></span>
				 </td>
			</tr>
			<tr>
				<td>Select</td>
				<td>
					<select name="course">
						<option selected>android</option>
						<option>C#</option>
						<option>Java</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>Agree</td>
				<td> 
					<input type="checkbox" name="agree" <?php echo $checked?> >
					<span style="color: red"><?php if($agree){echo "*";} ?></span>
				</td>
			</tr>
		</table>
		<input type="submit" name="submit">
	</form>

	<?php echo $data ?>
</body>
</html>