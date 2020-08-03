import "./helpers"
(function () {

  var matched, browser;

  // More details: https://api.jquery.com/jQuery.browser
  // jQuery.uaMatch maintained for back-compat
  jQuery.uaMatch = function (ua) {
    ua = ua.toLowerCase();

    var match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
      /(webkit)[ \/]([\w.]+)/.exec(ua) ||
      /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
      /(msie) ([\w.]+)/.exec(ua) ||
      ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) ||
      [];

    return {
      browser: match[1] || "",
      version: match[2] || "0"
    };
  };

  matched = jQuery.uaMatch(navigator.userAgent);
  browser = {};

  if (matched.browser) {
    browser[matched.browser] = true;
    browser.version = matched.version;
  }

  // Chrome is Webkit, but Webkit is also Safari.
  if (browser.chrome) {
    browser.webkit = true;
  } else if (browser.webkit) {
    browser.safari = true;
  }

  jQuery.browser = browser;

  jQuery.sub = function () {
    function jQuerySub(selector, context) {
      return new jQuerySub.fn.init(selector, context);
    }
    jQuery.extend(true, jQuerySub, this);
    jQuerySub.superclass = this;
    jQuerySub.fn = jQuerySub.prototype = this();
    jQuerySub.fn.constructor = jQuerySub;
    jQuerySub.sub = this.sub;
    jQuerySub.fn.init = function init(selector, context) {
      if (context && context instanceof jQuery && !(context instanceof jQuerySub)) {
        context = jQuerySub(context);
      }

      return jQuery.fn.init.call(this, selector, context, rootjQuerySub);
    };
    jQuerySub.fn.init.prototype = jQuerySub.fn;
    var rootjQuerySub = jQuerySub(document);
    return jQuerySub;
  };

})();

jQuery(document).ready(function ($) {

  // Get browser and add to body
  $.each($.browser, function (i) {
    $('body').addClass(i);
    return false;
  });
  // Get OS and add to body
  var os = [
    'iphone',
    'ipad',
    'windows',
    'mac',
    'linux'
  ];
  var match = navigator.appVersion.toLowerCase().match(new RegExp(os.join('|')));
  if (match) {
    $('body').addClass(match[0]);
  };


  if ($('body').hasClass('page-template-template-main-field-entry') || $('body').hasClass('page-template-template-main-field')) {

    var img = $('.field-image');

    // function state_change(data) {
    //   //alert(data.state+":"+data.selected);
    // }
    img.mapster({
      // onStateChange: state_change,
      fillColor: false,
      fillOpacity: 0.0,
      strokeOpacity: 0.0,
      // fillOpacity: 0.7,
      // mapKey: "group",
      // strokeWidth: 2,
      // stroke: true,
      // strokeColor: 'F88017',
      staticState: false,
      // scaleMap: true,
      // render_select: {
      //   fillColor: 'fafafa',
      //   fillOpacity: 1
      // },
      clickNavigate: true,
      // areas: [
      //   {
      //     includeKeys: 'speakers-corner,comedy-tent,fairground,bar',
      //     stroke: true,
      //     scaleMap: true,
      //   },
      // ]
    });

    // jQuery(window).resize(function () {
    //   var windowWidth = $(window).width();
    //   // scale the image on resize with new coordinates
    //   img.mapster('resize', windowWidth, null, null);
    // })
  }
});