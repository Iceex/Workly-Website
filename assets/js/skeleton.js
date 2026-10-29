(() => {
    'use strict';

    const skeleton = document.getElementById('page-skeleton');
    const content = document.getElementById('page-content');

    if (!skeleton || !content) return;

    let navigating = false;

    const showSkeleton = () => {
        skeleton.hidden = false;
        content.hidden = true;
    };

    const showContent = () => {
        skeleton.hidden = true;
        content.hidden = false;
    };

    const loadPage = async (url, pushHistory = true) => {
        if (navigating) return;

        navigating = true;
        showSkeleton();

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                window.location.href = url.href;
                return;
            }

            const html = await response.text();
            const documentPage = new DOMParser().parseFromString(
                html,
                'text/html'
            );

            const newContent = documentPage.querySelector(
                '[data-page-content]'
            );

            if (!newContent) {
                window.location.href = url.href;
                return;
            }

            content.innerHTML = newContent.innerHTML;
            document.title = documentPage.title;

            if (pushHistory) {
                history.pushState({}, '', url.href);
            }

            window.scrollTo({ top: 0, behavior: 'instant' });

            document.dispatchEvent(new CustomEvent('page:loaded', {
                detail: { url: url.href }
            }));

            showContent();
        } catch {
            window.location.href = url.href;
        } finally {
            navigating = false;
        }
    };

    document.addEventListener('click', event => {
        const link = event.target.closest('a[href]');

        if (
            !link ||
            event.defaultPrevented ||
            event.button !== 0 ||
            event.metaKey ||
            event.ctrlKey ||
            event.shiftKey ||
            event.altKey ||
            link.target ||
            link.hasAttribute('download') ||
            link.hasAttribute('data-no-ajax')
        ) {
            return;
        }

        const url = new URL(link.href, window.location.href);

        if (
            url.origin !== window.location.origin ||
            url.pathname === window.location.pathname &&
            url.search === window.location.search ||
            link.hash && url.pathname === location.pathname &&
            url.search === location.search
        ) {
            return;
        }

        event.preventDefault();
        loadPage(url);
    });

    window.addEventListener('popstate', () => {
        loadPage(new URL(window.location.href), false);
    });

    if (document.readyState === 'complete') {
        showContent();
    } else {
        window.addEventListener('load', showContent, { once: true });
    }
})();