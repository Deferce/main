let firstCardF = document.getElementById('firstCardF');
let firstCardS = document.getElementById('firstCardS');
let firstCardT = document.getElementById('firstCardT');

// Define media queries
let mediaQuery1024 = window.matchMedia('(max-width: 1024px)');
let mediaQuery768 = window.matchMedia('(max-width: 768px)');
let mediaQuery360 = window.matchMedia('(max-width: 360px)');

// Function to handle changes in the media query status
function handleMediaQueryChange() {
    if (mediaQuery1024.matches) {


        firstCardF.textContent = 'Salvador Stewart Flynn Thomas...';
        firstCardS.textContent = 'Frontend Developer Frontend ...';
        firstCardT.textContent = 'frontend_develop@gmail.com';
        if (mediaQuery768.matches) {


            firstCardF.textContent = 'Salvador Stewart Flynn Thomas Salva...';
            firstCardS.textContent = 'Leading specialist of the department of c...';
            firstCardT.textContent = 'JeromeKlarkaJeromaKlarka1923362362...';

        } if (mediaQuery360.matches) {

            firstCardF.textContent = 'Salvador Stewart Flynn Thomas Salva...';
            firstCardS.textContent = 'Leading specialist of the department o...';
            firstCardT.textContent = 'JeromeKlarkaJeromaKlarka19233623...';

        }
    } else {
        // Default
        firstCardF.textContent = 'Salvador Stewart Flynn Thomas Salva Salve...';
        firstCardS.textContent = 'Leading specialist of the department of cent...';
        firstCardT.textContent = 'frontend_develop@gmail.com'
    }
}


handleMediaQueryChange();

window.addEventListener('resize', handleMediaQueryChange);





const formInputs = document.getElementsByTagName(`input`);


//File upload functionality
formInputs[8].addEventListener('click', function () {

    formInputs[7].click();

});

formInputs[7].addEventListener('change', function (event) {
    const file = event.target.files[0];


    if (file) {
        const reader = new FileReader();

        let fileName = file.name;
        reader.onload = function (e) {
            let uploadLabel = document.getElementById('uploadLabel');
            const img = document.getElementById('uploadedImage');
            uploadLabel.innerHTML = '<p>' + fileName + '</p>';
            img.src = e.target.result;
            img.style.display = 'block';


        }
        reader.readAsDataURL(file);

    }
});



// Validation
const formInputsDiv = document.getElementsByTagName(`input`);
const mainForm = document.querySelector(`.mainForm`);
function validate() {

    const nameError = document.querySelector(`.nameError`);
    const emailError = document.querySelector(`.emailError`);
    const phoneError = document.querySelector(`.phoneError`);
    const fileUploadError = document.querySelector(`.fileError`);

    const nameInputValue = formInputs[0].value.trim();
    const emailInputValue = formInputs[1].value.trim();
    const phoneInputValue = formInputs[2].value.trim();
    const fileInput = formInputs[7].files;
    const containsAt = emailInputValue.includes('@');

    nameError.innerHTML = ``;
    emailError.innerHTML = ``;
    phoneError.innerHTML = ``;

    //Regexs
    const nameRegex = new RegExp(/[^a-zA-Z]/);
    const phoneRegex = new RegExp(/^[A-Za-z]+$/);
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //name validations
    if (nameRegex.test(nameInputValue)) {
        nameError.innerHTML = `Name Field Cannot contain special symbols!`;
        return;
    } if (nameInputValue.length > 9) {
        nameError.innerHTML = `Name Field Cannot contain more than 9 symbols!`;
        return;
    }
    if (nameInputValue.length < 3) {
        nameError.innerHTML = `Name Field Cannot contain less than 3 symbols!`;
        return;
    }
    if (emailInputValue.length > 22) {
        emailError.innerHTML = `Email Field Cannot contain more than 22 symbols!`;
        return;
    }
    if (emailInputValue.length < 7) {
        emailError.innerHTML = `Email Field Cannot contain less than 6 symbols!`;
        return;

    } if (!emailRegex.test(emailInputValue)) {
        emailError.innerHTML = `Email must be in proper format!`;
        return;
    }
    if (phoneInputValue.length < 4 && !phoneRegex.test(phoneInputValue)) {

        phoneError.innerHTML = `Phone Field Cannot contain less than 4 symbols!`;
        return;
    }
    if (phoneInputValue.length > 10 && !phoneRegex.test(phoneInputValue)) {
        phoneError.innerHTML = `Phone Field Cannot contain more than 10 symbols!`;
        return;
    }
    if (phoneRegex.test(phoneInputValue)) {
        phoneError.innerHTML = `Phone Field Cannot contain characters!`;
        return;
    }

    if (fileInput.length === 0) {

        fileUploadError.innerHTML = `Please select photo !`;
        return;
    }
    else {
        nameError.innerHTML = ``;
        emailError.innerHTML = ``;
        phoneError.innerHTML = ``;
        fileUploadError.innerHTML = ``;
        showResult();

        return;
    }
}

