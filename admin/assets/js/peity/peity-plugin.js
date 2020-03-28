$(function () {
    'use strict';
    $("span.pie").peity("pie", {
        fill: ['#3a3633', '#e5e5e5', '#ffffff']
    })

    $(".line").peity("line", {
        fill: '#3a3633',
        stroke: '#e5e5e5',
    })

    $(".bar").peity("bar", {
        fill: ["#3a3633", "#e5e5e5"]
    })

    $(".bar_dashboard").peity("bar", {
        fill: ["#3a3633", "#e5e5e5"],
        width: 100
    })

    var updatingChart = $(".updating-chart").peity("line", {fill: '#3a3633', stroke: '#e5e5e5', width: 64})

    setInterval(function () {
        var random = Math.round(Math.random() * 10)
        var values = updatingChart.text().split(",")
        values.shift()
        values.push(random)

        updatingChart
                .text(values.join(","))
                .change()
    }, 1000);

});
