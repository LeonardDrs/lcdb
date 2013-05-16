var map,
    directionsService   = new google.maps.DirectionsService(),
    zoomLevel           = 12,
    infowindow          = null,
    infoBox             = null,
    defaultLat          = 48.856358,
    defaultLon          = 2.351761,
    $documentFragment   = $(document.createDocumentFragment());

function initialize() { 
    
    infoBox = new InfoBox({
        content: '...'
    });

    var relaysLength    = relays.length,
        $relayList      = $('#relay-list');

    //options of the map
    var opt = {
        zoom        : zoomLevel,
        center      : new google.maps.LatLng(defaultLat, defaultLon),
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    
    //starts the map
    map = new google.maps.Map(document.getElementById('map'), opt);

    //creates the markers and the list on the left
    for (var i=0; i< relaysLength; i++) {
        createMarker(i, relays[i].nom, relays[i].adresse, relays[i].telephone, relays[i].mention, relays[i].lat, relays[i].lon);
        
        var $listItem   = $(document.createElement('li')),
            $title      = $(document.createElement('h3')),
            $address1   = $(document.createElement('p')),
            $address2   = $(document.createElement('p')),
            $tel        = $(document.createElement('p')),
            $mention    = $(document.createElement('p')),
            $wrapper    = $(document.createElement('div')),
            $choose     = $(document.createElement('a')),
            $marker     = $(document.createElement('span')),
            $separation = $(document.createElement('hr'));

        $title.text(relays[i].nom).addClass('relay-name');
        $address1.text(relays[i].adresse[0]).addClass('relay-address');
        $address2.text(relays[i].adresse[1]).addClass('relay-address');
        $tel.text(relays[i].telephone);
        $mention.text(relays[i].mention).addClass('relay-mention');
        $choose.text('choisir ce point relais').attr({'href': '#', 'title': 'choisir ce point relais'}).addClass('green-button choose-relay');
        $wrapper.append($choose);

        $listItem.append($title, $address1, $address2, $tel, $mention, $wrapper, $marker, $separation);
        if (i===0)
            $listItem.addClass('first');

        if (i===relaysLength-1)
            $listItem.addClass('last');
        
        $marker.addClass('marker'+(i+1));
        $documentFragment.append($listItem);
        
    }

    $relayList.append($documentFragment);

    /*if (navigator.appVersion.indexOf("MSIE 7.") != -1) {
        google.maps.event.addListener(map, 'resize', function() {
            $('#relays').css({'width': $(window).width(), 'height': $(window).height(), 'top': 0, 'left': 0, 'right': 0, 'bottom': 0, 'zoom': 1});
            $('#popin-wrapper').css({'width': $(window).width(), 'height': $(window).height(), 'top': 0, 'left': 0, 'right': 0, 'bottom': 0, 'position': 'relative', 'zoom': 1});
            $('.popin').css({'left': ($(window).width() / 2) - ($('.popin').width() / 2), 'top': ($(window).height() / 2) - ($('.popin').height() / 2), 'zoom': 1});
        });
    }*/
}

function createMarker(index, nom, adresse, telephone, mention, lat, lon){
    var markerOptions = {
        draggable   : false,
        Animation   : google.maps.Animation.DROP,
        map         : map,
        center      : new google.maps.LatLng(lat, lon),
        position    : new google.maps.LatLng(lat, lon),
        icon        : new google.maps.MarkerImage(/*img_folder*/'img/asset/'+'markers.png', new google.maps.Size(20, 34, "px", "px"), new google.maps.Point(0, (index*34+1)), null, null)
    };

    m = new google.maps.Marker(markerOptions);

    google.maps.event.addListener(m, 'click', function () {
        var cont = document.createElement("div");
        $(cont).html('<h3 class="relay-name">'+nom+'</h3><p>'+adresse[0]+'</p><p>'+adresse[1]+'</p><p>'+telephone+'</p><p class="relay-mention">'+mention+'</p>');
        infoBox.setOptions({
            alignBottom             : true,
            disableAutoPan          : true,
            content                 : cont,
            pixelOffset             : new google.maps.Size(-100, -40),
            zIndex                  : 4000,
            boxClass                : 'infoBox',
            closeBoxURL             : /*img_folder*/'img/asset/close.gif',
            isHidden                : false,
            pane                    : 'floatPane',
            enableEventPropagation  : true
        });
        infoBox.open(map, this);
        map.panTo(infoBox.position_);
    });
}