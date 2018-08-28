/**
 * Welcome to your Workbox-powered service worker!
 *
 * You'll need to register this file in your web app and you should
 * disable HTTP caching for this file too.
 * See https://goo.gl/nhQhGp
 *
 * The rest of the code is auto-generated. Please don't update this file
 * directly; instead, make changes to your Workbox build configuration
 * and re-run your build process.
 * See https://goo.gl/2aRDsh
 */

importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.4.1/workbox-sw.js");

/**
 * The workboxSW.precacheAndRoute() method efficiently caches and responds to
 * requests for URLs in the manifest.
 * See https://goo.gl/S9QRab
 */
 workbox.precaching.precacheAndRoute([
    {
    "url": "index.php",
    "revision": "9cb6122ab1617b277c0a944b2a2dae64"
  },
  {
    "url": "build/app.css",
    "revision": "821568ec2c8f53643421bdd44929bc87"
  },
  {
    "url": "build/app.js",
    "revision": "9e50f5015933f53224e664f22d1acfcc"
  },
  {
    "url": "build/bootstrap.min.css",
    "revision": "04aca1f4cd3ec3c05a75a879f3be75a3"
  },
  {
    "url": "build/fonts/Elianto-Regular.217c0af5.ttf",
    "revision": "217c0af596911b2c9df7ad5fb7340c4d"
  },
  {
    "url": "build/fonts/Elianto-Regular.7e57dbb0.otf",
    "revision": "7e57dbb0d775d1d0d80765b927306c0e"
  },
  {
    "url": "build/images/admin.344282f1.jpeg",
    "revision": "344282f11348ca73c3977fbddf151e36"
  },
  {
    "url": "build/images/admin.jpeg",
    "revision": "344282f11348ca73c3977fbddf151e36"
  },
  {
    "url": "build/images/cartographer.28424986.png",
    "revision": "2842498681360a4c0309bfa35464152d"
  },
  {
    "url": "build/images/cartographer.png",
    "revision": "2842498681360a4c0309bfa35464152d"
  },
  {
    "url": "build/images/css.png",
    "revision": "7f295fe68759fbb23f55942cb036a220"
  },
  {
    "url": "build/images/email.svg",
    "revision": "22081fb0ad1a40ab7e7c61fe63ef7361"
  },
  {
    "url": "build/images/favicon-32x32.png",
    "revision": "11ce5075e4bdad581e0f432270f9c88a"
  },
  {
    "url": "build/images/github.svg",
    "revision": "3932b28b417da2511bdbc1b1a6ec3edb"
  },
  {
    "url": "build/images/html.png",
    "revision": "3b3c1a41cb3bdaf5b66c9eede5b14fb7"
  },
  {
    "url": "build/images/icon/android-icon-144x144.png",
    "revision": "2e90e2d10bbb3b32b0307b8459ee91af"
  },
  {
    "url": "build/images/icon/android-icon-192x192.png",
    "revision": "378a23dd68dbc0f563b26e3cc7bca44b"
  },
  {
    "url": "build/images/icon/android-icon-36x36.png",
    "revision": "134236d5af021064ada468794a540b4d"
  },
  {
    "url": "build/images/icon/android-icon-48x48.png",
    "revision": "380a6446b8a292abb513665f4009f31b"
  },
  {
    "url": "build/images/icon/android-icon-72x72.png",
    "revision": "bcd1b1111b3bb837f4e82a555761d872"
  },
  {
    "url": "build/images/icon/android-icon-96x96.png",
    "revision": "f8c711bcb0267bfcf4e814c986339cb0"
  },
  {
    "url": "build/images/icon/apple-icon-114x114.png",
    "revision": "c723ab53efbf9ba8c714515a6607a36f"
  },
  {
    "url": "build/images/icon/apple-icon-120x120.png",
    "revision": "9b88c52b7868b30571d2247cdb637c49"
  },
  {
    "url": "build/images/icon/apple-icon-144x144.png",
    "revision": "2e90e2d10bbb3b32b0307b8459ee91af"
  },
  {
    "url": "build/images/icon/apple-icon-152x152.png",
    "revision": "b80bd6cdeab7aa6271b45d2115e29636"
  },
  {
    "url": "build/images/icon/apple-icon-180x180.png",
    "revision": "5a6c41f3c1b59285e856ff8b8b6c71a8"
  },
  {
    "url": "build/images/icon/apple-icon-57x57.png",
    "revision": "0b44b46b56a3a4310b9ea28ccf37ce18"
  },
  {
    "url": "build/images/icon/apple-icon-60x60.png",
    "revision": "92a9a11ec3d7e2170ad92c4e57647716"
  },
  {
    "url": "build/images/icon/apple-icon-72x72.png",
    "revision": "bcd1b1111b3bb837f4e82a555761d872"
  },
  {
    "url": "build/images/icon/apple-icon-76x76.png",
    "revision": "0fc8035a3dc50c1e8d9366e5cab64aa8"
  },
  {
    "url": "build/images/icon/apple-icon-precomposed.png",
    "revision": "8636ea97451ebe9f592ba9d512fd0664"
  },
  {
    "url": "build/images/icon/apple-icon.png",
    "revision": "8636ea97451ebe9f592ba9d512fd0664"
  },
  {
    "url": "build/images/icon/browserconfig.xml",
    "revision": "97775b1fd3b6e6c13fc719c2c7dd0ffe"
  },
  {
    "url": "build/images/icon/favicon-16x16.png",
    "revision": "cfe59ea19534ba9e1c5befab1e0394cd"
  },
  {
    "url": "build/images/icon/favicon-32x32.png",
    "revision": "11ce5075e4bdad581e0f432270f9c88a"
  },
  {
    "url": "build/images/icon/favicon-96x96.png",
    "revision": "f8c711bcb0267bfcf4e814c986339cb0"
  },
  {
    "url": "build/images/icon/favicon.ico",
    "revision": "3c9bd51b0880ef788ff65ad7a5426fe2"
  },
  {
    "url": "build/images/icon/manifest.json",
    "revision": "e50e6a1c9ed6452635d3211f39501e0d"
  },
  {
    "url": "build/images/icon/ms-icon-144x144.png",
    "revision": "2e90e2d10bbb3b32b0307b8459ee91af"
  },
  {
    "url": "build/images/icon/ms-icon-150x150.png",
    "revision": "d7c27faf25636b6eb4b21360adaafefc"
  },
  {
    "url": "build/images/icon/ms-icon-310x310.png",
    "revision": "61526090f37bc710f10c692747b292eb"
  },
  {
    "url": "build/images/icon/ms-icon-70x70.png",
    "revision": "fe7ac79e266b16cdaa73e06e6cc8e7ea"
  },
  {
    "url": "build/images/js.png",
    "revision": "0d7f9ac0279cf3731db3878aebabd26c"
  },
  {
    "url": "build/images/linkedin.svg",
    "revision": "e7309ef97dec666ba958178563f4fe38"
  },
  {
    "url": "build/images/logoport.png",
    "revision": "b90c50d4e3c9e87589e7f89819539e9f"
  },
  {
    "url": "build/images/menu-button.svg",
    "revision": "2e88dd04eaa3368174430734a526836a"
  },
  {
    "url": "build/images/mysql.png",
    "revision": "9b5b5bca75e92bbc6e9536ca0a81c26b"
  },
  {
    "url": "build/images/php.png",
    "revision": "8c4edb87cc499891fe3a924a6a2ff54b"
  },
  {
    "url": "build/images/symfony.png",
    "revision": "eb46fcf664001983c0894da2f0bd0969"
  },
  {
    "url": "build/images/test.svg",
    "revision": "888a71665eefed4d3f2ba80727da8a6f"
  },
  {
    "url": "build/manifest.json",
    "revision": "888838f6c40af9ca10da86fd1d107d47"
  },
  {
    "url": "manifest.json",
    "revision": "c9c558c17a9e0a40d1ef060c6cdd9860"
  },
  {
    "url": "sw.js",
    "revision": "cc3506702a742fcb8c3dae232f4f3140"
  },
  {
    "url": "upload/85626f066268f0c36d6806051574aa5b.png",
    "revision": "7d83d8cae3f55b490562a2f755171d9a"
  }
]);


//workbox.setConfig({ debug: true });


workbox.routing.registerRoute(
  new RegExp('.*\.js'),
  workbox.strategies.cacheFirst()
);
workbox.routing.registerRoute('/', workbox.strategies.staleWhileRevalidate());
workbox.routing.registerRoute(/build\/images\/.+/, workbox.strategies.cacheFirst());

workbox.routing.registerRoute(
  // Cache CSS files
  /.*\.css/,
  // Use cache but update in the background ASAP
  workbox.strategies.staleWhileRevalidate({
    // Use a custom cache name
    cacheName: 'css-cache',
  })
);
//self.addEventListener('fetch', function(event) {});
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
//         maxEntries: 50,
//         // Cache for a maximum of a week
//         maxAgeSeconds: 7 * 24 * 60 * 60,
//       })
//     ],
//   })
// );

