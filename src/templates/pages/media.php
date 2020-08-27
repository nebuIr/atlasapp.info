<main>
    <div class="grid">

        <?php
        $directory = __DIR__ . '/../../../public/assets/img/media/';
        chdir($directory);
        $files = glob('*.{jpg,png}', GLOB_BRACE);

        foreach($files as $file) {
            echo "<div class='card card-mobile-screen'>
            <img alt='screenshot' class='card-img-full' src='/assets/img/media/$file'/>
            </div>";
        }
        ?>

    </div>
</main>
