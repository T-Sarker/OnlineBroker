<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include '../classes/companyClass.php';
?>

<?php
	$ac = new AllCompany();
?>

<?php

	$searchValue = $_POST['name'];

	if (isset($searchValue) && $searchValue != null && !is_numeric($searchValue)) {
		
		$getSuggestion = $ac->getSearchedSuggestionFromDB($searchValue);

		if (isset($getSuggestion) && $getSuggestion!= false) {
			
			while ($suggest = $getSuggestion->fetch_assoc()) {
		?>
				<li><a href="?search=<?php echo $suggest['companyUid'] ?>"><?php echo $suggest['company'] ?></a></li>

		<?php
			}
		}elseif (isset($getSuggestion) && $getSuggestion!= true && empty($getSuggestion)) {
			echo '<div class="alert alert-danger" role="alert">
						  Nothing Matched !
						</div>';
		}
	}


?>