<?php
$buah = ["Apel", "Jeruk", "Mangga", "Pisang", "Anggur"];
?>
<table border="1">
    <tr>
        <th>Nama Buah</th>
    </tr>
    <?php foreach ($buah as $nama) : ?>
    <tr>
        <td><?php echo $nama; ?></td>
    </tr>
    <?php endforeach; ?>
</table>