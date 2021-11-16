<?php
	// Just to rename the screenshots to a number, and convert them to PNG.
	// Originally made this just to use and delete but saving in case
	// we dump a bunch more and CBA to manually rename them to numbers
	
	$numba = -1; 

	foreach (new DirectoryIterator('./screens/') as $file) {
		// skip . and .. ; this was a royal pain in the ass to diagnose
		if ($file->isDot()) continue;
		$numba++;
		// png? jpg?
		$format = pathinfo($file->getFilename(), PATHINFO_EXTENSION);
		if ($format == 'png') {
			rename('./screens/'.$file->getFilename(), './screens/'.$numba.'.png');
		} else {
			imagepng(imagecreatefromstring(file_get_contents('./screens/'.$file->getFilename())), './screens/'.$numba.'.png', 5);
			unlink('./screens/'.$file->getFilename());
		}
	}

	echo 'Biggest number is '.$numba;

?>