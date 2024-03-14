
document.getElementById('glass-pane').addEventListener('click', function() {
  var room = document.getElementById('room');
  var soundtrack = document.getElementById('soundtrack');

  // Make the room renderable but still fully transparent
  room.style.display = 'flex';
  // Allow a reflow/repaint cycle before starting the opacity transition
  setTimeout(() => {
    room.classList.add('show');
  }, 10); // This delay could be very short

  // Proceed with the audio fade-in as previously described
  soundtrack.volume = 0;
  soundtrack.play();
  var volume = 0;
  var fadeAudioIn = setInterval(function() {
    if (volume < 0.1) {
      volume += 0.01;
      soundtrack.volume = volume;
    } else {
      clearInterval(fadeAudioIn);
    }
  }, 200);
});

document.getElementById('room').addEventListener('click', function() {
  var room = this;
  var soundtrack = document.getElementById('soundtrack');

  // Start the fade-out
  room.classList.remove('show');

  // Fade the audio out
  var fadeAudioOut = setInterval(function() {
    if (soundtrack.volume > 0.1) {
      soundtrack.volume -= 0.01;
    } else {
      soundtrack.pause();
      soundtrack.volume = 0;
      clearInterval(fadeAudioOut);
    }
  }, 200);

  // Wait for the opacity transition to finish before setting display to none
  room.addEventListener('transitionend', function handler() {
    room.style.display = 'none';
    room.removeEventListener('transitionend', handler); // Clean up the listener
  });
});


document.addEventListener('DOMContentLoaded', function () {
    // Select all buttons within the .subsections container
    const buttons = document.querySelectorAll('.subsections button');

    function toggleSection() {
        // Get the id of the clicked button
        const sectionId = this.id;

        // Select all section bodies
        const allBodies = document.querySelectorAll('.subsection-body');
        let isSectionOpen = false;

        // Loop through all section bodies
        allBodies.forEach(body => {
            if (body.id === sectionId) {
                // Toggle the display of the current body and check if it's open
                body.style.display = body.style.display === 'block' ? 'none' : 'block';
                isSectionOpen = body.style.display === 'block';
            } else {
                body.style.display = 'none';
            }
        });

        // Remove active class from all buttons and add to the clicked one if the section is open
        buttons.forEach(button => {
            button.classList.remove('active');
        });

        if (isSectionOpen) {
            this.classList.add('active');
        }
    }

    // Add click event listener to each button
    buttons.forEach(button => {
        button.addEventListener('click', toggleSection);
    });
});







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
