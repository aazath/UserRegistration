//get necessary elements from login page
const loginForm = document.querySelector('#loginForm');
const submitLoginBtn = document.querySelector('#submitLoginBtn');
const alertMessage = document.querySelector('#alertMessage');
//get elemnts from models registration
const registrationForm = document.querySelector('#userRegistrationForm');
const submitRegistrationButton = document.querySelector('#rigister_profile');
const alertMessageInsideForm = document.querySelector('.alertMessageForm');
const registrationFormModel = new bootstrap.Modal(document.querySelector('#registrationForm'));

const internetRecommend = document.querySelector('.internet');
// console.log(internetRecommend);

//timeout for internet connection require message
setTimeout(function() {
    internetRecommend.style.display = "none";
}, 4000);

const body = document.querySelector('body');

//adding background image to login page
body.classList.add('svg-bachround-image');



/*======================================================================================
    Login User
======================================================================================*/
//send request to server in order to check typed user name and password
loginForm.addEventListener('submit', async(e) => {
    e.preventDefault();

    const loginFormData = new FormData(loginForm);
    loginFormData.append('userLogin', 1);

    if (loginForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();

        loginForm.classList.add('was-validated');
        return false;
    } else {

        submitLoginBtn.innerHTML = "Please Wait..";

        const data = await fetch('controller.php', {
            method: "POST",
            body: loginFormData
        });

        const serverResponse = await data.text();
        //console.log(serverResponse);

        if (serverResponse.match(/redirect/)) {
            //retriew to index page when login is true 
            window.location.replace('index.php');
        } else {

            alertMessage.innerHTML = serverResponse;
            //back to button
            submitLoginBtn.innerHTML = "<i class=\"fas fa-sign-in-alt\"></i>&nbsp;Login Now";
            //remove validation class
            loginForm.classList.remove('was-validated');
        }

    }
});


/*======================================================================================
   Sign up REgistration
======================================================================================*/

registrationForm.addEventListener('submit', async(e) => {
    e.preventDefault();

    const registrationDataform = new FormData(registrationForm);
    registrationDataform.append('insertNewUser', 1);

    if (registrationForm.checkValidity() == false) {
        e.preventDefault();
        e.stopPropagation();

        registrationForm.classList.add('was-validated');

        return false;
    } else {

        submitRegistrationButton.innerHTML = "please wait...";

        const data = await fetch('controller.php', {
            method: "POST",
            body: registrationDataform
        });

        const serverResponse = await data.text();
        // console.log(serverResponse);


        if (serverResponse.match(/success/)) {

            //show alert message which came from server response
            // alertMessage.innerHTML = serverResponse;
            alertMessage.innerHTML = `
            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
            User Successfully Inserted! Login Now..
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>
            `;

            //chenge back to button orinal name
            submitRegistrationButton.innerHTML = "<i class=\"fas fa-plus\"></i> Register Now</button>";
            //reset the form
            registrationForm.reset();
            //change the class name of form in order to validation purpose
            registrationForm.classList.remove('was-validated');

            //hide the model after insert data
            registrationFormModel.hide();

        } else {

            //show alert message which came from server response
            alertMessageInsideForm.innerHTML = serverResponse
                //chenge back to button orinal name
            submitRegistrationButton.innerHTML = "<i class=\"fas fa-plus\"></i> Register Now</button>";
            //change the class name of form in order to validation purpose
            registrationForm.classList.remove('was-validated');
        }

    }

});