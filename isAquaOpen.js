"use strict";

const request = require("request");
const AQUA_STATUS_ENDPOINT = "http://193.174.232.89:8080/fheapp/api/fhe/aqua";

module.exports = () => {
    return new Promise((resolve, reject) => {
        request({url: AQUA_STATUS_ENDPOINT}, (error, response, body) => {
            if (error) {
                reject(error);
            } else if (response && response.statusCode <= 399) {
                try {
                    const aquaStatusResponse = JSON.parse(body);

                    if (typeof aquaStatusResponse.open === "boolean") {
                        resolve(aquaStatusResponse.open);
                    } else {
                        reject(new Error(`Aqua status endpoint returned unknown response body: ${body}`));
                    }
                } catch (e) {
                    reject(e);
                }
            } else {
                reject(new Error(`Aqua status endpoint responded with status ${response.statusCode}`));
            }
        });
    });
};