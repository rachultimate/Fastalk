const settings_label = document.querySelector("#settings-label");
const settings_navbar = $("#settings-navbar");
const participants_label = document.querySelector("#participants-label");
const participants_navbar = $("#participants-navbar");
const publicroom_label = document.querySelector("#publicroom-label");
const publicroom_navbar = $("#publicroom-navbar");
const contact_label = document.querySelector("#contact-label");
const contact_navbar = $("#contact-navbar");
const report_label = document.querySelector("#report-label");
const report_navbar = $("#report-navbar");

var enableV = 1;
var enableV2 = 1;
var enableV3 = 1;
var enableV4 = 1;
var enableV5 = 1;

settings_label.addEventListener("click", function() {
    if(enableV == 1) {
    settings_navbar.css("display", "initial");
    settings_navbar.css("visibility", "initial");
    return enableV = 0;
    } else {
        settings_navbar.css("display", "none");
        settings_navbar.css("visibility", "hidden");
        return enableV = 1;   
    }
});

participants_label.addEventListener("click", function() {
    if(enableV2 == 1) {
    participants_navbar.css("display", "initial");
    participants_navbar.css("visibility", "initial");
    return enableV2 = 0;
    } else {
        participants_navbar.css("display", "none");
        participants_navbar.css("visibility", "hidden");
        return enableV2 = 1;   
    }
});

if(publicroom_label != null) {
    publicroom_label.addEventListener("click", function() {
        if(enableV3 == 1) {
        publicroom_navbar.css("display", "initial");
        publicroom_navbar.css("visibility", "initial");
        return enableV3 = 0;
        } else {
            publicroom_navbar.css("display", "none");
            publicroom_navbar.css("visibility", "hidden");
            return enableV3 = 1;   
        }
    });
}

function openAbout() {
    if(enableV4 == 1) {
    contact_navbar.css("display", "initial");
    contact_navbar.css("visibility", "initial");
    return enableV4 = 0;
    } else {
        contact_navbar.css("display", "none");
        contact_navbar.css("visibility", "hidden");
        return enableV4 = 1;   
    } 
}

report_label.addEventListener("click", function() {
    if(enableV5 == 1) {
        report_navbar.css("display", "initial");
        report_navbar.css("visibility", "initial");
        return enableV5 = 0;
    } else {
        report_navbar.css("display", "none");
        report_navbar.css("visibility", "hidden");
        return enableV5 = 1;
    }
})