import { gsap } from 'gsap';
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faEnvelope, faHeart } from '@fortawesome/free-solid-svg-icons';
import { faGithub, faLinkedin, faTwitter } from '@fortawesome/free-brands-svg-icons';
import SplitText from './split-text';

window.SplitText = SplitText;
window.gsap = gsap;

library.add(
    faEnvelope,
    faHeart,
    faGithub,
    faLinkedin,
    faTwitter
);

dom.watch();

document.addEventListener('DOMContentLoaded', () => {
    const h1 = document.querySelector('.main_heading');
    const h3 = document.querySelector('.main_subheading');
    const splitH1 = new SplitText(h1, { type: 'chars' });
    const splitH3 = new SplitText(h3, { type: 'chars' });
    
    // Animation using GSAP
    gsap.timeline({ defaults: { duration: 0.5, ease: 'power2.out' } })
        .to('.photo', { opacity: 1, duration: 0.6 })
        .to('.photo', { filter: "blur(0px) drop-shadow(8px 8px 8px #cccccc)", duration: 0.6 }, '-=0.4')

        .from(splitH1.chars, { opacity: 0, stagger: 0.02 }, '-=0.5')
        .from(splitH3.chars, { opacity: 0, stagger: 0.01 }, '-=0.3')
        
        .to("#about", { opacity: 1, duration: 0.4 }, '-=0.3')
        .to("#current-job", { opacity: 1, duration: 0.4 }, '-=0.2')
        .to("#previous-jobs", { opacity: 1, duration: 0.4 })
        .to("#contact-details", { opacity: 1, duration: 0.4 }, '-=0.3')
        .to("#code-projects", { opacity: 1, duration: 0.4 })
        .to("#blog-posts", { opacity: 1, duration: 0.4 }, '-=0.3')
        .to("#bg-model", { opacity: 0.1, duration: 0.4, stagger: 0.05 }, '-=1.0');    
});
