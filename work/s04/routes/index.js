"use strict";

var express = require('express');
var router = express.Router();
let jsonUtil = require("../util/toJson.js");

router.get("/lotto-json", (req, res) => {
        var pickedNumbers = (req.query.row)
        .split(',') //turn into an array
        .map(x=>+x) //turn into integers
        .sort(function(a, b){return a-b});  //sort from lowest 
        var generatedLottoNumbers = generateLottoNumbers();
        var matches = getMatchingNumbers(pickedNumbers, generatedLottoNumbers);
        let data = {};
        data.jsonData = jsonUtil.lottoToJson(generatedLottoNumbers, pickedNumbers, matches);
        res.render("json", data);
});

router.get("/lotto", (req, res) => {
    var pickedNumbers = (req.query.row)
    .split(',') //turn into an array
    .map(x=>+x) //turn into integers
    .sort(function(a, b){return a-b});  //sort from lowest
    var lottoNumbers = generateLottoNumbers();
    let data = {};
    data.pickedNumbers = pickedNumbers;
    data.lottoNumbers = lottoNumbers;
    data.matches = getMatchingNumbers(pickedNumbers, lottoNumbers);
    res.render("lotto", data);
});

module.exports = router;

function generateLottoNumbers(){
    var lottoNumbers = [];
    var temp;
    for (var i = 0; i < 7; i++) {
        temp = (Math.floor(Math.random() * 32) + 1);
        if(lottoNumbers.includes(temp)){
            i--;
        }   else lottoNumbers[i] = temp;
    }
    lottoNumbers.sort(function(a, b){return a-b});
    return lottoNumbers;
}

function getMatchingNumbers(array1, array2){
    return array1.filter(element => array2.includes(element));
}