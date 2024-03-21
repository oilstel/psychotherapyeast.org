<?php snippet('meta') ?>

<main <?= $site->showBanner()->bool() ? 'class="banner-active"' : ''; ?>>

    <!-- Header -->
    <?php snippet('header') ?>

    <!-- Info -->
    <?php snippet('info') ?>

    <aside>
        <div id="about">
            <?= $site->intro()->kt() ?>
        </div>
        <?php if($site->quickInfo()->isNotEmpty()): ?>
            <div id="quick-contact">
                <?= $site->quickInfo()->kt() ?>
            </div>
        <?php endif; ?>
        <?php foreach ($site->sections()->toStructure() as $section): ?>
            <details <?= $section->isOpen()->toBool() ? 'open' : '' ?>>
                <summary><?= $section->sectionTitle()->html() ?></summary>
                <div class="inner">
                    <?= $section->sectionBody()->kirbytext() ?>

                    <!-- Sub-sections -->
                    <?php if($section->subSections()->isNotEmpty()): ?>
                        <div class="subsections">
                            <div class="subsection-buttons">
                                <?php foreach ($section->subSections()->toStructure() as $subSection): ?>
                                    <style>
                                        button#<?= $subSection->subSectionTitle()->slug() ?>:hover, button#<?= $subSection->subSectionTitle()->slug() ?>.active, .subsection-body#<?= $subSection->subSectionTitle()->slug() ?> {
                                            background-color: <?= $subSection->subSectionColor()->or('#e4e4e4') ?>;
                                        }
                                    </style>
                                    <button style="color: <?= $subSection->subSectionColor()->or('#e4e4e4') ?>" id="<?= $subSection->subSectionTitle()->slug() ?>">
                                        <?php if($icon = $subSection->subSectionIcon()->toFiles()->first()): ?>
                                            <img src="<?= $icon->url() ?>" alt="<?= $subSection->subSectionTitle()->html() ?>">
                                        <?php endif ?>
                                        <?= $subSection->subSectionTitle()->html() ?>
                                    </button>
                                <?php endforeach ?>
                            </div>
                            <?php foreach ($section->subSections()->toStructure() as $subSection): ?>
                                <div class="subsection-body" id="<?= $subSection->subSectionTitle()->slug() ?>" style="display: none;">
                                    <?= $subSection->subSectionBody()->kirbytext() ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                </div>
            </details>
        <?php endforeach ?>
    </aside>

    <!-- Banner -->
    <?php snippet('banner') ?>

</main>

<!-- Team member bios -->
<?php snippet('team') ?>

<!-- Window -->
<?php snippet('window') ?>

<!-- Footer -->
<?php snippet('footer') ?>