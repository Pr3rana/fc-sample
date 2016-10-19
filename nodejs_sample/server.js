var express = require('express');
var app = express();
var path = require('path');

app.use(express.static('public'));

app.set('views',path.join(__dirname,'views'));
//app.set('view engine','ejs'); //when we use ejs
app.set('view engine','html'); //when we use jade


app.get("/", function(req,res){
	var data = {
          "chart": {
              "caption": "Monthly revenue for last year",
              "subCaption": "Harry's SuperMart",
              "xAxisName": "Month",
              "yAxisName": "Revenues (In USD)",
              "theme": "fint"
           },
          "data": [
              {"label": "Jan", "value": "420000"},
              {"label": "Feb", "value": "810000"},
              {"label": "Mar", "value": "720000"},
              {"label": "Apr", "value": "550000"},
              {"label": "May", "value": "910000"},
              {"label": "Jun", "value": "510000"},
              {"label": "Jul", "value": "680000"},
              {"label": "Aug", "value": "620000"},
              {"label": "Sep", "value": "610000"},
              {"label": "Oct", "value": "490000"},
              {"label": "Nov", "value": "900000"},
              {"label": "Dec", "value": "730000"}
            ]
        }
   res.sendfile('views/template.html'); // when we use html
  //res.render('template', {"body" : JSON.stringify(data) }); //when we use ejs
  //res.render('template', {"chartData" : JSON.stringify(data) });
});

app.listen(3000, function () {
  console.log('Example app listening on port 3000!');
});

