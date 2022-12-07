
const imageInput = document.querySelector('#img-upload');

if(imageInput) {
    const imagePreview = document.querySelector('#img-preview');

    // on imageInput change prevew image
    imageInput.addEventListener('change', (e) => {
        const image = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        }
        reader.readAsDataURL(image);
        imagePreview.classList.remove('d-none');
        document.querySelector(".__ADMIN__UPLOAD__IMAGE__TEXT").classList.add("d-none");
    });
}