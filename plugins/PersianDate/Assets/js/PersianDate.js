Kanboard.App.prototype.datePicker = function () {
    var dateFormat = $("body").data("js-date-format").replace("yy", "yyyy").toUpperCase();
    var dateTimeFormat = dateFormat + " " + $("body").data("js-time-format").replace("tt", "a");
    var datePickerElements = $(".form-datetime, .form-date");

    for (var i = 0; i < datePickerElements.length; i++) {
        var altFieldStr = $(datePickerElements[i]).hasClass("form-datetime") ? "altform-datetime" + i : "altform-date" + i;
        var formatStr = $(datePickerElements[i]).hasClass("form-datetime") ? dateTimeFormat : dateFormat;
        $(datePickerElements[i]).after('<input style="display:none" name="' + $(datePickerElements[i]).attr("name") + '" type="text" id="' + altFieldStr + '" value="' + datePickerElements[i].value + '"></input>');
        $(datePickerElements[i]).removeAttr("name");
        $(datePickerElements[i]).attr("placeholder", new persianDate().format(formatStr));
        $(datePickerElements[i]).pDatepicker({
            //"observer": true,
            "toolbox": {
                "calendarSwitch": {
                    "enabled": false,
                }
            },
            "persianDigit": false,
            "timePicker": {
                "enabled": $(datePickerElements[i]).hasClass("form-datetime") ? true : false,
                "second": {
                    "enabled": false
                }
            },
            "autoClose": true,
            "format": formatStr,
            "onlySelectOnDate": true,
            "initialValue": $(datePickerElements[i]).val().length > 0 ? true : false,
            "onHide": function () {
                $(this.model.input.elem).trigger('change');
            }
        });
        $(datePickerElements[i]).on("set propertychange change keyup input paste", function (event) {
            try {
                //using moment-jalali:
                //$(this).val(moment(toEnglishDigit($(this).val()), 'jYYYY/jM/jD HH:mm').format(formatStr));
                if ($.trim($(this).val()) != "") {
                    var dateSplited = $(this).val().split(" ");
                    var dateParams = toEnglishDigit(dateSplited[0]).split("/").map(function (x) { return parseInt(x, 10); });
                    var YYYY = dateParams[0];
                    var MM = dateParams[1];
                    var DD = dateParams[2];
                    if ($(this).hasClass("form-datetime")) {
                        var timeParams = toEnglishDigit(dateSplited[1]).split(":").map(function (x) { return parseInt(x, 10); });
                        var HH = dateSplited.length > 2 ? (dateSplited[2] == "??" ? timeParams[0] + 12 : timeParams[0]) : timeParams[0];
                        var mm = timeParams[1];
                        $(this).next().val(new persianDate([YYYY, MM, DD, HH, mm]).toLocale("en").toCalendar('gregorian').format(formatStr));
                    }
                    else {
                        $(this).next().val(new persianDate([YYYY, MM, DD]).toLocale("en").toCalendar('gregorian').format(formatStr));
                    }
                }
                else {
                    $(this).next().val("");
                }
            }
            catch (err) {
                $(this).next().val("");
                //console.log(err);
            }
        });
    }
};

KB.on('dom.ready', function () {
    replaceAllDatesByPersianDates();
});

Kanboard.Swimlane.prototype.onBoardRendered = function() {
    var swimlaneIds = this.getAllCollapsed();

    for (var i = 0; i < swimlaneIds.length; i++) {
        this.collapse(swimlaneIds[i]);
    }
    replaceAllDatesByPersianDates();
};

KB.on("modal.afterRender", replaceAllDatesByPersianDates);

KB.on('chart-task-time-column', replaceAllDatesByPersianDates );

/**
 * @return {boolean}
 */
function IsValidDate(date) { //new by mahdi hezaveh #
    // var regex = /\d{1,2}\/\d{1,2}\/\d{4}/; //xx/xx/xxxx
    var regex = /\d{4}\/\d{1,2}\/\d{1,2}/; // ???????? ?????????? ???? ?????????????? ???????? YYYY/dd/mm ????????
    if (!regex.test(date)) return false;
    var day = Number(date.split("/")[2]);
    date = new Date(date);
    return !(date && date.getDate() !== day);
}

function isvaliddatetime(input) { //new by mahdi hezaveh #
    var stamp = (input);
    stamp = stamp.split(" ");
    //var validDate = !/Invalid|NaN/.test(new Date(stamp[0]).toString()); buggy - ex: 1.1.1
    var validDate = IsValidDate(stamp[0]);
    var validTime = /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(stamp[1]);
    //debugger;
    if (stamp.length === 2) {
        return (validDate && validTime);
    } else if (stamp.length === 1) {
        return (validDate);
    }
    // return !!Date.parse(input);
}

function replaceAllDatesByPersianDates() {
    //debugger;
    var dateFormat = $("body").data("js-date-format").replace("yy", "yyyy").toUpperCase();
    var dateTimeFormat = dateFormat + " " + $("body").data("js-time-format").replace("tt", "a");
    if($(".task-table").length > 0){
        $("table tr td:nth-child(6)").addClass("gDate");
        $("table tr td:nth-child(7)").addClass("gDateTime");
    }
    $("#task-summary span:contains(':')").addClass("gDateTime");
    
    var dateLiElements = $("li:contains(??????????):contains('/'), .task-date, .activity-date, .gDate, .gDateTime, .comment-date, li, td "); //<td> new by mahdi hezaveh #

    for (let i = 0; i < dateLiElements.length; i++) {
        if($.trim(dateLiElements[i].textContent).length === 0) continue;
        let gDateStr = '';
        let formatStr = '';
        if (dateLiElements[i].textContent.split(":").length - 1 > 1) {
            gDateStr = ($.trim(dateLiElements[i].textContent.substr(dateLiElements[i].textContent.indexOf(':') + 1)));
            formatStr = dateTimeFormat;
        }
        else if ((dateLiElements[i].textContent.split(":").length - 1 === 1) && dateLiElements[i].textContent.indexOf("??????????") !== -1) {
            gDateStr = ($.trim(dateLiElements[i].textContent.split(/:(.+)/)[1]));
            formatStr = dateFormat;
        }
        //else if(isBoard || $(dateLiElements[i]).hasClass("activity-date")){
        else {
            gDateStr = ($.trim(dateLiElements[i].textContent));
            formatStr = dateTimeFormat;
        }
        //debugger;
        if ((isvaliddatetime(gDateStr))) { //new by mahdi hezaveh #
            var jDateStr = new persianDate(new Date(gDateStr)).format(formatStr);

            if (!$(dateLiElements[i]).hasClass("jDate")) {
                dateLiElements[i].textContent = dateLiElements[i].textContent.replace(gDateStr, jDateStr);
                //console.log(gDateStr, formatStr, dateLiElements[i].textContent);
                $(dateLiElements[i]).addClass("jDate");
            }
        }
    }
}

function toEnglishDigit(str) {
    if (!str) { str = this; }
    var
        persianNumbers = [/??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g],
        arabicNumbers = [/??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g, /??/g];
    if (typeof str === 'string') {
        for (var i = 0; i < 10; i++) {
            str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
        }
    }
    return str;
}

