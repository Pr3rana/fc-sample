
var app=angular.module("myApp", ["ng-fusioncharts"]);
app.controller('MyController', function($scope) {
    //Define the `myDataSource` scope variable.
    $scope.myDataSource = {
        chart: {
            caption: "Harry's SuperMart",
            subCaption: "Top 5 stores in last month by revenue",
            numberprefix: "$",
            plotgradientcolor: "",
            canvasBgColor:"04476C",
            bgcolor: "04476C",
            showalternatehgridcolor: "0",
            divlinecolor: "CCCCCC",
            showvalues: "0",
            showcanvasborder: "0",
            canvasborderalpha: "0",
            canvasbordercolor: "CCCCCC",
            canvasborderthickness: "1",
            yaxismaxvalue: "30000",
            captionpadding: "30",
            linethickness: "3",
            yaxisvaluespadding: "15",
            legendshadow: "0",
            legendborderalpha: "0",
            palettecolors: "#f8bd19,#008ee4,#33bdda,#e44a00,#6baa01,#583e78",
            showborder: "0"
        },
        data: [
            {
                label: "Bakersfield Central",
                value: "880000"
            },
            {
                label: "Garden Groove harbour",
                value: "730000"
            },
            {
                label: "Los Angeles Topanga",
                value: "590000"
            },
            {
                label: "Compton-Rancho Dom",
                value: "520000"
            },
            {
                label: "Daly City Serramonte",
                value: "330000"
            }
        ]
    };
});