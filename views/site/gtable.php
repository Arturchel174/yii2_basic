
  <?php
  use yii\helpers\Url;
  echo '<div class="col-lg-3"><table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Студенты</th>
    </tr>
  </thead>';
  foreach ($group as $key => $value)
    {
      echo "<tr>";
      $url = Url::toRoute(['site/gg', 'id' => $key]);
      echo "<td>".'<a href="'.$url.'">'.$value.'</a><br>'."</td></tr>";
    }
    echo '</table>
    </div>';
?>
