<!-- Team member bios -->
<div id="members" style="display: none;">
    <div id="inner">
        <?php foreach ($site->team()->toStructure() as $member): ?>
            <div class="member" id="<?= $member->name()->slug() ?>">
                <div class="top">
                    <button class="close" data-member="<?= $member->name()->slug() ?>">close <?= $member->name()->lower() ?>'s bio</button>
                </div>
                <div class="content">
                    <h2><?= $member->name()->html() ?></h2>
                    <?php if ($image = $member->teamMemberImage()->toFile()): ?>
                        <img src="<?= $image->url() ?>" alt="Team Member Image">
                    <?php endif ?>
                    <div class="bio">
                        <?= $member->about()->kt() ?>
                    </div>
                    <!-- Professional Logos -->
                    <?php
                    $logos = $member->professionalLogos()->toFiles();
                    if($logos->isNotEmpty()): ?>
                        <div class="professional-logos">
                            <?php foreach ($logos as $logo): ?>
                                <figure>
                                    <img src="<?= $logo->url() ?>" alt="<?= $member->name()->html() ?> Professional Logo">
                                </figure>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div> 
        <?php endforeach ?>
    </div>
</div>