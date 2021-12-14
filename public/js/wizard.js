let args = {
    "wz_nav_style": "dots", // dots, tabs, progress
    "buttons": true,
    "navigation": 'all' // buttons, nav, all
};

const wizard = new Wizard(args);

wizard.init();

document.addEventListener("submitWizard", function (e) {
	alert("Form Submit");
});
