<?php
	echo '<div class="col-lg-4"><table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Преподаватели</th>
    </tr>
  </thead>';
foreach ($teach as $value){
 echo "<tr>";
  echo "<td>".$value."</td>";
}
echo '</table></div>'
?>
