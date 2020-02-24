<HEAD>
    <base href="/home/OneDrive/Dokument/Webdevelopment/Git/websoft/work/">
    <link rel="stylesheet" href="report/css/crud-style.css">
</HEAD>



<?php

require "config.php";
require "SQL.php";

$search = $_GET["search"] ?? null;
$like = "%$search%";

if ($search) {
    $db = connectDatabase($dsn);
    $sql = <<<EOD
SELECT
    *
FROM tech
WHERE
    id = ?
    OR label LIKE ?
    OR type LIKE ?
;
EOD;
    $stmt = $db->prepare($sql);
    $stmt->execute([$search, $like, $like]);
    $res = $stmt->fetchAll();
}
?>

<?php 
    include (dirname(__DIR__, 2) . '\report\views\menu.php');?>
<div class="content">
    <fieldset>
        <legend>Search</legend>
        <form>
            <p>
                <label>Search word:
                    <input type="text" name="search" value="<?= $search ?>">
                </label>
            </p>
        </form>

        <?php if ($search) : ?>
        <table>
            <tr>
                <th>Id </th>
                <th>Label</th>
                <th>Type</th>
            </tr>

            <?php foreach ($res as $row) : ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["label"] ?></td>
                <td><?= $row["type"] ?></td>
            </tr>
            <?php endforeach; ?>

        </table>
        <?php endif; ?>
    </fieldset>
</div>
<footer>
    <?php include dirname(__DIR__, 2) . '\report\views\footer.html';?>
</footer>