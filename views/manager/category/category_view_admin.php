<?php
$daoCategory = new \app\src\models\Category();
$dataCategory = $daoCategory->getAll();
$output_category = null;

while ($row = $dataCategory->fetch()) {
    # code...
    $output_category .= " <tr>
    <td>{$row["genres_ID"]}</td>
    <td>{$row["name"]}</td>
    </tr>";
}
echo "
<table>
    <tr>
        <th>ID</th>
        <th>Category</th>
    </tr>
    $output_category
</table>";
