<?php snippet('header') ?>

<main>
        <div id="content">
            <header>
                <div id="glass-pane" style="background-image: url('images/ripples.jpg'); background-size: cover;"></div>
                <!-- <div id="glass-pane"></div> -->
                <br><br>
                <h1><?= $site->title()->html() ?></h1>
            </header>
            <div id="info">
                <div id="contact">
                    <h3>Contact</h3>

                    <p>
                        <span style="opacity: .4; margin-right: 4px;">T</span> <?= $site->contactPhone()->html() ?><br>
                        <span style="opacity: .4; margin-right: 4px;">E</span> <?= $site->contactEmail()->html() ?>
                    </p>
                </div>
    
                <div id="team">
                    <h3>Clinical team</h3>

                    <p>
                        <?php foreach ($site->team()->toStructure() as $member): ?>
                            <?= $member->name()->html() ?><br>
                        <?php endforeach ?>
                    </p>
                </div>
            </div>
        </div>

        <aside>
            <div id="about">
                <?= $site->intro()->kt() ?>
            </div>
            <?php foreach ($site->sections()->toStructure() as $section): ?>
                <details>
                    <summary><?= $section->sectionTitle()->html() ?></summary>
                    <div class="inner">
                        <?= $section->sectionBody()->kirbytext() ?>
                    </div>
                </details>
            <?php endforeach ?>
        </aside>
        
    </main>

    <script>
        var glassPane = document.getElementById('glass-pane');

        // Create droplets
        for(var i = 0; i < 10; i++) {
            var droplet = document.createElement('div');
            droplet.className = 'droplet';
            droplet.style.left = Math.random() * 200 + 'px';  // Random horizontal position
            droplet.style.top = Math.random() * 200 + 'px';   // Random vertical position
            droplet.style.height = (Math.random() * 10 + 10) + 'px';  // Random height between 10px and 30px

            // Randomly apply blur filter to approximately half of the droplets
            // if (Math.random() < 0.5) {
            //     droplet.style.backgroundColor = '#f0f0f0';
            //     droplet.style.border = 'none';
            //     // droplet.style.filter = 'blur(10px)';
            // }

            glassPane.appendChild(droplet);
        }
    </script>

<?php snippet('footer') ?>