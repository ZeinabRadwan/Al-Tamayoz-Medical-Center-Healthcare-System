  @extends('layouts.app')
  @section('content')
  <style>
      :root {
          --green: #73C36A;
          --purple: #9C80D7;
          --gray: #C0C0C0;
          --white: #FFF;
          --light-purple: rgba(156, 128, 215, 0.1);
          --light-green: rgba(115, 195, 106, 0.1);
      }

      body {
          background: linear-gradient(135deg, var(--light-purple), var(--light-green));
          font-family: 'Tahoma', sans-serif;
          min-height: 100vh;
      }

      .container {
          /* max-width: 800px; */
          margin: 2rem auto;
          padding: 2.5rem;
          background: var(--white);
          border-radius: 20px;
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      }

      h1 {
          color: var(--purple);
          font-size: 2.5rem;
          margin-bottom: 2.5rem;
          text-align: center;
          position: relative;
      }

      h1::after {
          content: '';
          display: block;
          width: 120px;
          height: 4px;
          background: linear-gradient(to right, var(--purple), var(--green));
          margin: 0.5rem auto;
          border-radius: 2px;
      }

      .form-label {
          color: var(--purple);
          font-weight: bold;
          font-size: 1.2rem;
          margin-bottom: 0.75rem;
          display: block;
      }

      .form-control {
          border: 2px solid var(--gray);
          border-radius: 12px;
          padding: 1rem;
          width: 100%;
          transition: all 0.3s ease;
          margin-bottom: 1.5rem;
          font-size: 1.1rem;
      }

      .form-control:focus {
          outline: none;
          border-color: var(--purple);
          box-shadow: 0 0 0 4px rgba(156, 128, 215, 0.15);
      }

      .custom-file-upload {
          border: 2px dashed var(--gray);
          border-radius: 12px;
          padding: 2rem;
          text-align: center;
          cursor: pointer;
          transition: all 0.3s ease;
          background: var(--white);
          margin-bottom: 1.5rem;
      }

      .custom-file-upload:hover {
          border-color: var(--green);
          background: var(--light-green);
      }

      .upload-icon {
          font-size: 3rem;
          margin-bottom: 1rem;
          color: var(--purple);
      }

      .upload-icon i {
          transition: transform 0.3s ease;
      }

      .custom-file-upload:hover .upload-icon i {
          transform: scale(1.1);
      }

      .custom-file-upload p {
          color: #666;
          margin: 0.5rem 0;
          font-size: 1rem;
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

      .cke_chrome {
          border: 2px solid var(--gray) !important;
          border-radius: 12px !important;
          overflow: hidden;
      }

      .cke_top {
          background: var(--white) !important;
          border-bottom: 1px solid var(--gray) !important;
          padding: 8px !important;
      }

      .cke_button {
          padding: 6px !important;
      }

      .cke_button:hover {
          background-color: var(--light-purple) !important;
          border-radius: 6px !important;
      }

      .mb-3 {
          margin-bottom: 1.5rem;
      }

      .form-control:valid {
          border-color: var(--green);
      }

      .form-control:invalid:not(:placeholder-shown) {
          border-color: #ff6b6b;
      }

      .blogs-section {
          margin-top: 4rem;
          padding-top: 2rem;
          border-top: 2px solid var(--gray);
      }

      .blogs-section h2 {
          color: var(--purple);
          font-size: 2rem;
          margin-bottom: 2rem;
          text-align: center;
      }

      .blog-card {
          background: var(--white);
          border: 1px solid var(--gray);
          border-radius: 12px;
          padding: 1.5rem;
          margin-bottom: 1.5rem;
          transition: all 0.3s ease;
          position: relative;
          overflow: hidden;
      }

      .blog-card:hover {
          transform: translateY(-3px);
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .blog-card img {
          width: 100%;
          height: 200px;
          object-fit: cover;
          border-radius: 8px;
          margin-bottom: 1rem;
      }

      .blog-title {
          color: var(--purple);
          font-size: 1.3rem;
          font-weight: bold;
          margin-bottom: 0.5rem;
      }

      .blog-content {
          color: #666;
          margin-bottom: 1rem;
          line-height: 1.6;
          max-height: 80px;
          overflow: hidden;
          text-overflow: ellipsis;
      }

      .blog-actions {
          display: flex;
          gap: 1rem;
          margin-top: 1rem;
      }

      .edit-btn,
      .delete-btn {
          padding: 0.5rem 1rem;
          border-radius: 6px;
          border: none;
          cursor: pointer;
          transition: all 0.3s ease;
          font-weight: 600;
          display: flex;
          align-items: center;
          gap: 0.5rem;
      }

      .edit-btn {
          background: var(--light-purple);
          color: var(--purple);
      }

      .edit-btn:hover {
          background: var(--purple);
          color: var(--white);
      }

      .delete-btn {
          background: #ffebee;
          color: #ff5252;
      }

      .delete-btn:hover {
          background: #ff5252;
          color: var(--white);
      }

      .no-blogs {
          text-align: center;
          padding: 2rem;
          color: #666;
          font-style: italic;
      }

      .blog-meta {
          display: flex;
          align-items: center;
          gap: 1rem;
          color: #666;
          font-size: 0.9rem;
          margin-bottom: 1rem;
      }

      .blog-meta i {
          color: var(--purple);
      }

      .blogs-section {
          margin-top: 4rem;
          padding-top: 2rem;
          border-top: 2px solid var(--gray);
          max-width: 1200px;
          margin-left: auto;
          margin-right: auto;
      }

      .blogs-section h2 {
          color: var(--purple);
          font-size: 2rem;
          margin-bottom: 2.5rem;
          text-align: center;
          position: relative;
      }

      .blogs-section h2::after {
          content: '';
          position: absolute;
          bottom: -10px;
          left: 50%;
          transform: translateX(-50%);
          width: 120px;
          height: 4px;
          background: linear-gradient(to right, var(--purple), var(--green));
          border-radius: 2px;
      }

      .blog-card {
          background: var(--white);
          border: 1px solid var(--gray);
          border-radius: 15px;
          padding: 2rem;
          margin-bottom: 2rem;
          transition: all 0.3s ease;
          position: relative;
          width: 100%;
          max-width: 900px;
          margin-left: auto;
          margin-right: auto;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
          display: grid;
          grid-template-columns: 300px 1fr;
          gap: 2rem;
          align-items: start;
      }

      .blog-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
      }

      .blog-card-image {
          width: 100%;
          height: 250px;
          object-fit: cover;
          border-radius: 12px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .blog-card-content {
          flex: 1;
      }

      .blog-title {
          color: var(--purple);
          font-size: 1.5rem;
          font-weight: bold;
          margin-bottom: 1rem;
          line-height: 1.4;
      }

      .blog-meta {
          display: flex;
          align-items: center;
          gap: 1.5rem;
          margin-bottom: 1.5rem;
          color: #666;
          font-size: 0.95rem;
      }

      .blog-meta i {
          color: var(--green);
          margin-left: 0.5rem;
      }

      .blog-content {
          color: #444;
          line-height: 1.8;
          margin-bottom: 1.5rem;
          font-size: 1.1rem;
      }

      .blog-actions {
          display: flex;
          gap: 1rem;
          margin-top: 1.5rem;
      }

      .edit-btn,
      .delete-btn {
          padding: 0.75rem 1.5rem;
          border-radius: 8px;
          border: none;
          cursor: pointer;
          transition: all 0.3s ease;
          font-weight: 600;
          display: flex;
          align-items: center;
          gap: 0.75rem;
          font-size: 1rem;
      }

      .edit-btn {
          background: var(--light-purple);
          color: var(--purple);
      }

      .edit-btn:hover {
          background: var(--purple);
          color: var(--white);
          transform: translateY(-2px);
      }

      .delete-btn {
          background: #fff2f2;
          color: #ff4444;
      }

      .delete-btn:hover {
          background: #ff4444;
          color: var(--white);
          transform: translateY(-2px);
      }

      .no-blogs {
          text-align: center;
          padding: 3rem;
          background: var(--white);
          border-radius: 15px;
          border: 2px dashed var(--gray);
          margin: 2rem auto;
          max-width: 600px;
      }

      .no-blogs i {
          font-size: 4rem;
          color: var(--gray);
          margin-bottom: 1.5rem;
          display: block;
      }

      .no-blogs p {
          font-size: 1.2rem;
          color: #666;
      }

      @media (max-width: 768px) {
          .blog-card {
              grid-template-columns: 1fr;
              padding: 1.5rem;
          }

          .blog-card-image {
              height: 200px;
              margin-bottom: 1.5rem;
          }
      }
  </style>
  </head>

  <body>
      <div class="container">
          <h1>إنشاء مدونة</h1>
          @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @endif
          @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
          @endif
          <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="title" class="form-label">
                      <i class="fas fa-heading ml-2"></i>
                      العنوان:
                  </label>
                  <input type="text" name="title" id="title" class="form-control" required placeholder="أدخل عنوان المدونة">
              </div>

              <div class="mb-3">
                  <label for="content" class="form-label">
                      <i class="fas fa-pen-fancy ml-2"></i>
                      المحتوى:
                  </label>
                  <textarea name="content" id="content" class="form-control" required placeholder="أدخل محتوى المدونة"></textarea>
              </div>

              <div class="mb-3">
                  <label class="form-label">
                      <i class="fas fa-image ml-2"></i>
                      الصورة:
                  </label>
                  <div class="custom-file-upload" onclick="document.getElementById('image').click()">
                      <div class="upload-icon">
                          <i class="fas fa-cloud-upload-alt"></i>
                      </div>
                      <p>اسحب وأفلت الملف هنا أو انقر للاختيار</p>
                      <p class="text-muted">أقصى حجم: 5 ميجابايت</p>
                      <input type="file" name="image" id="image" class="form-control" style="display: none;" accept="image/*">
                  </div>
              </div>

              <button type="submit" class="submit-btn">
                  <i class="fas fa-plus ml-2"></i>
                  إنشاء المدونة
              </button>
          </form>

          <div class="blogs-section">
              <h2>المدونات السابقة</h2>
              @if($blogs->count() > 0)
              @foreach($blogs as $blog)
              <div class="blog-card">
                  <div class="blog-card-image-container">
                      @if($blog->image)
                      <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-card-image">
                      @else
                      <img src="/placeholder-image.jpg" alt="صورة افتراضية" class="blog-card-image">
                      @endif
                  </div>

                  <div class="blog-card-content">
                      <h3 class="blog-title">{{ $blog->title }}</h3>

                      <div class="blog-meta">
                          <span><i class="fas fa-calendar"></i> {{ $blog->created_at->format('Y/m/d') }}</span>
                          <span><i class="fas fa-user"></i> {{ $blog->author ?? 'المشرف' }}</span>
                      </div>

                      <div class="blog-content">
                          {!! Str::limit(strip_tags($blog->content), 200) !!}
                      </div>

                      <div class="blog-actions">
                          <a href="{{ route('blogs.edit', $blog->id) }}" class="edit-btn">
                              <i class="fas fa-edit"></i>
                              تعديل
                          </a>

                          <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="delete-btn" onclick="return confirm('هل أنت متأكد من حذف هذه المدونة؟')">
                                  <i class="fas fa-trash-alt"></i>
                                  حذف
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
              @endforeach
              @else
              <div class="no-blogs">
                  <i class="fas fa-newspaper"></i>
                  <p>لا توجد مدونات حتى الآن</p>
              </div>
              @endif
          </div>
      </div>

      <script>
          document.getElementById('image').addEventListener('change', function(e) {
              const fileName = e.target.files[0]?.name;
              if (fileName) {
                  const uploadText = this.closest('.custom-file-upload').querySelector('p');
                  uploadText.textContent = `تم اختيار: ${fileName}`;
              }
          });

          const dropZone = document.querySelector('.custom-file-upload');

          ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
              dropZone.addEventListener(eventName, preventDefaults, false);
          });

          function preventDefaults(e) {
              e.preventDefault();
              e.stopPropagation();
          }

          ['dragenter', 'dragover'].forEach(eventName => {
              dropZone.addEventListener(eventName, highlight, false);
          });

          ['dragleave', 'drop'].forEach(eventName => {
              dropZone.addEventListener(eventName, unhighlight, false);
          });

          function highlight(e) {
              dropZone.classList.add('border-green');
          }

          function unhighlight(e) {
              dropZone.classList.remove('border-green');
          }

          dropZone.addEventListener('drop', handleDrop, false);

          function handleDrop(e) {
              const dt = e.dataTransfer;
              const files = dt.files;
              document.getElementById('image').files = files;

              if (files[0]) {
                  const uploadText = dropZone.querySelector('p');
                  uploadText.textContent = `تم اختيار: ${files[0].name}`;
              }
          }

          setTimeout(function() {
              const alertElement = document.querySelector('.alert');
              if (alertElement) {
                  alertElement.remove();
              }
          }, 2000);
      </script>
      @endsection