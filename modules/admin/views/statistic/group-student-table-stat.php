
<?php
use yii\helpers\Url;

echo '<div class="col-lg-3"><table class="table table-bordered table-striped">
<thead>
	<tr>
		<th>Группы</th>
	</tr>
</thead>';
foreach ($group as $key => $value)
	{
		echo "<tr>";
		$url = Url::toRoute(['statistic/group-student-table', 'id' => $key]);
		echo "<td>".'<a href="'.$url.'">'.$value.'</a><br>'."</td></tr>";
	}
	echo '</table>
	</div>';

echo '<div class="col-lg-3"><table class="table table-bordered table-striped">
  <thead>
    <tr>
		  <th>#</th>
      <th>Студенты</th>
    </tr>
  </thead>';
	$t=$id;
	$i = 0;
  foreach ($student as $value){
	$i++;
  echo "<tr>";
  echo    "<th>$i</th>";
  echo    "<td>
	           <a href=\"".Url::toRoute(['statistic/group-student-table-stat', 'id' => $t,'ids' => $value->id])."\">".$value->fio."</a>";
	echo    "</td>
	     </tr>";
}
echo '</table><br />';
echo '</div>';
?>

<div class="col-lg-5" style="position: relative;float:left; margin-left:10px;">
<h1 style="margin-top:0px;"><?= $studentstat->fio ?></h1>
<h3><?= 'Общая посещаемость - </br>'.$studentstat->total ?></h3>
<?php foreach($studentstat->subjects as $subject1) : ?>
	<?=
	$subject1->subject;
    echo ' '.$studentstat->totalSubject($subject1['id']);
	?><br />
<?php endforeach; ?>
</div>
