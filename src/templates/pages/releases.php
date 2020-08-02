<?php
use atlas\Components;
$components = new Components();
?>
<main>
    <div class="grid">
        <?= $components->renderReleases() ?>
        <form method="post">
            <input style="border-style: none; margin-top: 100px;" class="button" type="submit" name="next_page"
                   id="next_page" value="Load more..."/>
        </form>
</main>