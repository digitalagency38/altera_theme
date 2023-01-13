// var map;
// var map_big;
// DG.then(function () {
//     // map = DG.map('map', {
//     //     center: [52.282839, 104.254349],
//     //     zoom: 16,
//     //     dragging : false,
//     //     touchZoom: false,
//     //     scrollWheelZoom: false,
//     //     doubleClickZoom: false,
//     //     boxZoom: false,
//     //     geoclicker: false,
//     //     zoomControl: false,
//     //     fullscreenControl: false
//     // });
//     map_big = DG.map('map_big', {
//         center: [52.27767, 104.306708],
//         zoom: 28,
//         //dragging : false,
//         touchZoom: false,
//         scrollWheelZoom: false,
//         //doubleClickZoom: false,
//         //boxZoom: false,
//         //geoclicker: false,
//         //zoomControl: false,
//         fullscreenControl: false
//     });
//     // DG.marker([52.275334, 104.310696]).addTo(map);
//     DG.marker([52.27767, 104.306708]).addTo(map_big);
// });

if ($('#map-about').length>0) {
  ymaps.ready(function () {
      let myMap = new ymaps.Map('map-about', {
              center: [52.277572, 104.306639],
              zoom: 16
          }, {
              searchControlProvider: 'yandex#search'
          });

          // Создаём макет содержимого.
          MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
              '<div class="map-placemark-about"><div class="map-placemark-about-content">$[properties.iconContent]</div></div>'
          );

          let coordinates = $('#map-about').data('coordinates');
          //console.log(coordinates);

          //for (var i = 0; i < coordinates.length; i++) {
              //console.log(coordinates[i]);
            //myPlacemarkWithContent = new ymaps.Placemark([coordinates[i][0], coordinates[i][1]], {
            //
            	myPlacemarkWithContent = new ymaps.Placemark([52.277572, 104.306639], {
                // iconContent: coordinates[i][2]
            }, {
                iconLayout: 'default#imageWithContent',
                iconImageHref: 'https://altera-irkutsk.ru/wp-content/themes/altera/img/about/logo_map.svg',
                iconImageSize: [40, 40],
                iconImageOffset: [-20, -20],
                iconContentOffset: [40, 20],
                iconContentLayout: MyIconContentLayout
            });
            myMap.geoObjects.add(myPlacemarkWithContent);
          //}
          //myMap.setBounds(myMap.geoObjects.getBounds());
  });
}

  ymaps.ready(function () {
      let myMap2 = new ymaps.Map('map-contact', {
              center: [52.277572, 104.306639],
              zoom: 18
          }, {
              searchControlProvider: 'yandex#search'
          });

          // Создаём макет содержимого.
          MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
              '<div class="map-placemark-about"><div class="map-placemark-about-content">$[properties.iconContent]</div></div>'
          );

          myPlacemarkWithContent = new ymaps.Placemark([52.277572, 104.306639], {
              // iconContent: coordinates[i][2]
          }, {
              iconLayout: 'default#imageWithContent',
              iconImageHref: 'https://altera-irkutsk.ru/wp-content/themes/altera/img/about/logo_map.svg',
              iconImageSize: [40, 40],
              iconImageOffset: [-20, -20],
              iconContentOffset: [40, 20],
              iconContentLayout: MyIconContentLayout
          });
          myMap2.geoObjects.add(myPlacemarkWithContent);

          // myMap2.setBounds(myMap2.geoObjects.getBounds());
  });