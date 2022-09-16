// set the year to footer area
const footerYear = document.querySelector('#year');
const getYear = new Date();
const year = getYear.getFullYear();
footerYear.innerText = year;

//get elements from dom


/*==================================================================================
Logout
====================================================================================*/
//send request to server when delete btn pressed
const logoutLink = document.querySelector('#logoutLink');

logoutLink.addEventListener('click', async(e) => {
    // e.preventDefault();
    // console.log('hey haither you clicked me');
    const data = await fetch('controller.php?logOutSession=1', {
        method: "GET"
    });

    const response = await data.text();
    console.log(response);

    if (response.match(/redirect/)) {

        window.location.replace('login.php');
    } else {
        console.log(response);
    }

});