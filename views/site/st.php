<?php

?>
<h1><?= $student->fio ?></h1>
<h2><?= $student->total ?></h2>
<?php foreach($student->subjects as $x) : ?>
	<?= $student->totalSubject($x['subject_id']) ?><br />
<?php endforeach; ?>