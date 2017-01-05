<?php
		$errors = [];
		
		  // prüfen ob variable vorhanden sonst''
		$name = strip_tags ($_POST['name']) ?? '';

		// prüfen ob <> eingegeben wurden
		$name = htmlentities ($name);

		// löscht alle leerschläge
		$name = str_replace(" ", "", $name);

		$message = strip_tags ($_POST['note']) ?? '';
		$message = htmlentities ($message);

		$email = strip_tags ($_POST['email']) ?? '';
		$email = htmlentities ($email);
		
	
	  if ($name === '') {
        $errors[] = 'Bitte geben sie einen Namen ein.';
      }
      if ($message === '') {
        $errors[] = 'Bitte geben sie eine Nachricht ein';
      }
      if ($email === '') {
        $errors[] = 'Bitte geben sie eine E-Mail ein';
      }
	  
	  
			  if (count($errors > 0)) {
			echo ("<br>");
			echo ("<ul class = 'error'>");
			foreach ($errors as $value) {
			echo ("<li>$value</li>");}
			echo ("</ul>");
		  }