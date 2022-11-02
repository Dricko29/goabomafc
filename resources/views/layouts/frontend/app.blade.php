<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Football') }} &#8211; Official | @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/fontawesome/font-awesome.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/elegant/elegant-font.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/fa5/fa5.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/elegant/elegant-font.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/ionicons/ionicons.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/simpleline/simpleline.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/style.html' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/goodlayers-core/include/css/page-builder.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/revslider/public/assets/css/rs6.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/sportspress/assets/css/sportspress.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/sportspress/assets/css/icons.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/css/style-core.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/css/bigslam-style-custom.css' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('') }}frontend/plugins/google-map-plugin/assets/css/frontend.css' type='text/css' media='all'>

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto+Condensed%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%7CRoboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic%7CMerriweather%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic%7CLora%3Aregular%2Citalic%2C700%2C700italic&amp;subset=cyrillic-ext%2Cvietnamese%2Clatin%2Ccyrillic%2Cgreek-ext%2Clatin-ext%2Cgreek&amp;ver=5.3' type='text/css' media='all'>
    <link rel='stylesheet' id='gdlr-core-google-font-css' href='https://fonts.googleapis.com/css?family=Montserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;subset=vietnamese%2Clatin-ext%2Ccyrillic%2Ccyrillic-ext%2Clatin&amp;ver=5.3' type='text/css' media='all'>


</head>

