/**
 * @link http://dixonSatit.github.io
 * @author Satit Seethaphon <dixonSatit@gmail.com>
 * @since 1.0
 */
  yii.dixon = (function($) {
      var pub = {
          // whether this module is currently active. If false, init() will not be called for this module
          // it will also not be called for all its child modules. If this property is undefined, it means true.
          isActive: true,
          init: function() {
            this.load();
          },
          load:function(attribute){

            var $form = $('#w0');
            $("input[name='Employee[skill][]']").on('click',function(){
              console.log(getValue($('#w0'),'Employee[skill][]'));
            });


          }
      };

      var getValue = function ($form, attribute) {
           var $input = findInput($form, attribute);
           var type = $input.attr('type');
           if (type === 'checkbox' || type === 'radio') {
               var $realInput = $input.filter(':checked');
               if (!$realInput.length) {
                   $realInput = $form.find('input[type=hidden][name="' + $input.attr('name') + '"]');
               }
               return $realInput.val();
           } else {
               return $input.val();
           }
       };

       var findInput = function ($form, attribute) {
           var $input = $form.find(attribute.input);
           if ($input.length && $input[0].tagName.toLowerCase() === 'div') {
               // checkbox list or radio list
               return $input.find('input');
           } else {
               return $input;
           }
       };

      return pub;
  })(jQuery);
