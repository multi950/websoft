<HEAD>
    <base href="/home/OneDrive/Dokument/Webdevelopment/Git/websoft/work/">
    <link rel="stylesheet" href="report/css/crud-style.css">
</HEAD>

<?php
require "config.php";
require "SQL.php";

$db = connectDatabase($dsn);

$sql = "SELECT * FROM tech";
$stmt = $db->prepare($sql);
$stmt->execute();
$res1 = $stmt->fetchAll();
//var_dump($res1);
?>
<?php 
    include (dirname(__DIR__, 2) . '\report\views\menu.php');?>
<div class="content">
    <?php if ($res1 ?? null) : ?>
    <fieldset>
        <legend>Read</legend>
        <table>
            <tr>
                <th>Id</th>
                <th>Label</th>
                <th>Type</th>
            </tr>

            <?php foreach ($res1 as $row) : ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["label"] ?></td>
                <td><?= $row["type"] ?></td>
                <td><a href="php/database/update.php?item=<?= $row["id"] ?>"><button type="button"
                            href="">update</button></a></td>
                <td><a href="php/database/delete.php?item=<?= $row["id"] ?>"><button type="button"
                            href="">delete</button></a></td>
            </tr>
            <?php endforeach; ?>

        </table>
        <a href="php/database/create.php"><button type="button" href="">create</button></a>

        <?php endif; ?>
    </fieldset>
</div>
<footer>
    <?php include dirname(__DIR__, 2) . '\report\views\footer.html';?>
</footer>