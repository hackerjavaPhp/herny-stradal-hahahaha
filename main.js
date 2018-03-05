"use strict";

var mainTableBtn = document.getElementById("main-show-table"),
    mainFormBtn = document.getElementById("main-show-form"),
    mainTable = document.getElementById("main-wpTable"),
    mainForm = document.getElementById("main-insertInfo");

mainTableBtn.onclick = function() {
    mainTable.style.display = "block";
    mainForm.style.display = "none";
}

mainFormBtn.onclick = function() {
    mainTable.style.display = "none";
    mainForm.style.display = "block";
}

