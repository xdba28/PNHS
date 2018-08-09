<?php
include_once('db_con_i.php');
include('../../php/_Func.php');
// session_start();
// include("func.php");
// include('session.php');


// $a = date('m', strtotime('-1 months'));
// echo $a;

// $date = '2017-02-22';
// $date2 = '2017-02-23';
// $a = strtotime($date);
// $b = strtotime($date2);

// echo $a  .'<br>'. $b;

$string = 'UTJDbENmU3hkb2xkWXNJN0RiRlUzdz09';

// $sy = '2017-2018';
// $sy_ex = explode("-", $sy);
// $sy1_old = $sy_ex[0] - 1;
// $sy2_old = $sy_ex[1] - 1;
// $sy7_imp = array($sy1_old, $sy2_old);
// $sy7 = implode("-", $sy7_imp);
// echo $sy7;

// $pass = 'denver28';
// $hash = '$2y$10$c9l0TlVHz3WDfSrVLgWPburriVnV/yW82Oo4WHQMUDv';

// if(password_verify($pass, $hash))
// {
// 	echo 'yey';
// }
// else
// {
// 	echo 'nay';
// }

echo pcrypt($string, "dcrypt");

?>

<html>
	<head>
		<link rel="icon" href="php.png">
		<style>
		* { box-sizing: border-box; }
		body {
		font: 16px Arial; 
		}
		.autocomplete {
		/*the container must be positioned relative:*/
		position: relative;
		display: inline-block;
		}
		input {
		border: 1px solid transparent;
		background-color: #f1f1f1;
		padding: 10px;
		font-size: 16px;
		}
		input[type=text] {
		background-color: #f1f1f1;
		width: 100%;
		}
		input[type=submit] {
		background-color: DodgerBlue;
		color: #fff;
		}
		.autocomplete-items {
		position: absolute;
		border: 1px solid #d4d4d4;
		border-bottom: none;
		border-top: none;
		z-index: 99;
		/*position the autocomplete items to be the same width as the container:*/
		top: 100%;
		left: 0;
		right: 0;
		}
		.autocomplete-items div {
		padding: 10px;
		cursor: pointer;
		background-color: #fff; 
		border-bottom: 1px solid #d4d4d4; 
		}
		.autocomplete-items div:hover {
		/*when hovering an item:*/
		background-color: #e9e9e9; 
		}
		.autocomplete-active {
		/*when navigating through the items using the arrow keys:*/
		background-color: DodgerBlue !important; 
		color: #ffffff; 
		}
		</style>
	</head>
	<body>
		<form autocomplete="off" action="test_post.php" method="post">
			<select id="cate" onchange="select(this.value)">
				<option value="lrn">LRN</option>
				<option value="first">First name</option>
				<option value="middle">Middle name</option>
				<option value="last">Last name</option>
			</select>
			<div class="autocomplete" style="width:300px;">
				<input type="text" id="myinput" name="post[id]" placeholder="LRN">
			</div>
			<!-- Name: <input type="text" name="post[data]"> -->
			<input type="submit" name="sbt">
		</form>
	</body>
	<script>
		var lrn = [<?php
			$get_student = $mysqli->query("SELECT lrn FROM sis_student");
			while($row = $get_student->fetch_array())
			{
				echo '"'.$row[0].'",';
			}
			?>""];

		function select(category)
		{
			document.getElementById('myinput').value = '';
			if(category == 'lrn')
			{
				var lrn = [<?php 
						$get_student = $mysqli->query("SELECT lrn FROM sis_student");
						while($row = $get_student->fetch_array())
						{
							echo '"'.$row[0].'",';
						}
						?>""];
			}
			else if(category == 'first')
			{
				var lrn = [<?php
						$get_student = $mysqli->query("SELECT stu_fname FROM sis_student");
						while($row = $get_student->fetch_array())
						{
							echo '"'.$row[0].'",';
						}
						?>""];
			}
			else if(category == 'middle')
			{
				var lrn = [<?php
						$get_student = $mysqli->query("SELECT stu_mname FROM sis_student");
						while($row = $get_student->fetch_array())
						{
							echo '"'.$row[0].'",';
						}
						?>""];
			}
			else if(category === 'last')
			{
				var lrn = [<?php
						$get_student = $mysqli->query("SELECT stu_lname FROM sis_student");
						while($row = $get_student->fetch_array())
						{
							echo '"'.$row[0].'",';
						}
						?>""];
			}
			autocomplete(document.getElementById("myinput"), lrn);
		}

			function autocomplete(inp, arr) 
			{
				/*the autocomplete function takes two arguments,
				the text field element and an array of possible autocompleted values:*/
				var currentFocus;
				/*execute a function when someone writes in the text field:*/
				inp.addEventListener("input", function(e)
				{
					var a, b, i, val = this.value;
					/*close any already open lists of autocompleted values*/
					closeAllLists();
					if(!val)
					{
						return false;
					}
					currentFocus = -1;
					/*create a DIV element that will contain the items (values):*/
					a = document.createElement("DIV");
					a.setAttribute("id", this.id + "autocomplete-list");
					a.setAttribute("class", "autocomplete-items");
					/*append the DIV element as a child of the autocomplete container:*/
					this.parentNode.appendChild(a);
					/*for each item in the array...*/
					for (i = 0; i < arr.length; i++) 
					{
						/*check if the item starts with the same letters as the text field value:*/
						if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) 
						{
						/*create a DIV element for each matching element:*/
						b = document.createElement("DIV");
						/*make the matching letters bold:*/
						b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
						b.innerHTML += arr[i].substr(val.length);
						/*insert a input field that will hold the current array item's value:*/
						b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
						/*execute a function when someone clicks on the item value (DIV element):*/
							b.addEventListener("click", function(e) 
							{
							/*insert the value for the autocomplete text field:*/
							inp.value = this.getElementsByTagName("input")[0].value;
							/*close the list of autocompleted values,
							(or any other open lists of autocompleted values:*/
							closeAllLists();
							});
						a.appendChild(b);
						}
					}
				});
			/*execute a function presses a key on the keyboard:*/
			inp.addEventListener("keydown", function(e) {
				var x = document.getElementById(this.id + "autocomplete-list");
				if (x) x = x.getElementsByTagName("div");
				if (e.keyCode == 40) {
					/*If the arrow DOWN key is pressed,
					increase the currentFocus variable:*/
					currentFocus++;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 38) { //up
					/*If the arrow UP key is pressed,
					decrease the currentFocus variable:*/
					currentFocus--;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 13) {
					/*If the ENTER key is pressed, prevent the form from being submitted,*/
					e.preventDefault();
					if (currentFocus > -1) {
					/*and simulate a click on the "active" item:*/
					if (x) x[currentFocus].click();
					}
				}
			});
			function addActive(x) {
				/*a function to classify an item as "active":*/
				if (!x) return false;
				/*start by removing the "active" class on all items:*/
				removeActive(x);
				if (currentFocus >= x.length) currentFocus = 0;
				if (currentFocus < 0) currentFocus = (x.length - 1);
				/*add class "autocomplete-active":*/
				x[currentFocus].classList.add("autocomplete-active");
			}
			function removeActive(x) {
				/*a function to remove the "active" class from all autocomplete items:*/
				for (var i = 0; i < x.length; i++) {
				x[i].classList.remove("autocomplete-active");
				}
			}
			function closeAllLists(elmnt) {
				/*close all autocomplete lists in the document,
				except the one passed as an argument:*/
				var x = document.getElementsByClassName("autocomplete-items");
				for (var i = 0; i < x.length; i++) {
				if (elmnt != x[i] && elmnt != inp) {
				x[i].parentNode.removeChild(x[i]);
				}
			}
			}
			/*execute a function when someone clicks in the document:*/
			document.addEventListener("click", function (e) {
				closeAllLists(e.target);
			});
			}

			autocomplete(document.getElementById("myinput"), lrn);
		</script>
</html>
<?php
// $elements = array_merge(range(1,10),[1]);

// print_r($elements) . '<br>';

// $time = microtime(true);
// accepted_solution($elements);
// echo 'Accepted solution: ', (microtime(true) - $time), 's', PHP_EOL;

// $time = microtime(true);
// most_voted_solution($elements);
// echo 'Most voted solution: ', (microtime(true) - $time), 's', PHP_EOL;

// $time = microtime(true);
// this_answer_solution($elements);
// echo 'This answer solution: ', (microtime(true) - $time), 's', PHP_EOL;

// function accepted_solution($array){
//  $dupe_array = array();
//  foreach($array as $val){
//   // sorry, but I had to add below line to remove millions of notices
//   if(!isset($dupe_array[$val])){$dupe_array[$val]=0;}
//   if(++$dupe_array[$val] > 1){
//    return true;
//   }
//  }
//  return false;
// }

// function most_voted_solution($array) {
//    return count($array) !== count(array_unique($array));
// }

// function this_answer_solution(array $input_array) {
//     return count($input_array) === count(array_flip($input_array));
// }

// echo count($elements) . '<br>';
// echo count(array_flip($elements)) . '<br>';
// ?>