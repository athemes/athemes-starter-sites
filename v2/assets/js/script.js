"use strict";

//
// Embed Drip API
//
var _dcq = _dcq || [];
var _dcs = _dcs || {};
_dcs.account = 5598225;
(function () {
  var dc = document.createElement('script');
  dc.type = 'text/javascript';
  dc.async = true;
  dc.src = '//tag.getdrip.com/' + _dcs.account + '.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(dc, s);
})();
//
// Demo Importer
//
(function ($) {
  'use strict';

  var $body = $('body');
  var atssTimer;
  var atssDemoItem;
  var atssTakenTime = 1;
  var atssDoneOrFail = false;
  var atssAjaxImportRecursive = function atssAjaxImportRecursive($form, steps, step) {
    step++;
    if (steps.length > step && steps[step]) {
      var importLog = steps[step].log || '';
      var importPer = Math.max(5, Math.round(100 / steps.length * step));
      $form.find('.atss-import-progress-label').html(importLog);
      $form.find('.atss-import-progress-sublabel').html(importPer + '%');
      $form.find('.atss-import-progress-indicator').attr('style', '--atss-indicator: ' + importPer + '%;');
      var nonce = window.atss_localize.nonce;
      var demo_id = $form.find('input[name="demo_id"]').val();
      var builder_type = $form.find('input[name="builder_type"]:checked').val();
      var content_type = $form.find('input[name="content_type"]:checked').val();

      var color_scheme = $form.find('input[name="atss_color_scheme"]').val();
      var logo = $form.find('input[name="atss_logo_url"]').val();
      var favicon = $form.find('input[name="atss_icon_url"]').val();
      

      var data = $.extend({
        nonce: nonce,
        demo_id: demo_id,
        builder_type: builder_type,
        content_type: content_type,
        color_scheme: color_scheme,
        logo: logo,
        favicon: favicon
      }, steps[step]);
      delete data.log;
      delete data.priority;
      $.post(window.atss_localize.ajax_url, data, function (response) {
        if (response.success) {
          if (response.status && response.status === 'newAJAX') {
            step--;
          }
          setTimeout(function () {
            atssAjaxImportRecursive($form, steps, step);
          }, 500);
        } else if (response.data) {
          $form.find('.atss-import-step-error').addClass('atss-active').siblings().removeClass('atss-active');
          $form.find('.atss-import-error-log').html(response.data);
          $body.removeClass('atss-import-in-progress');
        } else {
          var errorLog = window.atss_localize.i18n.import_failed;
          if (response) {
            errorLog += '<div class="atss-import-error-response">' + _.escape(response) + '</div>';
          }
          $form.find('.atss-import-step-error').addClass('atss-active').siblings().removeClass('atss-active');
          $form.find('.atss-import-error-log').html(errorLog);
          $body.removeClass('atss-import-in-progress');
        }
      }).fail(function () {
        $form.find('.atss-import-step-error').addClass('atss-active').siblings().removeClass('atss-active');
        $form.find('.atss-import-error-log').html(window.atss_localize.i18n.import_failed);
        $body.removeClass('atss-import-in-progress');
      });
    } else {
      $form.find('.atss-import-progress-label').html(window.atss_localize.i18n.import_finished);
      $form.find('.atss-import-progress-sublabel').html('100%');
      $form.find('.atss-import-progress-indicator').attr('style', '--atss-indicator: 100%;');

      // Tweet
      var tweetText = window.atss_localize.i18n.tweet_text.replace('{0}', atssTakenTime);
      $form.find('.atss-import-finish-tweet-text').html(tweetText);
      $form.find('.atss-import-finish-tweet-button').attr('href', 'https://twitter.com/intent/tweet?text=' + tweetText);
      setTimeout(function () {
        $form.find('.atss-import-step').removeClass('atss-active');
        $form.find('.atss-import-step-finish').addClass('atss-active');
        $body.removeClass('atss-import-in-progress');
      }, 250);
      atssDemoItem.addClass('atss-demo-item-imported').siblings().removeClass('atss-demo-item-imported');
      clearInterval(atssTimer);
      atssTakenTime = 1;
    }
    atssDoneOrFail = true;
  };
  $(document).ready(function () {
    // Dismissable
    var $notice = $('.atss-notice');
    if ($notice.length) {
      $notice.find('.notice-dismiss').on('click', function () {
        $notice.parent().hide();
        $.post(window.atss_localize.ajax_url, {
          action: 'atss_dismissed_handler',
          nonce: window.atss_localize.nonce
        });
      });
    }

    // Demos
    var $atss = $('.atss');
    if ($atss.length) {
      var $demos = $atss.find('.atss-demo-item');
      var $import = $atss.find('.atss-import');
      var $preview = $atss.find('.atss-preview');
      var demoIndex;
      $atss.on('click', '.atss-demo-preview-button', function (e) {
        e.preventDefault();
        var $button = $(this);
        var $demo = $button.closest('.atss-demo-item');
        var demoObj = {
          preview: $button.attr('href'),
          info: $demo.find('.atss-demo-info').html(),
          actions: $demo.find('.atss-demo-actions').html()
        };
        if ($body.hasClass('atss-preview-show')) {
          $preview.find('.atss-preview-iframe').attr('src', demoObj.preview);
          $preview.find('.atss-preview-header-info').html(demoObj.info);
          $preview.find('.atss-preview-header-actions').html(demoObj.actions);
        } else {
          var template = wp.template('atss-preview');
          $preview.html(template(demoObj));
        }
        $body.addClass('atss-preview-show');
        demoIndex = $demo.index();
        $atss.trigger('atss-nav-click', [demoIndex]);
      });
      $atss.on('click', '.atss-preview-header-arrow-prev', function (e) {
        e.preventDefault();
        if (!$(this).hasClass('atss-disabled')) {
          demoIndex--;
          $demos.eq(demoIndex).find('.atss-demo-preview-button').trigger('click');
        }
      });
      $atss.on('click', '.atss-preview-header-arrow-next', function (e) {
        e.preventDefault();
        if (!$(this).hasClass('atss-disabled')) {
          demoIndex++;
          $demos.eq(demoIndex).find('.atss-demo-preview-button').trigger('click');
        }
      });
      $atss.on('click', '.atss-preview-cancel-button', function (e) {
        e.preventDefault();
        $body.removeClass('atss-preview-show');
        $preview.empty();
      });
      $atss.on('atss-nav-click', function (e, index) {
        var $prev = $atss.find('.atss-preview-header-arrow-prev');
        var $next = $atss.find('.atss-preview-header-arrow-next');
        if (index === 0) {
          $prev.addClass('atss-disabled');
          $next.removeClass('atss-disabled');
        } else if ($demos.length - 1 === index) {
          $next.addClass('atss-disabled');
          $prev.removeClass('atss-disabled');
        } else {
          $next.removeClass('atss-disabled');
          $prev.removeClass('atss-disabled');
        }
      });
      $atss.on('click', '.atss-import-open-button', function (e) {
        e.preventDefault();
        var demoId = $(this).data('demo-id');
        var colorScheme = $(this).data('color-scheme');
        var demoObj = window.atss_localize.demos[demoId];
        var template = wp.template('atss-import');
        if (demoObj && demoObj.builders.length) {
          atssDemoItem = $(this).closest('.atss-demo-item');

          // create args object
          demoObj.args = {};
          demoObj.args.demoId = demoId;
          demoObj.args.colorScheme = colorScheme;
          demoObj.args.quick = $(this).data('quick') || demoObj.builders.length < 2 || false;
          demoObj.args.builder = $(this).data('builder') || demoObj.builders[0];
          demoObj.args.imported = window.atss_localize.imported || atssDoneOrFail;
          $atss.find('.atss-import').html(template(demoObj));
          $body.addClass('atss-import-show');
        }
 
        // send message to iframe
          var sendPalette = function(paletteValues) {
              var frame = document.getElementById('atss-demo-frame').contentWindow;
     
              var params = {
                  command: 'changeColorPalette',
                  palette: paletteValues,
              };
      
              frame.postMessage(JSON.stringify(params), '*');
          };
  
          // init color picker
          var colorPickers = document.querySelectorAll('.atss-color-picker');
          var paletteInputs = document.querySelectorAll('.atss-color-picker-input');
          var paletteValues = [];
      
          paletteInputs.forEach(function(input, index) {
              input.setAttribute('data-index', index);
      
              input.addEventListener('change', function() {
                  var inputIndex = input.getAttribute('data-index');
                  paletteValues[inputIndex] = input.value;
                  sendPalette(paletteValues);
              });
          });
      
          colorPickers.forEach(function(wrapper) {
              const pickr = Pickr.create({
                  el: wrapper.querySelector('.pickr-holder'),
                  theme: 'atss',
                  default: wrapper.querySelector('.atss-color-picker-input').value,
                  sliders: 'h',
                  swatches: [],
                  components: {
                      preview: true,
                      opacity: true,
                      hue: true,
                      interaction: {
                          hex: true,
                          rgba: true,
                          input: true,
                          clear: true,
                          save: false
                      }
                  }
              });
      
              pickr.on('change', function (color) {
                  var colorCode;
      
                  if (color.a === 1) {
                      pickr.setColorRepresentation('HEX');
                      colorCode = color.toHEXA().toString(0);
                  } else {
                      pickr.setColorRepresentation('RGBA');
                      colorCode = color.toRGBA().toString(0);
                  }
      
                  var input = wrapper.querySelector('.atss-color-picker-input');
                  input.value = colorCode;
                  input.dispatchEvent(new Event('change'));
      
                  //get the button
                  var button = wrapper.querySelector('.pcr-button');
                  //set the background color
                  button.style.backgroundColor = colorCode;
              });

              var resetButton = wrapper.parentElement.parentElement.parentElement.querySelector('.atss-import-reset-button');

              resetButton.addEventListener('click', function() {
                  pickr.setColor(wrapper.querySelector('.atss-color-picker-input').getAttribute('data-default'));
              });

          });        
      });

      var sendLogo = function(logo) {
        var frame = document.getElementById('atss-demo-frame').contentWindow;

        var params = {
            command: 'changeLogo',
            logo: logo,
        };

        frame.postMessage(JSON.stringify(params), '*');
    };

      $atss.on('click', '.atss-media-button', function (e) {
        e.preventDefault();
        var mediaUploader;
        
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            frame: 'post',
            state: 'insert',
            multiple: false
        });

        mediaUploader.on('insert', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            
            //if has class atss-logo-upload-button
            if ($(e.target).hasClass('atss-logo-upload-button')) {
                $('.atss-logo-upload-input').val(attachment.url);
                sendLogo(attachment.url);
            } else {
                $('.atss-icon-upload-input').val(attachment.url);
            }
        });

        mediaUploader.open();
      });

      $atss.on('click', '.atss-import-close-button', function (e) {
        e.preventDefault();
        $body.removeClass('atss-import-show');
      });
      $atss.on('click', '.atss-import-toggle-button', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('atss-active');
      });
      $atss.on('click', '.atss-import-prev-button', function (e) {
        e.preventDefault();
        var $step = $(this).closest('.atss-import-step');
        $step.removeClass('atss-active');
        $step.prev().addClass('atss-active');
      });
$atss.on('click', '.atss-import-next-button', function (e) {
  e.preventDefault();
  var $step = $(this).closest('.atss-import-step');
  $step.removeClass('atss-active');
  $step.next().addClass('atss-active');

  if ($(this).hasClass('atss-import-customize-button')) {
    $atss.find('.atss-import-form').addClass('atss-import-form-customize');
  } else {
    $atss.find('.atss-import-form').removeClass('atss-import-form-customize');
  }

  var $form = $atss.find('.atss-import-form');

if ($(this).hasClass('atss-import-save-custom-data-button')) {
    e.preventDefault();
    
    var nonce = window.atss_localize.nonce;
    var $colorPickerInputs = $form.find('.atss-color-picker-input');

    var color_scheme = [];
    $colorPickerInputs.each(function () {
        color_scheme.push($(this).val());
    });    
	var logo = $form.find('input[name="atss_logo_url"]').val();
    var favicon = $form.find('input[name="atss_icon_url"]').val();

    $.ajax({
        url: window.atss_localize.ajax_url,
        data: {
            action: 'save_atss_custom_data',
            nonce: nonce,
            color_scheme: color_scheme,
            logo: logo,
            favicon: favicon
        },
        method: 'POST', // POST method
        success: function (response) {
            console.log(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
}
});

      $atss.on('click', '.atss-import-skip-button', function (e) {
        e.preventDefault();
        var $step = $(this).closest('.atss-import-step');
        $step.removeClass('atss-active');
        $step.next().next().addClass('atss-active');
       
      });

      $atss.on('change', '.atss-import-builder-select input', function (e) {
        $atss.find('.atss-import-plugin-builder').addClass('atss-hidden');
        $atss.find('.atss-import-plugin-builder input').prop('checked', false);
        if ($(this).is(':checked')) {
          var $builder = $atss.find('.atss-import-plugin-' + $(this).data('builder-plugin'));
          $builder.removeClass('atss-hidden');
          $builder.find('input').prop('checked', true);
        }
      });
      $atss.on('click', '.atss-import-with-content-type', function () {
        var isChecked = true;
        $('.atss-import-with-content-type').each(function () {
          if (!$(this).is(':checked')) {
            isChecked = false;
          }
        });
        if (isChecked) {
          $atss.find('.atss-import-content-select').removeClass('atss-hidden');
        } else {
          $atss.find('.atss-import-content-select').addClass('atss-hidden');
        }
      });
      $atss.on('click', '.atss-import-start-button', function (e) {
        e.preventDefault();
        var $form = $atss.find('.atss-import-form');
        if ($(this).data('subscribe')) {
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var $email = $form.find('.atss-import-subscribe-field-email');
          var emailValue = $email.val();
          if (!regex.test(emailValue)) {
            $email.addClass('atss-error').attr('placeholder', window.atss_localize.i18n.invalid_email).val('');
            return;
          }

          // send email to drip on theme name tag.
          _dcq.push(["identify", {
            email: emailValue,
            tags: [window.atss_localize.theme_name]
          }]);
        }
        var $step = $(this).closest('.atss-import-step');
        $step.removeClass('atss-active');
        $step.next().addClass('atss-active');

        // Import Plugins
        var steps = [];
        var $inputs = $form.find('input[data-action]');
        $inputs.each(function (index) {
          if ($(this).is(':checked') || $(this).is('[type="hidden"]')) {
            steps.push($(this).data());
          }
        });

        // Set Priority
        steps = steps.sort(function (a, b) {
          return a.priority - b.priority;
        });
        atssTakenTime = 1;
        atssTimer = setInterval(function () {
          atssTakenTime++;
        }, 1000);
        $body.addClass('atss-import-in-progress');
        atssAjaxImportRecursive($form, steps, -1);
      });
    }
  });

})(jQuery);