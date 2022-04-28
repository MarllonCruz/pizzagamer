<div class="mce_upload" style="z-index: 997">
    <div class="mce_upload_box">
        <form class="app_form" action="{{ route('mce_uplaod') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="upload" value="true"/>
            <label>
                <label class="legend">Selecione uma imagem JPG ou PNG:</label>
                <span class="mce_response"></span>
                <input accept="image/*" type="file" name="image" required/>
            </label>
            <button class="btn btn-blue icon-upload">Enviar Imagem</button>
        </form>
    </div>
</div>