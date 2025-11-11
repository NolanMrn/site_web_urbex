window.onload = function() {
  const overlay = document.querySelector('.photo_acc article');
  const header = document.querySelector('header');

  if (overlay) {
    overlay.style.opacity = 1;
    overlay.style.transform = 'scale(1)'; 
    setTimeout(() => {
        header.style.opacity = 1;
        header.style.transform = 'translateY(0)';
    }, 800);
  } else {
    setTimeout(() => {
        header.style.opacity = 1;
        header.style.transform = 'translateY(0)';
    }, 400);
  }

}

const animSections = document.querySelectorAll('.anim_section');

function showSections() {
  animSections.forEach(section => {
    const rect = section.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
      section.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', showSections);
window.addEventListener('load', showSections);