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

        
        forEach(liqAtItems, function (item) {
            var tipo = hasValue(item.Package) ? item.Package.Type : "";
            if (tipo == "0") {
                var contName = item.PackageName;
                var contNumber = " # " + item.SerialNumber;
                var contSeal = " - Seal: " + item.PartNumber;
                containers.push("|x|  " + contName + contNumber + contSeal + "\r\n");
            }
            result.push(containers);
        });
    
    
})
return result.join("");
}
