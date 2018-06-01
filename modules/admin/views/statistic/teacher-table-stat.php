<?php
use yii\helpers\Url;
echo '<div class="col-lg-3"><table class="table table-bordered table-striped">
<thead>
  <tr>
    <th>Предметы</th>
  </tr>
</thead>';
foreach ($teacher as $key => $value)
  {
    echo "<tr>";
    $url = Url::toRoute(['statistic/teacher-table-stat', 'ids' => $key]);
  echo "<td>".'<a href="'.$url.'">'.$value.'</a><br>'."</td></tr>";
  }
  echo '</table>
  </div>';
?>


<div class="col-lg-5" style="position: relative;float:left; margin-left:10px;">
<h1 style="margin-top:0px;"><?= $teacherstat->teacher ?></h1>
<h3><?= 'Общая посещаемость - '.$teacherstat->totalteacher ?></h3>
</div>
