/**
 * Route for today.
 */
"use strict";

var express = require("express");
var router  = express.Router();

router.get("/", (req, res) => {
    let data = {};

    data.date = new Date();

    res.render("today", data);  //corresponds to views/today.ejs
});

module.exports = router;