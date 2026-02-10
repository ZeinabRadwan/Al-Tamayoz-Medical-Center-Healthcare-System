@extends('layouts.app')

@section('content')
<style>
    :root {
        --green: #73C36A;
        --purple: #9C80D7;
        --gray: #C0C0C0;
        --white: #FFF;
    }

    .page-title {
        color: var(--purple);
        font-size: 2rem;
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 1rem;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: var(--green);
        border-radius: 2px;
    }

    .tab-container {
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    .tabs {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 1.5rem;
    }

    .tab-button {
        padding: 0.75rem 1.5rem;
        background: var(--gray);
        border: none;
        border-radius: 99px;
        color: #333;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        margin: 0 auto;
    }

    .tab-button.active {
        background: var(--purple);
        color: var(--white);
    }

    .tab-button:hover {
        background: var(--green);
        color: var(--white);
    }

    .tab-content {
        display: none;
        background: var(--white);
        padding: 2rem;
        border-radius: 10px;
        border: 2px solid var(--gray);
    }

    .tab-content.active {
        display: block;
    }

    .form-label {
        color: #333;
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid var(--gray);
        border-radius: 8px;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--purple);
        box-shadow: 0 0 0 3px rgba(156, 128, 215, 0.2);
        outline: none;
    }

    .submit-btn {
        background: var(--green);
        color: var(--white);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .submit-btn:hover {
        background: #5fa357;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(115, 195, 106, 0.3);
    }

    .image-upload {
        border: 2px dashed var(--gray);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 1rem;
    }

    .image-upload:hover {
        border-color: var(--green);
        background: rgba(115, 195, 106, 0.1);
    }

    .preview-image {
        max-width: 200px;
        max-height: 200px;
        margin-top: 1rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    a {
        text-decoration: none;
    }
</style>

<div class="container">
    <div class="blog-container">
        <h1>إدارة المحتوى</h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="tab-container">
            <div class="tabs">
                <button class="tab-button active" onclick="openTab(event, 'about')">من نحن</button>
                <button class="tab-button" onclick="openTab(event, 'contact')">اتصل بنا</button>
                <button class="tab-button" onclick="openTab(event, 'physical')">العلاج الطبيعي</button>
                <button class="tab-button" onclick="openTab(event, 'occupational')">العلاج الوظيفي</button>
                <button class="tab-button" onclick="openTab(event, 'speech')">علاج النطق</button>
                <button class="tab-button" onclick="openTab(event, 'behavior')">تحليل السلوك</button>
                <a href="{{route('blogs.create')}}" class="tab-button">انشاء مقال</a>
                <a href="{{route('setting.main_img')}}" class="tab-button">
                    تحديث الصورة الرئيسية
                </a>
                <a href="{{route('setting.gallary')}}" class="tab-button">
                    معرض الصور
                </a>
            </div>

            <div id="about" class="tab-content active">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="about_us" class="form-label">محتوى من نحن:</label>
                        <textarea name="about_us" id="about_us" class="form-control">{{ $settings->about_us ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="submit-btn">حفظ التغييرات</button>
                </form>
            </div>

            <div id="contact" class="tab-content">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="contact_us" class="form-label">محتوى اتصل بنا:</label>
                        <textarea name="contact_us" id="contact_us" class="form-control">{{ $settings->contact_us ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="submit-btn">حفظ التغييرات</button>
                </form>
            </div>

            <div id="physical" class="tab-content">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="physical_therapy" class="form-label">محتوى العلاج الطبيعي:</label>
                        <textarea name="physical_therapy" id="physical_therapy" class="form-control">{{ $settings->physical_therapy ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="submit-btn">حفظ التغييرات</button>
                </form>
            </div>

            <div id="occupational" class="tab-content">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="occupational_therapy" class="form-label">محتوى العلاج الوظيفي:</label>
                        <textarea name="occupational_therapy" id="occupational_therapy" class="form-control">{{ $settings->occupational_therapy ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="submit-btn">حفظ التغييرات</button>
                </form>
            </div>

            <div id="speech" class="tab-content">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="speech_therapy" class="form-label">محتوى علاج النطق:</label>
                        <textarea name="speech_therapy" id="speech_therapy" class="form-control">{{ $settings->speech_therapy ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="submit-btn">حفظ التغييرات</button>
                </form>
            </div>

            <div id="behavior" class="tab-content">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="behavior_analysis" class="form-label">محتوى تحليل السلوك:</label>
                        <textarea name="behavior_analysis" id="behavior_analysis" class="form-control">{{ $settings->behavior_analysis ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="submit-btn">حفظ التغييرات</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    function openTab(evt, tabName) {
        var i, tabContent, tabButtons;

        tabContent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabContent.length; i++) {
            tabContent[i].style.display = "none";
        }

        tabButtons = document.getElementsByClassName("tab-button");
        for (i = 0; i < tabButtons.length; i++) {
            tabButtons[i].className = tabButtons[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    const editorIds = [
        'about_us',
        'contact_us',
        'physical_therapy',
        'occupational_therapy',
        'speech_therapy',
        'behavior_analysis'
    ];

    editorIds.forEach(id => {
        CKEDITOR.replace(id, {
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
    });

    setTimeout(function() {
        const alertElement = document.querySelector('.alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 2000);
</script>
@endsection