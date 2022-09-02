//Installation du service worker
self.addEventListener('install', evt => {
    evt.waitUntil(caches.open(project).then(cache => {
            cache.addAll(project);
        })
    )

});

//Activation du Service Worker

self.addEventListener('activate', evt => {
    console.log('le Service Worker a été installé ');
});

//fetch event afin de répondre quand on est en mode hors ligne.
self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.open('project').then(function(cache) {
            return cache.match(event.request).then(function (response) {
                return response || fetch(event.request).then(function(response) {
                    cache.put(event.request, response.clone());
                    return response;
                });
            });
        })
    );
});

