<script>
$(function () {
  'use strict';

  var isRtl = $('html').attr('data-textdirection') === 'rtl',
    typeSuccess = $('#type-success'),
    typeInfo = $('#type-info'),
    typeWarning = $('#type-warning'),
    typeError = $('#type-error'),
    positionTopLeft = $('#position-top-left'),
    positionTopCenter = $('#position-top-center'),
    positionTopRight = $('#position-top-right'),
    positionTopFull = $('#position-top-full'),
    positionBottomLeft = $('#position-bottom-left'),
    positionBottomCenter = $('#position-bottom-center'),
    positionBottomRight = $('#position-bottom-right'),
    positionBottomFull = $('#position-bottom-full'),
    progressBar = $('#progress-bar'),
    clearToastBtn = $('#clear-toast-btn'),
    fastDuration = $('#fast-duration'),
    slowDuration = $('#slow-duration'),
    toastrTimeout = $('#timeout'),
    toastrSticky = $('#sticky'),
    slideToast = $('#slide-toast'),
    fadeToast = $('#fade-toast'),
    clearToastObj;

  // Success Type
@if (session('toast-success'))
    toastr['success']('{{session('toast-success')}}', 'با موفقیت انجام شد', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
@endif

  // Info Type
  typeInfo.on('click', function () {
    toastr['info']('👋 Chupa chups biscuit brownie gummi sugar plum caramels.', 'Info!', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
  });

  // Warning Type
  typeWarning.on('click', function () {
    toastr['warning']('👋 Icing cake pudding carrot cake jujubes tiramisu chocolate cake.', 'Warning!', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
  });

  // Error Type
@if (session('error'))
    toastr['error']('👋 Jelly-o marshmallow marshmallow cotton candy dessert candy.', 'Error!', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
@endif

  // Close Toast On Button Click
  clearToastBtn.on('click', function () {
    if (!clearToastObj) {
      clearToastObj = toastr['info'](
        'Ready for the vacation?<br /><br /><button type="submit" class="btn btn-info btn-sm clear">Yes</button>',
        'Family Trip',
        {
          closeButton: true,
          timeOut: 0,
          extendedTimeOut: 0,
          tapToDismiss: false,
          rtl: isRtl
        }
      );
    }

    if (clearToastObj.find('.clear').length) {
      clearToastObj.delegate('.clear', 'click', function () {
        toastr.clear(clearToastObj, { force: true });
        clearToastObj = undefined;
      });
    }
  });

});
</script>
