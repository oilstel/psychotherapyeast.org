<?php snippet('header') ?>

<main <?= $site->showBanner()->bool() ? 'class="banner-active"' : ''; ?>>
    <header>
        <div id="glass-pane" style="background-image: url('<?php if ($image = $site->headerImage()->toFile()) { echo $image->url(); } ?>'); background-size: cover;"></div>
        <br><br>
        <h1><?= $site->title()->html() ?></h1>
    </header>

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
            <details>
                <summary><?= $section->sectionTitle()->html() ?></summary>
                <div class="inner">
                    <?= $section->sectionBody()->kirbytext() ?>
                </div>
            </details>
        <?php endforeach ?>
    </aside>

    <?php if($site->showBanner()->bool()): ?>
        <div id="banner">
            <?= $site->announcementBanner()->kirbytext() ?>
        </div>
    <?php endif; ?>

</main>

<!-- Team member bios -->
<div id="members" style="display: none;">
    <div id="inner">
        <?php foreach ($site->team()->toStructure() as $member): ?>
            <div class="member" id="<?= $member->name()->slug() ?>">
                <div class="top">
                    <button class="close" data-member="<?= $member->name()->slug() ?>">close <?= $member->name()->lower() ?>'s bio</button>
                </div>
                <div class="content">
                    <h3><?= $member->name()->html() ?></h3>
                    <?php if ($image = $member->teamMemberImage()->toFile()): ?>
                        <img src="<?= $image->url() ?>" alt="Team Member Image">
                    <?php endif ?>
                    <div class="bio">
                        <?= $member->about()->kt() ?>
                    </div>
                    <!-- Professional Logos -->
                    <?php
                    // Assuming 'professionalLogos' is a field that returns a collection of file objects
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



<script>
document.addEventListener("DOMContentLoaded", function() {
    var membersDiv = document.getElementById('members');
    var memberDivs = document.querySelectorAll('.member');

    // Function to hide all members and the container
    function hideMembers() {
        membersDiv.style.display = 'none';
        memberDivs.forEach(function(member) {
            member.style.display = 'none';
        });
        document.body.style.overflow = ''; // Re-enable scrolling on the body
    }

    // Event listener for #members to close on direct clicks
    membersDiv.addEventListener('click', function(event) {
        // Check if the click is directly on #members (not on its children)
        if (event.target === membersDiv) {
            hideMembers();
        }
    });

    // Handle opening of member details
    document.querySelectorAll('#team button[data-member]').forEach(function(button) {
        button.addEventListener('click', function() {
            var memberId = button.getAttribute('data-member');
            memberDivs.forEach(function(member) {
                if (member.id === memberId) {
                    membersDiv.style.display = 'block';
                    member.style.display = 'block';
                    document.body.style.overflow = 'hidden'; // Disable scrolling on the body
                } else {
                    member.style.display = 'none';
                }
            });
        });
    });

    // Optional: Close button inside member div
    document.querySelectorAll('.member .close').forEach(function(button) {
        button.addEventListener('click', function() {
            hideMembers();
        });
    });

    // Close #members when Escape key is pressed
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            hideMembers();
        }
    });


    // Get the actual heights of #contact and #team
    const contactHeight = document.querySelector('#contact').offsetHeight;
    const teamHeight = document.querySelector('#team').offsetHeight;
    
    // Construct the grid-template-rows value
    const gridTemplateRowsValue = `1fr 1fr 1fr 1fr ${contactHeight}px ${teamHeight}px`;
    
    // Set the grid-template-rows style of <main>
    document.querySelector('main').style.gridTemplateRows = gridTemplateRowsValue;
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