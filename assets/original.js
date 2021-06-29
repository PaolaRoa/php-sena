function TABLE_VEHICLE_DETAIL_GetValue() {

    var currentObj = dbx.Context.CurrentObject;
    var result = [];
    var chargesList = currentObj.Charges;
    var chargesArr = copyToArray(chargesList);
    var len = chargesArr.length;
    var late_fee_disclaimer = currentObj.CustomFields.late_fee_disclaimer;
    var OCEFGT_OR_CONLOADING = has_OCEFGT_OR_CONLOADING(chargesArr);
    forEachInArray(chargesArr, function (charge) {

        //CHARGE related variables
        var chDescription = hasValue(charge.ChargeDefinition.Description) ? charge.ChargeDefinition.Description : "";
        var chQuantity = hasValue(charge.Quantity) ? charge.Quantity : "";
        var chUnits = hasValue(charge.Units) ? charge.Units : "";
        var chPriceRaw = hasValue(charge.PriceInCurrency) ? charge.PriceInCurrency : "";
        var chPrice = formatToMoney(chPriceRaw);
        var chAmountRaw = hasValue(charge.AmountInCurrency) ? charge.AmountInCurrency : "";
        var chAmount = formatToMoney(chAmountRaw);
        var chCode = hasValue(charge.ChargeDefinition.Code) ? charge.ChargeDefinition.Code : "";

        //Charge SECONDARY DESCRIPTION & NOTES
        var ch2ndDesc = hasValue(charge.Description) ? "... ^      " + charge.Description + "\r\n" : "";
        var chNotes = hasValue(charge.Notes) ? "... ^      " + charge.Notes + "\r\n" : "";

        //ORIGIN transactions items
        var createdAt = hasValue(charge.SourceObject) ? charge.SourceObject : "";
        var createdAtItems = getItemsList(createdAt);
        var liqdAt = hasValue(charge.LiquidatedInObject) ? charge.LiquidatedInObject : "";
        var liqAtItems = getItemsList(liqdAt);

        // 1) CHARGES LINES basic info
        result.push("[+] " + chDescription + "\t" + chQuantity + " " +
            chUnits + "\t" + chPrice + "\t" + chAmount + "\r\n");

        //**** Adding CONTAINERS to OCEAN & LOADING
        if (chCode == "OCEFGT-INC") {
            var containers = [];
            if (liqdAt != "" && hasValue(liqdAt)) {
                forEach(liqAtItems, function (item) {
                    var tipo = hasValue(item.Package) ? item.Package.Type : "";
                    if (tipo == "0") {
                        var contName = item.PackageName;
                        var contNumber = " # " + item.SerialNumber;
                        var contSeal = " - Seal: " + item.PartNumber;
                        containers.push("|x|  " + contName + contNumber + contSeal + "\r\n");
                    }
                });
            }

            else if (createdAt != "" && hasValue(createdAt)) {
                forEach(createdAtItems, function (item) {
                    var tipo = hasValue(item.Package) ? item.Package.Type : "";
                    if (tipo == "0") {
                        var contName = item.PackageName;
                        var contNumber = " # " + item.SerialNumber;
                        var contSeal = " - Seal: " + item.PartNumber;
                        containers.push("|x|  " + contName + contNumber + contSeal + "\r\n");
                    }
                });
            }
            else if (chCode == "CONLOADING") {
                var containers = [];
                if (liqdAt != "" && hasValue(liqdAt)) {
                    forEach(liqAtItems, function (item) {
                        var tipo = hasValue(item.Package) ? item.Package.Type : "";
                        if (tipo == "0") {
                            var contName = item.PackageName;
                            var contNumber = " # " + item.SerialNumber;
                            var contSeal = " - Seal: " + item.PartNumber;
                            containers.push("|x|  " + contName + contNumber + contSeal + "\r\n");
                        }
                    });
                }
    
                else if (createdAt != "" && hasValue(createdAt)) {
                    forEach(createdAtItems, function (item) {
                        var tipo = hasValue(item.Package) ? item.Package.Type : "";
                        if (tipo == "0") {
                            var contName = item.PackageName;
                            var contNumber = " # " + item.SerialNumber;
                            var contSeal = " - Seal: " + item.PartNumber;
                            containers.push("|x|  " + contName + contNumber + contSeal + "\r\n");
                        }
                    });
                }

            // 2) RESULT + containers
            var uniContainers = containers.join("");

            if (chCode == "OCEFGT-INC") {
                result.push(uniContainers);
            }
            else if (!OCEFGT_OR_CONLOADING.includes("OCEFGT-INC")) {
                result.push(uniContainers);
            }

        }

        //Adding vehicle info ONLY on Cargo Release for CONTAINER LOADING
        if(true){
            var towCars = [];
            forEachRelatedObject(currentObj, function (currentRelatedObj) {
                var DbClassType = currentRelatedObj.DbClassType;
                if (DbClassType == 4 || DbClassType == 5) { //CR = 4
                    if (chCode == "CONLOADING") {
                        
                        if (hasValue(liqdAt)) {
                            forEach(liqAtItems, function (item) {
                                var contItems = item.ContainedItems;
                                if (hasValue(contItems)) {
                                    forEach(contItems, function (item) {
                                        if (item.PackageName == "Vehicles") {
                                            var vin = item.AESData.VehicleData.VehicleID;
                                            var car = item.Description;
                                            towCars.push("... >    " + car + " - VIN: " + vin + "\r\n");
                                        }

                                        else {
                                            var product = item.Description;
                                            towCars.push("... >    " + product + "\r\n");
                                        }
                                    });
                                }

                                else {
                                    if (item.PackageName == "Vehicles") {
                                        var vin = item.AESData.VehicleData.VehicleID;
                                        var car = item.Description;
                                        towCars.push("... >    " + car + " - VIN: " + vin + "\r\n");
                                    }

                                    else {
                                        var product = item.Description;
                                        towCars.push("... >    " + product + "\r\n");
                                    }

                                }
                            });
                        }

                        // 3) RESULT + VEHICLE lines 
                        // var sortedTowCars = towCars.sort();
                        // var uniTowCars = sortedTowCars.uniques().join("");
                        // if (chCode == "OCEFGT-INC") {
                        //     result.push(uniTowCars);
                        // }
                        // else if (!OCEFGT_OR_CONLOADING.includes("OCEFGT-INC")) {
                        //     result.push(uniTowCars);
                        // }

                    }
                }
            });
            var sortedTowCars = towCars.sort();
            var uniTowCars = sortedTowCars.uniques().join("");
            if (chCode == "OCEFGT-INC") {
            result.push(uniTowCars);
                        }
            else if (!OCEFGT_OR_CONLOADING.includes("OCEFGT-INC")) {
                result.push(uniTowCars);
                }
}
        //**** Adding VEHICLE INFO to single OCEAN FREIGHT
        if (chCode == "OCEFGT-INC") {
            var towCars = [];
            if (liqdAt != "" && hasValue(liqdAt)) {
                forEach(liqAtItems, function (item) {
                    var contItems = hasValue(item.ContainedItems) ? item.ContainedItems : "";
                    if (contItems != "" && hasValue(contItems)) {
                        forEach(contItems, function (item) {
                            if (item.PackageName == "Vehicles") {
                                var vin = item.AESData.VehicleData.VehicleID;
                                var car = item.Description;
                                towCars.push("... >    " + car + " - VIN: " + vin + "\r\n");
                            }

                            else {
                                var product = item.Description;
                                towCars.push("... >    " + product + "\r\n");
                            }
                        });
                    }
                });
            }

            // 3) RESULT + VEHICLE lines 
            var sortedTowCars = towCars.sort();
            var uniTowCars = sortedTowCars.uniques().join("");
            if (chCode == "OCEFGT-INC") {
                result.push(uniTowCars);
            }
            else if (!OCEFGT_OR_CONLOADING.includes("OCEFGT-INC")) {
                result.push(uniTowCars);
            }

        }

        //**** Adding VEHICLE INFO to TOWING and SOTRAGE
        if (chCode == "TOWING" || chCode == "STO-INC") {
            var towCars = [];
            if (createdAt != "" && hasValue(createdAt)) {
                forEach(createdAtItems, function (item) {
                    if (item.PackageName == "Vehicles") {
                        var vin = item.AESData.VehicleData.VehicleID;
                        var car = item.Description;
                        towCars.push("... >    " + car + " - VIN: " + vin + "\r\n");
                    }

                    else {
                        var product = item.Description;
                        towCars.push("... >    " + product + "\r\n");
                    }
                });
            }
            // 3) RESULT + VEHICLE lines 
            var sortedTowCars = towCars.sort();
            var uniTowCars = sortedTowCars.uniques().join("");
            result.push(uniTowCars);
        }

        //**** Adding late_fee_disclaimer on Late Payment Fee Maersk
        if (chCode == "MAELATPAYFEE") {
            result.push("... ^      " + late_fee_disclaimer + "\r\n");
        }

        // 4) Get CHARGES NOTES & SECONDARY description
        result.push(ch2ndDesc + chNotes + "______________________________________________________________________________________________________________________________________________________\r\n");
    });

    return result.join("");
}