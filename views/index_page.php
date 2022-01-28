<h2>All articles</h2>
<a href="<?=Route::url('index','create')?>">Create new article</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
    <?php if (count($articles)>0):?>
        <?php foreach ($articles as $id => $article):?>
            <tr>
                <td><?= $id?></td>
                <td><?= $article['title']?></td>
                <td>
                    <form method="post" action="<?=Route::url('index','delete')?>">
                        <input type="hidden" name="id" value="<?= $id?>"/>
                        <input type="submit" value="Удалить"/>
                    </form>
                </td>
                <td>
                    <form method="post" action="<?=Route::url('index','edit')?>">
                        <input type="hidden" name="id" value="<?= $id?>"/>
                        <input type="hidden" name="title" value="<?=$article['title']?>"/>
                        <input type="submit" value="Изменить"/>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
    <?php endif;?>
    </tbody>
</table>