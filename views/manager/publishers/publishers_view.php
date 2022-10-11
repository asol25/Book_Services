<?php
$daoPublisher = new \app\src\models\Publishers();
$dataPublisher = $daoPublisher->getPublishers();
$output_publishers = null;

while ($row = $dataPublisher->fetch()) {
    # code...
    $output_publishers .= " <tr>
    <td>{$row["publisher_id"]}</td>
    <td>{$row["name"]}</td>
    </tr>";
}
echo "
<table>
    <tr>
        <th>Name</th>
        <th>Publishers</th>
    </tr>
    $output_publishers
</table>";
