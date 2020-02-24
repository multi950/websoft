'use strict';

var regionData;
var isTableShowing = false;
let regionSelector;
var regionSrc = 'report/json/kommuner.json';
let schoolTable;
(function () {

    fetchJson(regionSrc).then(json => updateRegionData(json));
    $(document).ready(function(){
        $('.navbar').load("views/menu.html");
        $('.bird-container').load("views/bird.html");
     });

})();

async function fetchJson(src) {

    try {
        const response = await fetch(src);
        const myJson = await response.json();
        return myJson;
    } catch (error) {
        console.error();
        window.alert("Only \"Ale\",\"Alingsås\" & \"Tranemo\" is available");
    }
}

function updateRegionData(data) {
    regionData = data;
    updateSelector(regionData);
}

function updateSelector(data) {
    if (regionSelector == null) {
        initializeSelector();
    }
    fillSelector(data);
}

function onRegionChange() {

    fetchJson('report/json/' + regionSelector.value + '.json').then(json => {
        if (json === undefined) {
            closeTable();
            resetSchoolTable();
            regionSelector.value = 'Choose region';
        } else {
            fillResultTable(json);
            showTable();
        }
    })
}

function onSelectClick(){
    if (isTableShowing) {
        closeTable();
        regionSelector.value = 'Choose region';
    }
}

function initializeSelector() {
    regionSelector = document.getElementById('region-selector');
    regionSelector.length = 0;
    regionSelector.selectedIndex = 0;
    let defaultOption = document.createElement('option');
    defaultOption.text = 'Choose region';
    regionSelector.add(defaultOption);
}

function fillSelector(data) {
    let option;
    for (var i = 0; i < data.KommunResponse.Kommuner.Kommun.length; i++) {
        option = document.createElement('option');
        option.text = data.KommunResponse.Kommuner.Kommun[i].Namn;
        option.value = data.KommunResponse.Kommuner.Kommun[i].Kommunkod;
        regionSelector.add(option);
    }
}

function fillResultTable(json) {
    resetSchoolTable();

    for (var i = 0; i < json.SkolenhetResponse.Skolenheter.Skolenhet.length; i++) {
        insertIntoSchoolTable(json.SkolenhetResponse.Skolenheter.Skolenhet[i])
    }
}

function resetSchoolTable() {
    $('#school_info_table tr').remove();
    schoolTable = document.getElementById('school_info_table');
    setSchoolTableHeader(["Kommunkod", "peOrgNr", "Skolenhetskod", "Skolenhetsnamn"]);
}

function insertIntoSchoolTable(Skolenhet) {

    var newRow = schoolTable.insertRow(schoolTable.length);
    var kommunkodCell = newRow.insertCell(0);
    kommunkodCell.innerHTML = Skolenhet.Kommunkod;
    var peOrgNrCell = newRow.insertCell(1);
    peOrgNrCell.innerHTML = Skolenhet.PeOrgNr;
    var skolenhetskodCell = newRow.insertCell(2);
    skolenhetskodCell.innerHTML = Skolenhet.Skolenhetskod;
    var skolenhetsnamnCell = newRow.insertCell(3);
    skolenhetsnamnCell.innerHTML = Skolenhet.Skolenhetsnamn;

}

function setSchoolTableHeader(headers) {
    var header = school_info_table.createTHead();
    var row = header.insertRow(0);
    for (var i = 0; i < headers.length; i++) {
        var cell = row.insertCell(i);
        cell.innerHTML = '<b>' + headers[i] + '</b>';
    }
}

function showTable() {
    
    $('.slide').addClass('appear');
    isTableShowing = true;
}

function closeTable() {

        $('.slide').removeClass('appear');
        isTableShowing = false;
}