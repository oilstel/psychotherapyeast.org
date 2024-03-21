<?php snippet('meta') ?>

<main <?= $site->showBanner()->bool() ? 'class="banner-active"' : ''; ?>>

    <!-- Header -->
    <?php snippet('header') ?>

    <!-- Info -->
    <?php snippet('info') ?>

    <aside>
        <?php
            $breadcrumbs = $site->breadcrumb();
            $lastIndex = $breadcrumbs->count();
            $index = 1;
        ?>

        <nav id="breadcrumb">
            <?php foreach($breadcrumbs as $crumb): ?>
                <a href="<?= $crumb->url() ?>" <?= e($crumb->isActive(), 'class="active"') ?>><?= html($crumb->title()) ?></a> <?php if($index < $lastIndex): ?>/<?php endif; ?>
                <?php $index++; ?>
            <?php endforeach ?>
        </nav>

        <h2><?= $page->title() ?></h2>

        <div id="page-content">
            <?= $page->pageContent()->kt() ?>
        </div>

        <?php foreach ($page->sections()->toStructure() as $section): ?>
            <details <?= $section->isOpen()->toBool() ? 'open' : '' ?>>
                <summary><?= $section->sectionTitle()->html() ?></summary>
                <div class="inner">
                    <?= $section->sectionBody()->kirbytext() ?>
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