"use strict";

module.exports = {
    "lottoToJson": lottoToJson
};

/**
 * @param {Array} lotto_row
 * @param {Array} picked_row
 * @param {Array} matches
 * @returns {JSON}
 */

function lottoToJson(lottoArray, pickedArray, matchesArray) {

    return JSON.stringify({
        lotto_row: lottoArray,
        picked_row: pickedArray,
        matches: matchesArray,
        totalMatches: matchesArray.length
    }, function (k, v) {
        if (v instanceof Array)
            return JSON.stringify(v);
        return v;
    }, 2);
}