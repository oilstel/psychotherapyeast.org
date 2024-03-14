<?php if($site->showBanner()->bool()): ?>
    <div id="banner">
        <?= $site->announcementBanner()->kirbytext() ?>
    </div>
<?php endif; ?>