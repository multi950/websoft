"use strict";

var express = require('express');
var router = express.Router();

router.get("/lotto", (req, res) => {
    var lottoNumber = "";
    for (var i = 0; i < 6; i++) {
        lottoNumber += (Math.floor(Math.random() * 32) + 1);
        if (i < 5) lottoNumber += ", ";
    }
    res.send(lottoNumber);
});




module.exports = router;