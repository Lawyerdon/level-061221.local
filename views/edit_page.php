<form action="<?=Route::url('index','save')?>" method="post">
    <label>Title
        <input type="text" name="title" value="<?= $title?>"/>
    </label>
    <input type="hidden" name="id" value="<?= $id?>"/>
    <input type="submit" value="Сохранить"/>
</form>
