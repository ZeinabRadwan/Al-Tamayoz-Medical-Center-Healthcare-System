@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center"> تعديل مدونة </h1>
    <form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">العنوان:</label>
            <input type="text" name="title"
                value="{{ $blog->title }}"
                id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">المحتوى:</label>
            <textarea name="content" id="content"
                class="form-control" required>
            {{ $blog->content }}
            </textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">الصورة:</label>
            <input type="file" name="image" id="image"
                value="{{ $blog->image }}"
                class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">إنشاء</button>
    </form>
</div>

<script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        language: 'ar',
        extraPlugins: 'colorbutton,colordialog,font,uploadimage',
        toolbar: [{
                name: 'document',
                items: ['Source', '-', 'NewPage', 'Preview']
            },
            {
                name: 'clipboard',
                items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo']
            },
            {
                name: 'editing',
                items: ['Find', 'Replace', '-', 'SelectAll']
            },
            '/',
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
            },
            {
                name: 'links',
                items: ['Link', 'Unlink']
            },
            {
                name: 'insert',
                items: ['Table', 'HorizontalRule', 'SpecialChar']
            },
            '/',
            {
                name: 'styles',
                items: ['Styles', 'Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor']
            },
            {
                name: 'tools',
                items: ['Maximize', '-', 'UploadImage']
            }
        ],
        font_defaultLabel: 'Arial',
        font_names: 'Arial;Tahoma;Verdana;Courier New;Comic Sans MS',
        contentsLangDirection: 'rtl',
        filebrowserUploadMethod: 'form',
        removeDialogTabs: 'image:advanced;link:advanced',
    });
</script>

@endsection