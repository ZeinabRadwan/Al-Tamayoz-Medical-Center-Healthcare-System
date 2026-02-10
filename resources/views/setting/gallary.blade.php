@extends('layouts.app')
@section('content')
<style>
    :root {
        --green: #73C36A;
        --purple: #9C80D7;
        --gray: #C0C0C0;
        --white: #FFF;
    }

    .gallery-upload-container {
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-top: 2rem;
    }

    .gallery-title {
        color: var(--purple);
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        border-right: 4px solid var(--green);
        padding-right: 1rem;
    }

    .dropzone {
        border: 3px dashed var(--gray);
        border-radius: 12px;
        padding: 2.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: rgba(192, 192, 192, 0.1);
        position: relative;
    }

    .dropzone:hover {
        border-color: var(--green);
        background: rgba(115, 195, 106, 0.1);
    }

    .dropzone-icon {
        font-size: 3rem;
        color: var(--purple);
        margin-bottom: 1rem;
    }

    .dropzone-text {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .dropzone-subtext {
        color: var(--gray);
        font-size: 0.9rem;
    }

    .gallery-upload-btn {
        background: var(--green);
        color: var(--white);
        border: none;
        padding: 1rem 2rem;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1.5rem;
        width: 100%;
        max-width: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .gallery-upload-btn:hover {
        background: #5fa357;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(115, 195, 106, 0.3);
    }

    .upload-preview {
        margin-top: 1.5rem;
        display: none;
        text-align: center;
    }

    .preview-image {
        max-width: 200px;
        max-height: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .file-input {
        display: none;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .gallery-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        aspect-ratio: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: translateY(-3px);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .delete-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
        color: #ff4444;
    }

    .gallery-item:hover .delete-btn {
        opacity: 1;
    }

    .delete-btn:hover {
        background: #ff4444;
        color: white;
    }

    .preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .preview-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        aspect-ratio: 1;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .remove-preview {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
        color: #ff4444;
    }

    .gallery-section-title {
        color: var(--purple);
        font-size: 1.5rem;
        margin: 2rem 0 1rem;
        border-right: 4px solid var(--green);
        padding-right: 1rem;
    }

    @media (max-width: 768px) {
        .gallery-upload-container {
            padding: 1.5rem;
        }

        .dropzone {
            padding: 1.5rem;
        }
    }
</style>
<div class="container">

    <div class="gallery-upload-container">
        <h3 class="gallery-title">معرض الصور</h3>

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

        <form action="{{ route('settings.gallery_images.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="dropzone" id="dropzone">
                <div class="dropzone-icon">🖼️</div>
                <p class="dropzone-text">اسحب وأفلت الصور هنا</p>
                <p class="dropzone-subtext">أو انقر لاختيار صور متعددة</p>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="file" name="gallery_images[]" id="gallery_image" class="file-input" required accept="image/*" multiple>
            </div>

            <div class="preview-grid" id="preview-grid"></div>

            <div style="text-align: center;">
                <button type="submit" class="gallery-upload-btn">
                    <span>إضافة للمعرض</span>
                    <span>📤</span>
                </button>
            </div>
        </form>
    </div>

    <div class="gallery-upload-container">
        <h3 class="gallery-section-title">الصور الحالية</h3>
        <div class="gallery-grid">
            @if(is_array($settings->gallery_images))
            @foreach($settings->gallery_images as $index => $image)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image">
                <button type="button"
                    class="delete-btn"
                    onclick="deleteImage({{ $index }})"
                    data-index="{{ $index }}">×</button>
            </div>
            @endforeach
            @endif
        </div>

        <script>
            function deleteImage(index) {
                if (confirm('هل أنت متأكد من حذف هذه الصورة؟')) {
                    fetch(`/settings/gallery/${index}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const imageElement = document.querySelector(`.gallery-item [data-index="${index}"]`).parentElement;
                                imageElement.remove();
                            } else {
                                alert('Error deleting image');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error deleting image', error);
                        });
                }
            }

            setTimeout(function() {
                const alertElement = document.querySelector('.alert');
                if (alertElement) {
                    alertElement.remove();
                }
            }, 2000);
        </script>
    </div>
</div>

<script>
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('gallery_image');
    const previewGrid = document.getElementById('preview-grid');

    dropzone.addEventListener('click', () => fileInput.click());

    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.style.borderColor = '#73C36A';
    });

    dropzone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropzone.style.borderColor = '#C0C0C0';
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        const files = e.dataTransfer.files;
        if (files.length) {
            fileInput.files = files;
            showPreviews(files);
        }
    });

    fileInput.addEventListener('change', (e) => {
        if (e.target.files.length) {
            showPreviews(e.target.files);
        }
    });

    function showPreviews(files) {
        previewGrid.innerHTML = '';
        Array.from(files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                const previewItem = document.createElement('div');
                previewItem.className = 'preview-item';

                reader.onload = (e) => {
                    previewItem.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <button type="button" class="remove-preview" data-index="${index}">×</button>
                    `;
                };

                reader.readAsDataURL(file);
                previewGrid.appendChild(previewItem);
            }
        });

        dropzone.querySelector('.dropzone-text').textContent = `${files.length} صور مختارة`;
        dropzone.querySelector('.dropzone-subtext').textContent = 'انقر لتغيير الصور';

        setTimeout(() => {
            document.querySelectorAll('.remove-preview').forEach(button => {
                button.addEventListener('click', function() {
                    const index = parseInt(this.dataset.index);
                    const dt = new DataTransfer();
                    const files = fileInput.files;

                    for (let i = 0; i < files.length; i++) {
                        if (i !== index) dt.items.add(files[i]);
                    }

                    fileInput.files = dt.files;
                    showPreviews(fileInput.files);
                });
            });
        }, 100);
    }
</script>
@endsection