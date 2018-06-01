<?php
use yii\helpers\Url;
	echo '<div class="col-lg-3"><table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Студенты</th>
    </tr>
  </thead>';
foreach ($student as $value){
 echo "<tr>";
  echo "<td><a href=\"".Url::toRoute(['site/st', 'id' => $value->id])."\">".$value->fio."</a></td>";
}
echo '</table></div>'
?>
