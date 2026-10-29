document.querySelectorAll('.media-loader').forEach((container) => {
    const media = container.querySelector('.media-content');

    if (!media) return;

    const markLoaded = () => {
        container.classList.remove('is-loading');
        container.classList.add('is-loaded');
    };

    const markError = () => {
        container.classList.remove('is-loading');
        container.classList.add('is-error');
    };

    if (media.tagName === 'IMG') {
        if (media.complete) {
            media.naturalWidth > 0 ? markLoaded() : markError();
        } else {
            media.addEventListener('load', markLoaded, { once: true });
            media.addEventListener('error', markError, { once: true });
        }
    }

    if (media.tagName === 'VIDEO') {
        if (media.readyState >= 1) {
            markLoaded();
        } else {
            media.addEventListener('loadedmetadata', markLoaded, {
                once: true
            });
            media.addEventListener('error', markError, { once: true });
        }
    }
});