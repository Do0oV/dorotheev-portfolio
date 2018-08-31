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
  "url": "/",
  "revision": "c6ad91ecd3fc9d83e05b340ec689b3ff"
},
{
    "url": "build/app.css",
    "revision": "088004203ecda312326886647ddf4d6e"
  },
  {
    "url": "build/app.js",
    "revision": "0c55d585d44eb106a2d8c70aeef4b282"
  },
  {
    "url": "build/bootstrap.min.css",
    "revision": "04aca1f4cd3ec3c05a75a879f3be75a3"
  },
  {
    "url": "build/css/admin.css",
    "revision": "137e85b057008710a97ae7f17f109ba4"
  },
  {
    "url": "build/fonts/BRUSHSCI.33bc06ea.ttf",
    "revision": "33bc06ea126d3ff79886277122f1f510"
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
    "url": "build/images/bootstrap-plain-wordmark.png",
    "revision": "7d83d8cae3f55b490562a2f755171d9a"
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
    "url": "build/images/cattree.png",
    "revision": "2e03844c207ffb138f0fb456a9d8f265"
  },
  {
    "url": "build/images/crypto.png",
    "revision": "cf44f5839af657d36a3358982c940f70"
  },
  {
    "url": "build/images/css.png",
    "revision": "7f295fe68759fbb23f55942cb036a220"
  },
  {
    "url": "build/images/css3-plain-wordmark.png",
    "revision": "d7c0033a069284de6f20ce1218444813"
  },
  {
    "url": "build/images/doctrine-plain-wordmark.png",
    "revision": "b804c8ff51c567fa889dc5c2df3c5f71"
  },
  {
    "url": "build/images/email.svg",
    "revision": "22081fb0ad1a40ab7e7c61fe63ef7361"
  },
  {
    "url": "build/images/foundation-original-wordmark.png",
    "revision": "a793615f5ec606e32fd0946c9f4c145e"
  },
  {
    "url": "build/images/git-plain-wordmark.png",
    "revision": "6d3c9c9e86684051ed08211ab091ce71"
  },
  {
    "url": "build/images/github.svg",
    "revision": "3932b28b417da2511bdbc1b1a6ec3edb"
  },
  {
    "url": "build/images/gulp-plain.png",
    "revision": "7542807106133bc92974f5cbcd6cf361"
  },
  {
    "url": "build/images/hey.png",
    "revision": "0e16108ef3e5e5392cfa9a04ee43a016"
  },
  {
    "url": "build/images/hi.png",
    "revision": "e3b9ab537c9b729418603635ef823201"
  },
  {
    "url": "build/images/html.png",
    "revision": "3b3c1a41cb3bdaf5b66c9eede5b14fb7"
  },
  {
    "url": "build/images/html5-plain-wordmark.png",
    "revision": "fc567da9ca6824679fafcf282d08d6f4"
  },
  {
    "url": "build/images/icon/apple-touch-icon-114x114.png",
    "revision": "fb4b3b33b5c8ff925071714dcb714e3f"
  },
  {
    "url": "build/images/icon/apple-touch-icon-120x120.png",
    "revision": "6723e40a211191c1c1b414092ed26941"
  },
  {
    "url": "build/images/icon/apple-touch-icon-144x144.png",
    "revision": "6329e7fa2fe9fc87ef9ac9345fbbe266"
  },
  {
    "url": "build/images/icon/apple-touch-icon-152x152.png",
    "revision": "74c5c3377571893cf0b28923bcb96204"
  },
  {
    "url": "build/images/icon/apple-touch-icon-57x57.png",
    "revision": "2ce18443592bcfb7ba6a0ced82bc864f"
  },
  {
    "url": "build/images/icon/apple-touch-icon-60x60.png",
    "revision": "a71e2a66c6ea60724feccd8889489bbd"
  },
  {
    "url": "build/images/icon/apple-touch-icon-72x72.png",
    "revision": "7b991c71ff93f2a6439eb0a0e8dc7862"
  },
  {
    "url": "build/images/icon/apple-touch-icon-76x76.png",
    "revision": "2499facc49f20d7f1239a938d45db8b6"
  },
  {
    "url": "build/images/icon/code.txt",
    "revision": "3eefd6f286ef79e3471e70d6bd75469a"
  },
  {
    "url": "build/images/icon/favicon-128.png",
    "revision": "8791dd6879833e6935244f5b63a783a4"
  },
  {
    "url": "build/images/icon/favicon-16x16.png",
    "revision": "82e15ad4d8941d78a326d252c645f7db"
  },
  {
    "url": "build/images/icon/favicon-192x192.png",
    "revision": "b1d452f9864f115fbd671873dea9c477"
  },
  {
    "url": "build/images/icon/favicon-196x196.png",
    "revision": "a16fc051643ceb8a0195e767c9c3395c"
  },
  {
    "url": "build/images/icon/favicon-32x32.png",
    "revision": "e7fbf11311e2ffd53202d6ab74631781"
  },
  {
    "url": "build/images/icon/favicon-96x96.png",
    "revision": "cddace2fddcd5009c3e20bd7d9c4603d"
  },
  {
    "url": "build/images/icon/favicon.ico",
    "revision": "94b86863dc4a0ed94ddd54078b0b7b06"
  },
  {
    "url": "build/images/icon/mstile-144x144.png",
    "revision": "6329e7fa2fe9fc87ef9ac9345fbbe266"
  },
  {
    "url": "build/images/icon/mstile-150x150.png",
    "revision": "4e3ab1ef08beb7e09ccaed95a8774a1b"
  },
  {
    "url": "build/images/icon/mstile-310x150.png",
    "revision": "e9de968da6e51b473bcdbacee2a9a8d5"
  },
  {
    "url": "build/images/icon/mstile-310x310.png",
    "revision": "30ab785cd4727746ec3087d44dc1710b"
  },
  {
    "url": "build/images/icon/mstile-512x512.png",
    "revision": "04c2538c8b5a3e9fcb2256aea2ae42ff"
  },
  {
    "url": "build/images/icon/mstile-70x70.png",
    "revision": "8791dd6879833e6935244f5b63a783a4"
  },
  {
    "url": "build/images/imonit.png",
    "revision": "d5a3664a743713ad4790463e24b51683"
  },
  {
    "url": "build/images/javascript-plain.png",
    "revision": "54cac9b5af2b7ffdd2cd845cdbcc779f"
  },
  {
    "url": "build/images/jquery-plain-wordmark.png",
    "revision": "512cf5f848d04b93201fe0c59e41cc95"
  },
  {
    "url": "build/images/js.png",
    "revision": "0d7f9ac0279cf3731db3878aebabd26c"
  },
  {
    "url": "build/images/letsdothis.png",
    "revision": "36678dc3f1d559f9e34dc3dd84d41797"
  },
  {
    "url": "build/images/linkedin.svg",
    "revision": "e7309ef97dec666ba958178563f4fe38"
  },
  {
    "url": "build/images/linux-plain.png",
    "revision": "7c63f5879568fad787ec8821bc9b624e"
  },
  {
    "url": "build/images/materialize-white.png",
    "revision": "04500f4d4e6d286933830c10ea9f25f0"
  },
  {
    "url": "build/images/menu-button.svg",
    "revision": "2e88dd04eaa3368174430734a526836a"
  },
  {
    "url": "build/images/movie.png",
    "revision": "bdf5b9ffed91a15bbffc6b3df81efbd6"
  },
  {
    "url": "build/images/mysql-plain-wordmark.png",
    "revision": "bff72161eaac5aab66eb8c6ebc95c1ea"
  },
  {
    "url": "build/images/mysql.png",
    "revision": "9b5b5bca75e92bbc6e9536ca0a81c26b"
  },
  {
    "url": "build/images/nodejs-plain-wordmark.png",
    "revision": "c3579208d84bc7e78b7b1a9ef6f31be2"
  },
  {
    "url": "build/images/photoshop-plain.png",
    "revision": "beff513d89bcecf961c9aa142fb071dc"
  },
  {
    "url": "build/images/php-plain.png",
    "revision": "a3542e0f14ce2c561bf47e348db0cb2a"
  },
  {
    "url": "build/images/php.png",
    "revision": "8c4edb87cc499891fe3a924a6a2ff54b"
  },
  {
    "url": "build/images/smile.png",
    "revision": "3ab2d6cccb3142796765c44472252a14"
  },
  {
    "url": "build/images/success.png",
    "revision": "89237268ee694a7cbfd1e08535097841"
  },
  {
    "url": "build/images/symfony-original-wordmark.png",
    "revision": "77f7c6bfec0f2146add92fbbc4d6483b"
  },
  {
    "url": "build/images/symfony.png",
    "revision": "eb46fcf664001983c0894da2f0bd0969"
  },
  {
    "url": "build/images/test.png",
    "revision": "cddfb8a96fa27f46731e4625abfe18f4"
  },
  {
    "url": "build/images/thumbs.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "build/images/webpack-plain-wordmark.png",
    "revision": "7d921147edc0cbcd2ae41e14ad16177f"
  },
  {
    "url": "build/images/wordpress-plain-wordmark.png",
    "revision": "4550385732571e79918a03c5f207832c"
  },
  {
    "url": "build/manifest.json",
    "revision": "eab45e60801f4fb583a8179bbd803129"
  },
  {
    "url": "index.php",
    "revision": "ca355c6c7d4adc56753183cdbce8645c"
  },
  {
    "url": "manifest.json",
    "revision": "49d6a11d0e29ecce43677ffc8e344c12"
  },
  {
    "url": "sw.js",
    "revision": "7cd18db478569fe8857361086c8d6a3b"
  },
  {
    "url": "upload/0278466ffe072cfefc9713cbdc5c171e.png",
    "revision": "67f2815131c04cd4ffbacbd2d408c90a"
  },
  {
    "url": "upload/097e39e9288e16d1dc087dceeefae608.png",
    "revision": "67f2815131c04cd4ffbacbd2d408c90a"
  },
  {
    "url": "upload/0aba097069d2cfcf58031dda5056b244.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/1136af082b76ccab989f65af6af5e7ea.png",
    "revision": "b804c8ff51c567fa889dc5c2df3c5f71"
  },
  {
    "url": "upload/1febf7434ff70e1b643aae4693811e60.png",
    "revision": "a3542e0f14ce2c561bf47e348db0cb2a"
  },
  {
    "url": "upload/23c3074461e03f18f55fb59bcbd94711.png",
    "revision": "7c63f5879568fad787ec8821bc9b624e"
  },
  {
    "url": "upload/2dd55cb0c705850abc03d18b5e9261c6.png",
    "revision": "beff513d89bcecf961c9aa142fb071dc"
  },
  {
    "url": "upload/326f3493a7e122c8c4aff29b894ade1c.png",
    "revision": "4550385732571e79918a03c5f207832c"
  },
  {
    "url": "upload/43ba1ff370fb75acbf30fe662a75c5f5.png",
    "revision": "7d83d8cae3f55b490562a2f755171d9a"
  },
  {
    "url": "upload/43ce306bbe6847cd5e4313b596376cc1.png",
    "revision": "04500f4d4e6d286933830c10ea9f25f0"
  },
  {
    "url": "upload/43ff44723f9785330d12b39ad82f739c.png",
    "revision": "2e03844c207ffb138f0fb456a9d8f265"
  },
  {
    "url": "upload/53c934f9629606b5558d68d60bf20f31.png",
    "revision": "67f2815131c04cd4ffbacbd2d408c90a"
  },
  {
    "url": "upload/71847f248e66f0a1321084e8749df76a.png",
    "revision": "7d921147edc0cbcd2ae41e14ad16177f"
  },
  {
    "url": "upload/77e785a0335cf1c38c50ea0739388e20.png",
    "revision": "eecd5191e3fb86a5a9ea005533737b88"
  },
  {
    "url": "upload/7e39b42c4fe5e245d0639108f53ce366.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/91f16dd31568b1713f2081c8c8c03cbf.png",
    "revision": "67f2815131c04cd4ffbacbd2d408c90a"
  },
  {
    "url": "upload/928fa7ec5b6903d8bd11a7d477c88f6b.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/93401e268e0f6477f8131d15c29184d4.png",
    "revision": "d7c0033a069284de6f20ce1218444813"
  },
  {
    "url": "upload/a808764334fab188bafdd6b0d62d154c.png",
    "revision": "2e03844c207ffb138f0fb456a9d8f265"
  },
  {
    "url": "upload/ad7ade20f3544c6827266f015fc889fa.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/b0eda04ae4950300910e9267c6e855dc.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/b24adf0004ac3f49520daa41aecc07dd.png",
    "revision": "6d3c9c9e86684051ed08211ab091ce71"
  },
  {
    "url": "upload/b43d74a32d99d51efb866aaf7c048009.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/b8e2bab5390c8df67df9ab48664c8e6f.png",
    "revision": "bff72161eaac5aab66eb8c6ebc95c1ea"
  },
  {
    "url": "upload/b98e977792b225d1620ba44474a89eee.png",
    "revision": "a793615f5ec606e32fd0946c9f4c145e"
  },
  {
    "url": "upload/c3ca72e9c625afffdce8d022709b07eb.png",
    "revision": "fc567da9ca6824679fafcf282d08d6f4"
  },
  {
    "url": "upload/c4f49f62500bf844f56c5a227ee08807.png",
    "revision": "54cac9b5af2b7ffdd2cd845cdbcc779f"
  },
  {
    "url": "upload/d4cc821b3403c6bb3359b764f68a6966.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/d915474507469f94faa28f35885239fc.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/ee77b0a20684cb8ca036eb68962198df.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
  },
  {
    "url": "upload/f2aed7a31400b28ec8b1c80b9b6bb02a.png",
    "revision": "77f7c6bfec0f2146add92fbbc4d6483b"
  },
  {
    "url": "upload/fc69ead782bcc53aee79ecf6a7ddc82b.png",
    "revision": "512cf5f848d04b93201fe0c59e41cc95"
  },
  {
    "url": "upload/ff7990a458127ec5554136211a6d06a2.png",
    "revision": "1f3c1076f05505274853e6ef8bd43e05"
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

