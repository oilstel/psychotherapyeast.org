<!-- For mobile -->
<div id="contact" style="display: none;">
    <h3>Contact</h3>

    <p>
        <span style="opacity: .4; margin-right: 4px;">T</span> <?= $site->contactPhone()->html() ?><br>
        <span style="opacity: .4; margin-right: 4px;">E</span> <?= $site->contactEmail()->html() ?>
    </p>
</div>

<div id="team" style="display: none;">
    <h3>Clinical team</h3>
    <ul>
        <?php foreach ($site->team()->toStructure() as $member): ?>
            <?php if ($member->pageActive()->bool()): ?>
                <li><button data-member="<?= $member->name()->slug() ?>"><span><?= $member->name()->html() ?></span></button></li>
            <?php else: ?>
                <li class="name-without-page"><?= $member->name()->html() ?></li>
            <?php endif; ?>
        <?php endforeach ?>
    </ul>
</div>

<!-- For desktop -->
<div id="corner-info">
    <div id="contact">
        <h3>Contact</h3>

        <p>
            <span style="opacity: .4; margin-right: 4px;">T</span> <?= $site->contactPhone()->html() ?><br>
            <span style="opacity: .4; margin-right: 4px;">E</span> <?= $site->contactEmail()->html() ?>
        </p>
    </div>

    <div id="team">
        <h3>Clinical team</h3>
        <ul>
            <?php foreach ($site->team()->toStructure() as $member): ?>
                <?php if ($member->pageActive()->bool()): ?>
                    <li><button data-member="<?= $member->name()->slug() ?>"><span><?= $member->name()->html() ?></span></button></li>
                <?php else: ?>
                    <li class="name-without-page"><?= $member->name()->html() ?></li>
                <?php endif; ?>
            <?php endforeach ?>
        </ul>
    </div>
</div>