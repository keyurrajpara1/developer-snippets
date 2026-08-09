<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.2/jquery-ui.js"></script>
    <style>
        #fileList {
            list-style: none;
            padding: 0;
            margin-top: 10px;
            max-width: 500px;
        }
        #fileList li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 4px;
        }
        .remove-file {
            cursor: pointer;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Create Product</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<form action="/test/product/store" method="POST" id="productForm" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>
    <br>
    <div>
        <label>Image</label>
        {{-- <input type="file" name="image"> --}}
        <div class="dropzone" id="myId"></div>
        <ul id="fileList"></ul>
    </div>
    <br>
    <button type="submit">
        Save Product
    </button>
</form>
<script>
    function refreshFileList() {
        const list = document.getElementById('fileList');
        list.innerHTML = '';
        myDropzone.files.forEach((file, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                <span>${file.name}</span>
                <span class="remove-file" data-index="${index}">
                    ✖
                </span>
            `;
            list.appendChild(li);
        });
    }
    Dropzone.autoDiscover = false;
    const myDropzone = new Dropzone("#myId", {
        url: "/test/product/store",
        autoProcessQueue: false,
        uploadMultiple: true,
        paramName: "images[]",
        previewsContainer: false,
    });
    myDropzone.on('addedfile', function() {
        refreshFileList();
    });
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-file')) {
            const index = e.target.dataset.index;
            myDropzone.removeFile(
                myDropzone.files[index]
            );
            refreshFileList();
        }
    });
    document.getElementById('productForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData();
            formData.append('name', document.querySelector('[name="name"]').value);
            formData.append('_token', document.querySelector('[name="_token"]').value);
        myDropzone.files.forEach((file) => {
            formData.append('images[]', file);
        });
        fetch('/test/product/store', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            alert('Saved Successfully');
        });
    });
    $(function(){
        $("#fileList").sortable();
    });
</script>
</body>
</html>