<body class="home page-template-default page page-id-5067 theme-bigslam gdlr-core-body woocommerce-no-js bigslam-body bigslam-body-front bigslam-full gdlr-core-link-to-lightbox">
    <div class="bigslam-mobile-header-wrap">
        @include('layouts.frontend.partials.mobile-header')
    </div>
    <div class="bigslam-body-outer-wrapper ">
        <div class="bigslam-body-wrapper clearfix  bigslam-with-transparent-header bigslam-with-frame">
            <div class="bigslam-header-boxed-wrap">
                @include('layouts.frontend.partials.top-bar')
                <header class="bigslam-header-wrap bigslam-header-style-boxed  bigslam-style-splitted-menu bigslam-sticky-navigation bigslam-style-slide">
                    @include('layouts.frontend.partials.header')
                </header>
                <!-- header -->
            </div>
            <div class="bigslam-page-wrapper" id="bigslam-page-wrapper">
                @yield('content')
            </div>
            <footer>
                @include('layouts.frontend.partials.footer')
            </footer>
        </div>
    </div><a href="#bigslam-top-anchor" class="bigslam-footer-back-to-top-button" id="bigslam-footer-back-to-top-button"><i class="fa fa-angle-up"></i></a>

    {{-- <script src="{{ asset('frontend/fontawesome-free-6.2.0/js/fontawesome.min.js') }}"></script> --}}
    <script type='text/javascript' src='{{ asset('') }}frontend/js/jquery/jquery.js'></script>
    <script type='text/javascript' src='{{ asset('') }}frontend/js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/revslider/public/assets/js/revolution.tools.min.js'></script>
    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/revslider/public/assets/js/rs6.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var SnazzyDataForSnazzyMaps = [];
        SnazzyDataForSnazzyMaps = {
            "id": 38,
            "name": "Shades of Grey",
            "description": "A map with various shades of grey. Great for a website with a really dark theme. ",
            "url": "https:////snazzymaps.com//style//38//shades-of-grey",
            "imageUrl": "https:////snazzy-maps-cdn.azureedge.net//assets//38-shades-of-grey.png?v=20170407093939",
            "json": "[{/"featureType/":/"all/",/"elementType/":/"labels.text.fill/",/"stylers/":[{/"saturation/":36},{/"color/":/"#000000/"},{/"lightness/":40}]},{/"featureType/":/"all/",/"elementType/":/"labels.text.stroke/",/"stylers/":[{/"visibility/":/"on/"},{/"color/":/"#000000/"},{/"lightness/":16}]},{/"featureType/":/"all/",/"elementType/":/"labels.icon/",/"stylers/":[{/"visibility/":/"off/"}]},{/"featureType/":/"administrative/",/"elementType/":/"geometry.fill/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":20}]},{/"featureType/":/"administrative/",/"elementType/":/"geometry.stroke/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":17},{/"weight/":1.2}]},{/"featureType/":/"landscape/",/"elementType/":/"geometry/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":20}]},{/"featureType/":/"poi/",/"elementType/":/"geometry/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":21}]},{/"featureType/":/"road.highway/",/"elementType/":/"geometry.fill/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":17}]},{/"featureType/":/"road.highway/",/"elementType/":/"geometry.stroke/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":29},{/"weight/":0.2}]},{/"featureType/":/"road.arterial/",/"elementType/":/"geometry/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":18}]},{/"featureType/":/"road.local/",/"elementType/":/"geometry/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":16}]},{/"featureType/":/"transit/",/"elementType/":/"geometry/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":19}]},{/"featureType/":/"water/",/"elementType/":/"geometry/",/"stylers/":[{/"color/":/"#000000/"},{/"lightness/":17}]}]",
            "views": 264721,
            "favorites": 544,
            "createdBy": {
                "name": "Adam Krogh",
                "url": "https:////twitter.com//adamkrogh"
            },
            "createdOn": "2013-11-12T18:21:41.94",
            "tags": ["dark", "greyscale"],
            "colors": ["black", "gray"]
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/snazzy-maps/snazzymaps.js'></script>
    <script type="text/javascript">
        function setREVStartSize(t) {
            try {
                var h, e = document.getElementById(t.c).parentNode.offsetWidth;
                if (e = 0 === e || isNaN(e) ? window.innerWidth : e, t.tabw = void 0 === t.tabw ? 0 : parseInt(t.tabw), t.thumbw = void 0 === t.thumbw ? 0 : parseInt(t.thumbw), t.tabh = void 0 === t.tabh ? 0 : parseInt(t.tabh), t.thumbh = void 0 === t.thumbh ? 0 : parseInt(t.thumbh), t.tabhide = void 0 === t.tabhide ? 0 : parseInt(t.tabhide), t.thumbhide = void 0 === t.thumbhide ? 0 : parseInt(t.thumbhide), t.mh = void 0 === t.mh || "" == t.mh || "auto" === t.mh ? 0 : parseInt(t.mh, 0), "fullscreen" === t.layout || "fullscreen" === t.l) h = Math.max(t.mh, window.innerHeight);
                else {
                    for (var i in t.gw = Array.isArray(t.gw) ? t.gw : [t.gw], t.rl) void 0 !== t.gw[i] && 0 !== t.gw[i] || (t.gw[i] = t.gw[i - 1]);
                    for (var i in t.gh = void 0 === t.el || "" === t.el || Array.isArray(t.el) && 0 == t.el.length ? t.gh : t.el, t.gh = Array.isArray(t.gh) ? t.gh : [t.gh], t.rl) void 0 !== t.gh[i] && 0 !== t.gh[i] || (t.gh[i] = t.gh[i - 1]);
                    var r, a = new Array(t.rl.length),
                        n = 0;
                    for (var i in t.tabw = t.tabhide >= e ? 0 : t.tabw, t.thumbw = t.thumbhide >= e ? 0 : t.thumbw, t.tabh = t.tabhide >= e ? 0 : t.tabh, t.thumbh = t.thumbhide >= e ? 0 : t.thumbh, t.rl) a[i] = t.rl[i] < window.innerWidth ? 0 : t.rl[i];
                    for (var i in r = a[0], a) r > a[i] && 0 < a[i] && (r = a[i], n = i);
                    var d = e > t.gw[n] + t.tabw + t.thumbw ? 1 : (e - (t.tabw + t.thumbw)) / t.gw[n];
                    h = t.gh[n] * d + (t.tabh + t.thumbh)
                }
                void 0 === window.rs_init_css && (window.rs_init_css = document.head.appendChild(document.createElement("style"))), document.getElementById(t.c).height = h, window.rs_init_css.innerHTML += "#" + t.c + "_wrapper { height: " + h + "px }"
            } catch (t) {
                console.log("Failure at Presize of Slider:" + t)
            }
        };
    </script>


    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/goodlayers-core/plugins/script.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var gdlr_core_pbf = {
            "admin": "",
            "video": {
                "width": "640",
                "height": "360"
            },
            "ajax_url": "#",
            "ilightbox_skin": "dark"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/goodlayers-core/include/js/page-builder.js'></script>
    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/sportspress/assets/js/jquery.dataTables.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var localized_strings = {
            "days": "days",
            "hrs": "hrs",
            "mins": "mins",
            "secs": "secs",
            "previous": "Previous",
            "next": "Next"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/sportspress/assets/js/sportspress.js'></script>
    <script type='text/javascript' src='{{ asset('') }}frontend/js/jquery/ui/effect.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var bigslam_script_core = {
            "home_url": "/"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('') }}frontend/js/plugins.js'></script>
    <script type='text/javascript' src='{{ asset('') }}frontend/plugins/google-map-plugin/assets/js/maps.js'></script>
    <script type="text/javascript">
        setREVStartSize({
            c: 'rev_slider_1_1',
            rl: [1240, 1240, 1240, 480],
            el: [890, 890, 890, 520],
            gw: [1300, 1300, 1300, 480],
            gh: [890, 890, 890, 520],
            layout: 'fullwidth',
            mh: "0"
        });
        var revapi1,
            tpj;
        jQuery(function() {
            tpj = jQuery;
            if (tpj("#rev_slider_1_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_1");
            } else {
                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                    jsFileLocation: "plugins/revslider/public/assets/js/",
                    visibilityLevels: "1240,1240,1240,480",
                    gridwidth: "1300,1300,1300,480",
                    gridheight: "890,890,890,520",
                    minHeight: "",
                    editorheight: "890,768,960,520",
                    responsiveLevels: "1240,1240,1240,480",
                    disableProgressBar: "on",
                    navigation: {
                        mouseScrollNavigation: false,
                        onHoverStop: false,
                        arrows: {
                            enable: true,
                            style: "uranus",
                            hide_onmobile: true,
                            hide_under: "980px",
                            hide_onleave: true,
                            left: {
                                v_offset: 101
                            },
                            right: {
                                v_offset: 101
                            }
                        },
                        bullets: {
                            enable: true,
                            tmp: "<span class=/"tp-bullet-inner/"></span>",
                            style: "uranus",
                            v_offset: 40,
                            space: 10
                        }
                    },
                    fallbacks: {
                        allowHTML5AutoPlayOnAndroid: true
                    },
                });
            }

        });
    </script>

    <script type="text/javascript">
        setREVStartSize({
            c: 'rev_slider_1_1',
            rl: [1240, 1240, 1240, 480],
            el: [1100, 1100, 1100, 500],
            gw: [1240, 1240, 1240, 480],
            gh: [1100, 1100, 1100, 500],
            layout: 'fullwidth',
            mh: "0"
        });
        var revapi1,
            tpj;
        jQuery(function() {
            tpj = jQuery;
            if (tpj("#rev_slider_1_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_1");
            } else {
                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                    jsFileLocation: "//demo.goodlayers.com/bigslam/homepages/soccer01/wp-content/plugins/revslider/public/assets/js/",
                    sliderLayout: "fullwidth",
                    visibilityLevels: "1240,1240,1240,480",
                    gridwidth: "1240,1240,1240,480",
                    gridheight: "1100,1100,1100,500",
                    minHeight: "",
                    editorheight: "1100,768,960,500",
                    responsiveLevels: "1240,1240,1240,480",
                    disableProgressBar: "on",
                    navigation: {
                        mouseScrollNavigation: false,
                        onHoverStop: false,
                        touch: {
                            touchenabled: true
                        },
                        arrows: {
                            enable: true,
                            style: "uranus",
                            hide_onleave: true,
                            left: {

                            },
                            right: {

                            }
                        }
                    },
                    fallbacks: {
                        allowHTML5AutoPlayOnAndroid: true
                    },
                });
            }

        });
    </script>
    <script>
        var htmlDivCss = unescape(".jost-font%7B%20font-family%3A%20Jost%20%21important%3B%20%7D");
        var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement('div');
            htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
            document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>
    <script>
        var htmlDivCss = unescape("%23rev_slider_1_1_wrapper%20.uranus.tparrows%20%7B%0A%20%20width%3A50px%3B%0A%20%20height%3A50px%3B%0A%20%20background%3Argba%28255%2C255%2C255%2C0%29%3B%0A%20%7D%0A%20%23rev_slider_1_1_wrapper%20.uranus.tparrows%3Abefore%20%7B%0A%20width%3A50px%3B%0A%20height%3A50px%3B%0A%20line-height%3A50px%3B%0A%20font-size%3A40px%3B%0A%20transition%3Aall%200.3s%3B%0A-webkit-transition%3Aall%200.3s%3B%0A%20%7D%0A%20%0A%20%20%23rev_slider_1_1_wrapper%20.uranus.tparrows%3Ahover%3Abefore%20%7B%0A%20%20%20%20opacity%3A0.75%3B%0A%20%20%7D%0A");
        var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement('div');
            htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
            document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>
    <script>
        var htmlDivCss = unescape("%0A%0A%0A");
        var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
        if (htmlDiv) {
            htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
        } else {
            var htmlDiv = document.createElement('div');
            htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
            document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
        }
    </script>

    <script type="text/javascript">
        if (typeof revslider_showDoubleJqueryError === "undefined") {
            function revslider_showDoubleJqueryError(sliderID) {
                var err = "<div class='rs_error_message_box'>";
                err += "<div class='rs_error_message_oops'>Oops...</div>";
                err += "<div class='rs_error_message_content'>";
                err += "You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>";
                err += "To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on";
                err += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it";
                err += "</div>";
                err += "</div>";
                jQuery(sliderID).show().html(err);
            }
        }
    </script>
</body>


</html>