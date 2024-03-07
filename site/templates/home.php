<?php snippet('header') ?>

<main>
    <div id="content">
        <header>
            <div id="glass-pane" style="background-image: url('<?php if ($image = $site->headerImage()->toFile()) { echo $image->url(); } ?>'); background-size: cover;"></div>
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
                        <button data-member="<?= $member->name()->slug() ?>"><?= $member->name()->html() ?></button><br>
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

<!-- Team member bios -->
<div id="members" style="display: none;">
    <div id="inner">
        <?php foreach ($site->team()->toStructure() as $member): ?>
            <div class="member" id="<?= $member->name()->slug() ?>">
                <button class="close" data-member="<?= $member->name()->slug() ?>">close bio</button>
                <h3><?= $member->name()->html() ?></h3>
                <div class="content">
                    <?php if ($image = $member->teamMemberImage()->toFile()): ?>
                        <img src="<?= $image->url() ?>" alt="Team Member Image">
                    <?php endif ?>
                    <div class="bio">
                        <?= $member->about()->kt() ?>
                    </div>
                    <?php if ($member->isActive()->bool()): ?>
                        <div class="status">Active Member</div>
                    <?php else: ?>
                        <div class="status">Inactive Member</div>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var memberButtons = document.querySelectorAll('#team button[data-member]');
        var closeButton = document.querySelectorAll('.member .close');
        var membersDiv = document.getElementById('members');

        memberButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var memberId = button.getAttribute('data-member');
                document.querySelectorAll('.member').forEach(function(member) {
                    if (member.id === memberId) {
                        membersDiv.style.display = 'block';
                        member.style.display = 'block';
                    } else {
                        member.style.display = 'none';
                    }
                });
            });
        });

        closeButton.forEach(function(button) {
            button.addEventListener('click', function() {
                var memberId = button.getAttribute('data-member');
                document.getElementById(memberId).style.display = 'none';
                membersDiv.style.display = 'none'; // Optionally hide the entire container
            });
        });
    });
</script>


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