console.log('Hello from service-worker.js');

this.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
        './',
        '/build/fonts/Elianto-Regular.7e57dbb0.otf',
        '/build/fonts/Elianto-Regular.217c0af5.ttf',
        '/build/images/Elianto-Regular.217c0af5.ttf',

      ]);
    })
  );
});
// workbox.routing.registerRoute(
//   new RegExp('.*\.js'),
//   workbox.strategies.networkFirst()
// );
// workbox.routing.registerRoute(
//   // Cache CSS files
//   /.*\.css/,
//   // Use cache but update in the background ASAP
//   workbox.strategies.staleWhileRevalidate({
//     // Use a custom cache name
//     cacheName: 'css-cache',
//   })
// );

// workbox.routing.registerRoute(
//   // Cache image files
//   /.*\.(?:png|jpg|jpeg|svg|gif)/,
//   // Use the cache if it's available
//   workbox.strategies.cacheFirst({
//     // Use a custom cache name
//     cacheName: 'image-cache',
//     plugins: [
//       new workbox.expiration.Plugin({
//         // Cache only 20 images
//         maxEntries: 20,
//         // Cache for a maximum of a week
//         maxAgeSeconds: 7 * 24 * 60 * 60,
//       })
//     ],
//   })
// );