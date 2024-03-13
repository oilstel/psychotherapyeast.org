<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= css('assets/css/fonts.css?v=1.6') ?>
    <?= css('assets/css/global.css?v=1.6') ?>
    <?php
    if(page()->template() == 'home') {
        echo css('assets/css/home.css?v=1.6');
    }
    ?>
    <title><?= $site->title() ?></title>
    <link rel="icon" type="image/png" href="/assets/images/favicon.png" />
    <style>
        <?php
            // Get the text color
            $textColor = $site->textColor()->value();
            // Default to black if not set
            if (empty($textColor)) {
                $textColor = '#541313';
            }

            // Get the background color
            $backgroundColor = $site->backgroundColor()->value();
            // Default to white if not set
            if (empty($backgroundColor)) {
                $backgroundColor = '#e2e1d9';
            }

            if($windowImage = $site->headerImage()->toFiles()->first()) {
                $windowImage = $windowImage->url();
            }
        ?>

        h1, h2, h3, p, button, #team a, li, summary, a {
            color: <?= $textColor; ?> !important;
        }
        #glass-pane, #glass-pane .droplet {
            border-color: <?= $textColor; ?>;
        }
        html, body, #members #inner {
            background-color: <?= $backgroundColor; ?>;
        }
        #room {
            background-color: <?= $backgroundColor; ?>;
        }
        #window {
            background-image: url('<?= $windowImage; ?>');
            border-color: <?= $textColor; ?>;
        }

    </style>
</head>

<body id="<?= $page->parent() ? $page->parent()->slug() : $page->slug() ?>">