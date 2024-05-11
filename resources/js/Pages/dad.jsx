import React, { useEffect } from 'react';
import AOS from 'aos';
import GLightbox from 'glightbox';
import 'aos/dist/aos.css'; // Assurez-vous d'importer les styles requis
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css'; // Assurez-vous d'importer les styles de Swiper
import PureCounter from '@srexi/purecounterjs'; // Pour PureCounter, importez le module si nécessaire

const ParentComponent = ({ children }) => {
    useEffect(() => {
        // Fonction pour gérer le changement de classe lorsque la page est défilée
        const toggleScrolled = () => {
            const selectBody = document.querySelector('body');
            const selectHeader = document.querySelector('#header');

            if (
                !selectHeader.classList.contains('scroll-up-sticky') &&
                !selectHeader.classList.contains('sticky-top') &&
                !selectHeader.classList.contains('fixed-top')
            )
                return;

            window.scrollY > 100
                ? selectBody.classList.add('scrolled')
                : selectBody.classList.remove('scrolled');
        };

        document.addEventListener('scroll', toggleScrolled);
        window.addEventListener('load', toggleScrolled);

        return () => {
            // Nettoyage des écouteurs d'événements
            document.removeEventListener('scroll', toggleScrolled);
            window.removeEventListener('load', toggleScrolled);
        };
    }, []);

    useEffect(() => {
        // Mobile nav toggle
        const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

        const mobileNavToogle = () => {
            document.querySelector('body').classList.toggle('mobile-nav-active');
            mobileNavToggleBtn.classList.toggle('bi-list');
            mobileNavToggleBtn.classList.toggle('bi-x');
        };

        if (mobileNavToggleBtn) {
            mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
        }

        return () => {
            if (mobileNavToggleBtn) {
                mobileNavToggleBtn.removeEventListener('click', mobileNavToogle);
            }
        };
    }, []);

    useEffect(() => {
        // Gestion du préchargeur
        const preloader = document.querySelector('#preloader');
        if (preloader) {
            window.addEventListener('load', () => {
                preloader.remove();
            });
        }

        // Nettoyage des écouteurs d'événements
        return () => {
            if (preloader) {
                window.removeEventListener('load', () => {
                    preloader.remove();
                });
            }
        };
    }, []);

    useEffect(() => {
        // Gestion du bouton de défilement vers le haut
        const scrollTop = document.querySelector('.scroll-top');

        const toggleScrollTop = () => {
            if (scrollTop) {
                window.scrollY > 100
                    ? scrollTop.classList.add('active')
                    : scrollTop.classList.remove('active');
            }
        };

        if (scrollTop) {
            scrollTop.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth',
                });
            });
        }

        document.addEventListener('scroll', toggleScrollTop);
        window.addEventListener('load', toggleScrollTop);

        return () => {
            document.removeEventListener('scroll', toggleScrollTop);
            window.removeEventListener('load', toggleScrollTop);

            if (scrollTop) {
                scrollTop.removeEventListener('click', (e) => {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth',
                    });
                });
            }
        };
    }, []);

    useEffect(() => {
        // Initialisation de AOS pour les animations
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true,
            mirror: false,
        });

        // Initialisation de GLightbox
        const glightbox = GLightbox({
            selector: '.glightbox',
        });

        // Initialisation de PureCounter
        new PureCounter();

        // Initialisation de Swiper
        const initSwiper = () => {
            document.querySelectorAll('.swiper').forEach((swiper) => {
                let config = JSON.parse(
                    swiper.querySelector('.swiper-config').innerHTML.trim()
                );
                new Swiper(swiper, config);
            });
        };

        window.addEventListener('load', initSwiper);

        // Nettoyage des écouteurs d'événements
        return () => {
            window.removeEventListener('load', initSwiper);
        };
    }, []);

    return <div>{children}</div>; // Utiliser children pour rendre des composants enfants
};

export default ParentComponent;
