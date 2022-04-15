@extends('adm.common.template')

@section('content')
   <section class="article-post">
      <h2>Artigos</h2>

      <div class="content">
         <div class="left">
            @include('adm.posts.common.menu', ['menu', $menu])
         </div>
         <div class="right post">
            <header>
               <h2><i class="fa-solid fa-square-plus"></i>Nova Artigo</h2>
               <area />
            </header>

            <form action="{{ route('artigos.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <label for="title">*Titulo</label>
               <input type="text" name="title" placeholder=" Titulo" 
                  value="{{ old('title') }}" @error('title') class="is-invalid" @enderror>
               @error('title')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror
               
               <label for="description">*Descrição</label>
               <input type="text" name="description" placeholder=" Descrição" 
                  value="{{ old('description') }}"  @error('description') class="is-invalid" @enderror>
               @error('description')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="form-group">
                    <div class="form">
                        <label for="category_id">*Categoria</label>
                        <select name="category_id" id="category_id" @error('category_id') class="is-invalid" @enderror>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form">
                        <label for="description">Data de estreia</label>
                        <input type="date"  name="opening_at"
                            value="{{ old('opening_at') }}">
                    </div>

                    <div class="form">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active" selected>Ativo</option>
                            <option value="draft">Rascunho</option>
                            <option value="trash">Lixo</option>
                        </select>
                    </div>
               </div>

               <label for="cover">*Capa</label>
               <input type="file" name="cover">
               @error('cover')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <label>*Conteúdo</label>
               <textarea name="content" class="mce"></textarea>
                @error('content')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Criar Artigo</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection

@section('script')
    <script src="{{ url("assets/js/tinymce/tinymce.min.js") }}"></script> 
    <script>
    // TinyMCE INIT
    tinyMCE.init({
        selector: "textarea.mce",
        language: 'pt_BR',
        menubar: false,
        theme: "modern",
        height: 132,
        skin: 'light',
        entity_encoding: "raw",
        theme_advanced_resizing: true,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor media"
        ],
        toolbar: "styleselect | pastetext | removeformat |  bold | italic | underline | strikethrough | bullist | numlist | alignleft | aligncenter | alignright |  link | unlink | fsphpimage | code | fullscreen",
        style_formats: [
            {title: 'Normal', block: 'p'},
            {title: 'Titulo 3', block: 'h3'},
            {title: 'Titulo 4', block: 'h4'},
            {title: 'Titulo 5', block: 'h5'},
            {title: 'Código', block: 'pre', classes: 'brush: php;'}
        ],
        link_class_list: [
            {title: 'None', value: ''},
            {title: 'Blue CTA', value: 'btn btn_cta_blue'},
            {title: 'Green CTA', value: 'btn btn_cta_green'},
            {title: 'Yellow CTA', value: 'btn btn_cta_yellow'},
            {title: 'Red CTA', value: 'btn btn_cta_red'}
        ],
        setup: function (editor) {
            editor.addButton('fsphpimage', {
                title: 'Enviar Imagem',
                icon: 'image',
                onclick: function () {
                    $('.mce_upload').fadeIn(200, function (e) {
                        $("body").click(function (e) {
                            if ($(e.target).attr("class") === "mce_upload") {
                                $('.mce_upload').fadeOut(200);
                            }
                        });
                    }).css("display", "flex");
                }
            });
        },
        link_title: false,
        target_list: false,
        theme_advanced_blockformats: "h1,h2,h3,h4,h5,p,pre",
        media_dimensions: false,
        media_poster: false,
        media_alt_source: false,
        media_embed: false,
        extended_valid_elements: "a[href|target=_blank|rel|class]",
        imagemanager_insert_template: '<img src="{$url}" title="{$title}" alt="{$title}" />',
        image_dimensions: false,
        relative_urls: false,
        remove_script_host: false,
        paste_as_text: true
    });

    // Action Upload Image TinyMCE
    $(".app_form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var load = $(".ajax_load");
        
        if (typeof tinyMCE !== 'undefined') {
            tinyMCE.triggerSave();
        }

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $(".mce_response").html('');
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //image by fsphp mce upload
                if (response.mce_image) {
                    $('.mce_upload').fadeOut(200);
                    tinyMCE.activeEditor.insertContent(response.mce_image);
                    form.find("input[type='file']").val(null);
                    load.fadeOut(200);
                }
            },
            complete: function () {
                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            },
            error: function (response) {
                if (response.responseJSON.errors) {
                    $(".mce_response").html('Arquivo foi invalido').effect("bounce");
                    load.fadeOut(200);
                }
            }
        });
    });
    </script>
@endsection