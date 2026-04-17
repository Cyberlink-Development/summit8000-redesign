var editor_config = {
  path_absolute: "/",
  selector: 'textarea.my-editor',
  relative_urls: false,
  plugins: 'code table lists advlist charmap emoticons fullscreen hr image insertdatetime link media nonbreaking pagebreak paste preview print searchreplace spellchecker tabfocus toc visualblocks visualchars wordcount fontfamily fontsize style',
  toolbar: 'undo redo | blocks | bold italic underline removeformat | fontfamily fontsize style | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | link unlink image media code hr | table fullscreen insertdatetime',
  toolbar_mode: 'sliding',
  force_br_newlines: false,
  force_p_newlines: false,
  forced_root_block: 'p',
  cleanup: true,
  remove_linebreaks: true,
  convert_newlines_to_brs: false,
  inline_styles: false,
  entity_encoding: 'raw',
  paste_auto_cleanup_on_paste: true,
  entities: '160,nbsp,38,amp,60,lt,62,gt',
  valid_elements: '*[*]',
  invalid_attributes: 'class',

  file_picker_callback: function (callback, value, meta) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
      'body')[0].clientWidth;
    var y = window.innerHeight || document.documentElement.clientHeight || document
      .getElementsByTagName('body')[0].clientHeight;

    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
    if (meta.filetype == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.openUrl({
      url: cmsURL,
      title: 'Filemanager',
      width: x * 0.8,
      height: y * 0.8,
      resizable: "yes",
      close_previous: "no",
      onMessage: (api, message) => {
        callback(message.content);
      }
    });
  }
};

tinymce.init(editor_config);