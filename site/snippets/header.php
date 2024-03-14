<header>
    <div id="glass-pane" style="background-image: url('<?php if ($image = $site->headerImage()->toFile()) { echo $image->resize(350)->url(); } ?>'); background-size: cover;"></div>
    <br><br>
    <h1><?= $site->title()->html() ?></h1>
</header>