const formInputs = document.getElementsByTagName('input');
const nameErrorBox = document.querySelector('.errorBoxName');
const telephoneErrorBox = document.querySelector('.errorBoxTelephone');
const result = document.querySelector(`.result`);
const joinBtn = document.querySelector(`.btn2`);

function elementClear() {

    const defVal = [`Your name`, `Telephone`];

    for (let i = 0; i < formInputs.length; i++) {
        const input = formInputs[i];

        input.addEventListener(`focus`, () => {

            if (input.value === defVal[i]) {

                input.value = ``;
            }

        });

        input.addEventListener(`blur`, () => {

            if (input.value === ``) {
                input.value = defVal[i];
            }
        });
    }
}




function check() {

    const nameRegex = new RegExp(/[^a-zA-Z]/);
    const phoneRegex = /^\d+$/;

    joinBtn.addEventListener(`click`, () => {
        nameErrorBox.innerHTML = ``;
        telephoneErrorBox.innerHTML = ``;
        nameErrorBox.classList.add(`err`);
        telephoneErrorBox.classList.add(`err`);

        const nameVal = formInputs[0].value;
        const telVal = formInputs[1].value;
        if (nameRegex.test(nameVal)) {
            nameErrorBox.classList.remove(`err`);
            nameErrorBox.innerHTML = `Name cannot contain numbers or be empty!`;
            return;
        }
        if (nameVal.length > 9) {
            nameErrorBox.classList.remove(`err`);
            nameErrorBox.innerHTML = `Name cannot contain more than 9 characters!`;
            return;
        }
        if (nameVal.length < 3) {
            nameErrorBox.classList.remove(`err`);
            nameErrorBox.innerHTML = `Name cannot contain less than 3 characters!`;
            return;
        }
        if (!phoneRegex.test(telVal)) {

            telephoneErrorBox.classList.remove(`err`);
            telephoneErrorBox.innerHTML = `Telephone cannot contain characters or be empty!`;
            return;
        }
        if (telVal.length < 4) {
            telephoneErrorBox.classList.remove(`err`);
            telephoneErrorBox.innerHTML = `Telephone cannot contain less than 4 symbols!`;
            return;
        }
        if (telVal.length > 15) {
            telephoneErrorBox.classList.remove(`err`);
            telephoneErrorBox.innerHTML = `Telephone cannot be more than 15 symbols`;
            return;
        }
        else {
            result.innerHTML = `Joined !`;
        }
    });

}

elementClear();
check();