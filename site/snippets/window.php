<?php if ($site->headerImage()->isNotEmpty()): ?>
    <div id="room">
        <div id="window">
            <?php $backgroundMusic = $site->backgroundMusic()->toFile(); ?>
            <?php if($backgroundMusic): ?>
                <audio src="<?= $backgroundMusic->url() ?>" loop id="soundtrack"></audio>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>