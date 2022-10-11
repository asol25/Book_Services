<?php
$daoAuthors = new \app\src\models\Authors();
$dataAuthors = $daoAuthors->getAuthors();
$output_authors = null;

while ($row = $dataAuthors->fetch()) {
    # code...
    $output_authors .= " <tr>
    <td>{$row["AUTHOR_ID"]}</td>
    <td>{$row["name"]}</td>
    </tr>";
}
echo "
<table>
    <tr>
        <th>Name</th>
        <th>Authors</th>
    </tr>
    $output_authors
</table>";