//----


//Form Data display and send proto
function showResult() {

    const headerR = document.querySelector(`.headerR`);
    const nameR = document.querySelector(`.nameR`);
    const emailR = document.querySelector(".emailR");
    const phoneR = document.querySelector(`.phoneR`);
    const radioR = document.querySelector(`.radioR`);
    const photoR = document.querySelector(`.photoR`);

    const formData = new FormData(mainForm);

    const entries = [...formData.values()];


    headerR.innerHTML = `<p>Data sent!`;
    nameR.innerHTML = `<p>Name:</p> <span style="color:red;"> ${entries[0]}</span>`;
    emailR.innerHTML = `<p>Email:</p> <span style="color:red;"> ${entries[1]}</span>`;
    phoneR.innerHTML = `<p>Phone:</p> <span style="color:red;"> ${entries[2]}</span>`;
    radioR.innerHTML = `<p>Position:</p> <span style="color:red;"> ${entries[3]}</span>`;
    photoR.innerHTML = `<p>Photo:</p> <span style="color:red;"> ${entries[4][`name`]}</span>`;
}





//data fetching logic

document.addEventListener('DOMContentLoaded', () => {
    const API_BASE_URL = 'https://frontend-test-assignment-api.abz.agency/api/v1';
    const usersContainer = document.querySelector('.midInfoCardBlock');
    const showMoreBtn = document.querySelector('.cardSubBtn');
    const form = document.querySelector('.mainForm');
    let currentPage = 0;
    let totalPages = 1;

    async function fetchUsers(page = 1) {
        try {
            const response = await fetch(`${API_BASE_URL}/users?page=${page}&count=6`);
            const data = await response.json();
            totalPages = data.total_pages;
            return data.users;
        } catch (error) {
            console.error('Error fetching users:', error);
            return [];
        }
    }

    async function displayUsers() {
        const users = await fetchUsers(currentPage);
        users.forEach(user => {
            const userCard = document.createElement('div');
            userCard.classList.add('cardSubBlock');
            userCard.innerHTML = `
                <img src="${user.photo}" alt="${user.name}">
                <div class="innerCardBlock">
                    <p>${user.name}</p>
                    <p>${user.position}</p>
                    <p>${user.email}</p>
                    <p>${user.phone}</p>
                </div>
            `;
            usersContainer.appendChild(userCard);
        });

        if (currentPage >= totalPages) {
            showMoreBtn.style.display = 'none';
        } else {
            showMoreBtn.style.display = 'block';
        }
    }

    showMoreBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        currentPage++;
        await displayUsers();
    });

    async function fetchPositions() {
        try {
            const response = await fetch(`${API_BASE_URL}/positions`);
            const data = await response.json();
            return data.positions;
        } catch (error) {
            console.error('Error fetching positions:', error);
            return [];
        }
    }

    async function displayPositions() {
        const positions = await fetchPositions();
        const positionGroup = document.querySelector('.formPositionGroup');
        positionGroup.innerHTML = '<div><label>Select your position</label></div>';
        positions.forEach(position => {
            const positionDiv = document.createElement('div');
            positionDiv.innerHTML = `
                <input type="radio" id="${position.name}" name="position" value="${position.id}">
                <label for="${position.name}">${position.name}</label>
            `;
            positionGroup.appendChild(positionDiv);
        });
    }

    async function handleFormSubmit(event) {
        event.preventDefault();
        const formData = new FormData(form);
        const jsonData = {};
        formData.forEach((value, key) => { jsonData[key] = value; });

        try {
            const response = await fetch(`${API_BASE_URL}/users`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(jsonData)
            });

            const result = await response.json();
            if (result.success) {
                alert('Registration successful!');
                currentPage = 1;
                usersContainer.innerHTML = '';
                await displayUsers();
            } else {
                alert('Registration failed!');
            }
        } catch (error) {
            console.error('Error submitting form:', error);
        }
    }

    form.addEventListener('submit', handleFormSubmit);

    displayUsers();
    displayPositions();
});




