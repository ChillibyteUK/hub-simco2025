// Add your custom JS here.
AOS.init({
  easing: 'ease-out',
  once: true,
  duration: 600,
});

// (function() {
//   // Hide header on scroll
//   var doc = document.documentElement;
//   var w = window;

//   var prevScroll = w.scrollY || doc.scrollTop;
//   var curScroll;
//   var direction = 0;
//   var prevDirection = 0;

//   var header = document.getElementById('wrapper-navbar');

//   var checkScroll = function() {
//       // Find the direction of scroll (0 - initial, 1 - up, 2 - down)
//       curScroll = w.scrollY || doc.scrollTop;
//       if (curScroll > prevScroll) {
//           // Scrolled down
//           direction = 2;
//       } else if (curScroll < prevScroll) {
//           // Scrolled up
//           direction = 1;
//       }

//       if (direction !== prevDirection) {
//           toggleHeader(direction, curScroll);
//       }

//       prevScroll = curScroll;
//   };

//   var toggleHeader = function(direction, curScroll) {
//       if (direction === 2 && curScroll > 125) {
//           // Replace 52 with the height of your header in px
//           if (!document.getElementById('navbar').classList.contains('show')) {
//               header.classList.add('hide');
//               prevDirection = direction;
//           }
//       } else if (direction === 1) {
//           header.classList.remove('hide');
//           prevDirection = direction;
//       }
//   };

//   window.addEventListener('scroll', checkScroll);
// }
// )();


/*

  // Header background
  document.addEventListener('scroll', function() {
      var nav = document.getElementById('navbar');
    //   var primaryNav = document.getElementById('primaryNav');
    //   if (!primaryNav.classList.contains('show')) {
    //       nav.classList.toggle('scrolled', window.scrollY > nav.offsetHeight);
    //   }
      document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
          dropdown.classList.remove('show');
      });
      document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
          toggle.classList.remove('show');
          toggle.blur();
      });
  });

*/


document.querySelectorAll('.hub-team__grid').forEach(grid => {
    let openDetail = null;
    let openCard = null;

    function closeDetail(animated = true) {
        if (!openDetail) return;

        if (animated) {
            openDetail.classList.add('fade-out');
            openDetail.addEventListener('animationend', () => {
                if (openDetail) openDetail.remove();
                openDetail = null;
            }, { once: true });
        } else {
            openDetail.remove();
            openDetail = null;
        }

        if (openCard) openCard.classList.remove('active');
        if (openCard) openCard.setAttribute('aria-expanded', 'false');
        grid.classList.remove('has-detail');
        openCard = null;
    }

    grid.addEventListener('click', e => {
        const card = e.target.closest('.hub-team__card');
        if (!card) return;

        // toggle off if clicking same card again
        if (openCard === card) {
            closeDetail();
            return;
        }

        // clear previous detail
        closeDetail(false);

        // Find the detail-content sibling (now outside the button)
        const detailId = card.getAttribute('aria-controls');
        const hidden = detailId ? document.getElementById(detailId) : card.nextElementSibling;
        
        if (!hidden || !hidden.classList.contains('detail-content')) {
            console.error('detail-content not found');
            return;
        }
        
        const detail = document.createElement('div');
        detail.className = 'detail';
        detail.innerHTML = hidden.innerHTML;

        // insert after the correct row
        const cards = Array.from(grid.children).filter(el => el.classList.contains('hub-team__card'));
        const index = cards.indexOf(card);
        const cols = getComputedStyle(grid).gridTemplateColumns.split(' ').length;
        const rowEnd = Math.ceil((index + 1) / cols) * cols - 1;
        const insertAfter = cards[Math.min(rowEnd, cards.length - 1)];
        
        // Find the detail-content element after insertAfter card
        let insertPoint = insertAfter;
        if (insertAfter.nextElementSibling && insertAfter.nextElementSibling.classList.contains('detail-content')) {
            insertPoint = insertAfter.nextElementSibling;
        }
        
        insertPoint.insertAdjacentElement('afterend', detail);

        // mark active states
        card.classList.add('active');
        card.setAttribute('aria-expanded', 'true');
        grid.classList.add('has-detail');

        openDetail = detail;
        openCard = card;
    });

    // Keyboard support for team cards
    grid.addEventListener('keydown', e => {
        const card = e.target.closest('.hub-team__card');
        if (!card) return;
        
        // Enter or Space to toggle
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            card.click();
        }
        // Escape to close
        else if (e.key === 'Escape' && openCard === card) {
            e.preventDefault();
            closeDetail();
        }
    });

    // click outside to close
    document.addEventListener('click', e => {
        if (openDetail && !grid.contains(e.target)) {
            closeDetail();
        }
    });

    // close detail on resize
    window.addEventListener('resize', () => {
        closeDetail(false);
    });
});

// Back to top button functionality
(function() {
    // Create the back to top button
    const backToTopBtn = document.createElement('button');
    backToTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.setAttribute('aria-label', 'Back to top');
    backToTopBtn.style.cssText = `
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: var(--col-light-gold);
        color: var(--col-simco-gold);
        border: none;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
    `;

    // Add hover effects
    backToTopBtn.addEventListener('mouseenter', () => {
        backToTopBtn.style.transform = 'translateY(-2px)';
        backToTopBtn.style.boxShadow = '0 6px 20px rgba(0,0,0,0.2)';
    });

    backToTopBtn.addEventListener('mouseleave', () => {
        backToTopBtn.style.transform = 'translateY(0)';
        backToTopBtn.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
    });

    // Add click handler to scroll to top
    backToTopBtn.addEventListener('click', () => {
        // Try to scroll to #top element first, fallback to top of page
        const topElement = document.getElementById('top');
        if (topElement) {
            topElement.scrollIntoView({ behavior: 'smooth' });
        } else {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    // Append to body
    document.body.appendChild(backToTopBtn);

    // Show/hide button based on scroll position
    function toggleBackToTop() {
        const scrolled = window.scrollY;
        const viewportHeight = window.innerHeight;
        
        if (scrolled > viewportHeight) {
            backToTopBtn.style.opacity = '1';
            backToTopBtn.style.visibility = 'visible';
        } else {
            backToTopBtn.style.opacity = '0';
            backToTopBtn.style.visibility = 'hidden';
        }
    }

    // Listen for scroll events
    window.addEventListener('scroll', toggleBackToTop);
    
    // Check initial scroll position
    toggleBackToTop();
})();