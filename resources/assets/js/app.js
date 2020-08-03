import "./helpers"

jQuery(document).ready(function ($) {

  if ($('body').hasClass('page-template-template-main-field-entry') || $('body').hasClass('page-template-template-main-field')) {

    var img = $('.field-image');

    function state_change(data) {
      //alert(data.state+":"+data.selected);
    }
    img.mapster({
      // onStateChange: state_change,
      fillColor: false,
      // fillOpacity: 0.7,
      // mapKey: "group",
      // strokeWidth: 2,
      // stroke: true,
      // strokeColor: 'F88017',
      // staticState: true,
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

    jQuery(window).resize(function () {
      var windowWidth = $(window).width();
      // scale the image on resize with new coordinates
      img.mapster('resize', windowWidth, null, null);
    })
  }
});