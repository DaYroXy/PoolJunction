
const imageInput = document.querySelector('#img-upload');
const OverLayElement = document.querySelector('.__ITEMS__OVERLAY__');
const deleteForm = document.querySelector('#__DELETE__FORM__');

let defaultDeleteAction;

if(deleteForm) {
    defaultDeleteAction = deleteForm.getAttribute('action');
}

function deleteVerification(productId) {
    deleteForm.setAttribute('action', defaultDeleteAction + productId);
    document.querySelector('.__DELETE__CONFIRM').classList.remove('d-none');
    OverLayElement.classList.remove('d-none');
}

function closeMenu() {
    
    console.log('close');
    let dynamicCategory = document.querySelectorAll('#dynamicCategory');
    if(dynamicCategory.length > 0) {
        dynamicCategory.forEach(element => {
            element.remove();
        });
    }
    document.querySelector('.__DELETE__CONFIRM').classList.add('d-none');
    document.querySelector('.__UPDATE__CONFIRM').classList.add('d-none');
    OverLayElement.classList.add('d-none');
}

function openEdit(productId) {
    let editForm = document.querySelector('#__EDIT__FORM__');
    try {
        fetch(`${URLROOT}/items/get/${productId}`).then(res => res.json()).then(data => {
            let name = editForm.querySelector('[name="name"]');
            let description = editForm.querySelector('[name="description"]');
            let price = editForm.querySelector('[name="price"]');
            let sold = editForm.querySelector('[name="sold"]');
            let quantity = editForm.querySelector('[name="quantity"]');
            let category = document.querySelector('[name="category"]');

            if(data.length === 0) {
                name.value = '';
                description.value = '';
                price.value = '';
                sold.value = '';
                quantity.value = '';
                return;
            }
            console.log(category);
            category.insertAdjacentHTML('afterbegin', `<option id="dynamicCategory" value="${data[0].category_id}" selected>${data[0].categoryName}</option>`);
            name.value = data[0].name;
            description.value = data[0].description;
            price.value = data[0].price;
            sold.value = data[0].sold;
            quantity.value = data[0].quantity;
            document.querySelector("#__EDIT__FORM__").setAttribute('action', `${URLROOT}/items/update/${productId}`);
            document.querySelector('.__UPDATE__CONFIRM').classList.remove('d-none');
            OverLayElement.classList.remove('d-none');
        })
    } catch (error) {
        console.log(error);
    }
}


function openEditCategory(productId) {
    let editForm = document.querySelector('#__EDIT__FORM__');
    try {
        fetch(`${URLROOT}/categories/get/${productId}`).then(res => res.json()).then(data => {
            let name = editForm.querySelector('[name="name"]');
            let description = editForm.querySelector('[name="description"]');

            if(data.length === 0) {
                name.value = '';
                description.value = '';
                return;
            }
            name.value = data.name;
            description.value = data.description;
            document.querySelector("#__EDIT__FORM__").setAttribute('action', `${URLROOT}/categories/update/${productId}`);
            document.querySelector('.__UPDATE__CONFIRM').classList.remove('d-none');
            OverLayElement.classList.remove('d-none');
        })
    } catch (error) {
        console.log(error);
    }
}


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