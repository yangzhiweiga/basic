<form action="" method="get">
    <input type="text" value="<?php echo $keyword ?>" name="keyword">
    <input type="submit" value="搜索">
</form>

<p><a href="/item/manage">新建</a></p>

<table>
    <tr>
        <th>ID</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book['book_id'] ?></td>
            <td><?php echo $book['book_name'] ?></td>
            <td>
                <a href="/item/manage/<?php echo $book['book_id'] ?>">编辑</a>
                <a href="/item/delete/<?php echo $book['book_id'] ?>">删除</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>